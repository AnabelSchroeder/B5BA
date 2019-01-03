<?php

    //Datenbank einbinden
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbase = "ba_webshop";
    
    $verbinde = mysqli_connect($host,$user,$pass);
    $con = mysqli_select_db($verbinde, $dbase);

/******************************************************************************************** */
// Login: eingabe überprüfen
/********************************************************************************************* */
    if (isset( $_POST['login_name']))
    {
        
// prüfen: beide felder gesetzt/////////////////////////////////////////////////////////////
        if($_POST['login_name']!= "" AND $_POST['login_pass']!= "")

        {
           // überprüfen, ob Loginname gültig////////////////////////////////////////////////////
           $sql = "SELECT n_id, n_admin, n_passwort, n_sperre FROM nutzer WHERE n_login =\"".$_POST['login_name']."\";";
            $result = mysqli_query($verbinde, $sql)OR die(mysqli_error);
         
            if (mysqli_num_rows ($result) > 0)
            {   
                while ($zeile = mysqli_fetch_assoc($result))
                {
                //nutzerid speichern
                $nutzer = $zeile['n_id'];
                //eingegebenes Passwort speichern
                $passwort = $_POST['login_pass'];
                //gehashtes Passwort aus der Datenbank 
                $hash = $zeile['n_passwort'];
               
                //sperre auslesen
                $login_sperre = $zeile['n_sperre'];

                //admin
                $login_admin = $zeile['n_admin'];

             
//prüfen, ob Passwort und Hash übereinstimmen////////////////////////////////////////////////////
              if (password_verify($passwort, $hash))
                {
                
                //automatisch neue Session id
              // function session_regenerate_id();
              //  session_regenerate_id();

        /*      // cookie erneuern ////////////////////////////////////////////////////////////////
              $sql ="SELECT cookie_id FROM cookie WHERE cookie_wert= \"".$_COOKIE['sid']."\";";
              $result = mysqli_query($verbinde, $sql);  
              $zeile = mysqli_fetch_assoc($result);

            
              // altes cookie löschen
            setcookie("sid", " ", time()-3600*48);

            //neues cookie setzen
            $sid = md5(openssl_random_pseudo_bytes(32));
            setcookie("sid", $sid, time()+3600*48);

            //Datenbank updaten
            $sql ="UPDATE cookie
                SET cookie_wert =\"".$_COOKIE['sid']."\"
                WHERE cookie_id =\"".$zeile['cookie_id']."\";";
                 $result = mysqli_query($verbinde, $sql); */
             //////////////////////////////////////////////////////////////////////////////////////// 
                
/******************************************************************************************** */
// Login: expire setzen
/********************************************************************************************* */
             //login expire setzen:
                $expire = time()+1800;
 
/******************************************************************************************** */
// login: csrf token
/********************************************************************************************* */
            // CSRF Token setzen://////////////////////////////////////////////////////////////
                $_SESSION['csrf_token'] = md5(openssl_random_pseudo_bytes(32));
               
            // Token in Datenbank speichern
                $sql = "UPDATE cookie
                        SET n_id =\"".$nutzer."\", logged_in =true, expire=\"".$expire."\",  CRSF=\"".$_SESSION['csrf_token']."\", Versuche=\"3\"
                        WHERE cookie_wert= \"".$_COOKIE['sid']."\";";
                $result = mysqli_query($verbinde, $sql);

/******************************************************************************************** */
// login: sperre prüfen
/********************************************************************************************* */
            // sperre prüfen
            if($login_sperre ==true)
            {
                echo "<script type=\"text/javascript\"> kasse_sperren(); </script>";
            }
                echo "eingeloggt";
               header("Location: index.php");
 }
                    
/******************************************************************************************** */
// Fehlerausgabe: Kombination falsch
/********************************************************************************************* */
            else
            {
                $B_Fehler= "Nutzername oder Passwort falsch!";
 
/******************************************************************************************** */
// Einlogversuche abprüfen
/********************************************************************************************* */
                //  Login Versuchanzahl auslesen
                $sql ="SELECT Versuche FROM cookie WHERE cookie_wert= \"".$_COOKIE['sid']."\";";
                $result = mysqli_query($verbinde, $sql);
                $zeile = mysqli_fetch_assoc($result);

                // anzahl speichern

                $versuch_anzahl_alt = $zeile['Versuche'];

                //wenn 0
                if($versuch_anzahl_alt ==0)
                {
                    $captcha = "Loginversuche verbraucht!";
                    //login button disablen
                    echo "<script> login_sperren(); </script>";
                }
                else
                {
                $versuch_anzahl_neu = $versuch_anzahl_alt -1;

                //wenn anzahl größer null
                if ($versuch_anzahl_neu >0)
                {
                // anzahl verringern
                $sql = "UPDATE cookie 
                        SET Versuche=\"".$versuch_anzahl_neu."\"
                        WHERE cookie_wert= \"".$_COOKIE['sid']."\";";
                
                $result = mysqli_query($verbinde, $sql);
                } 
                // Versuche = 0
                else
                {
                    // Versuche auf 0 setzen
                    $sql = "UPDATE cookie 
                    SET Versuche=\"0\"
                    WHERE cookie_wert= \"".$_COOKIE['sid']."\";";
            
                    $result = mysqli_query($verbinde, $sql);
                    
                    $captcha = "Loginversuche verbraucht!";
                    //login button disablen
                    echo "<script> login_sperren(); </script>";
                }
            }
        }}
    }
        }

/******************************************************************************************** */
// Login Fehler: nicht beide Felder gefüllt
/********************************************************************************************* */
        
        else 
        {
            $B_Fehler2= "Nutzername und Passwort eingeben!";
        }
    }
    

?>

