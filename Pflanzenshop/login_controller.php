<?php

    //Datenbank einbinden
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbase = "ba_webshop";
    
    $verbinde = mysqli_connect($host,$user,$pass);
    $con = mysqli_select_db($verbinde, $dbase);


//session aufnehmen




    //eingabe überprüfen
    if (isset( $_POST['login_name']))
    {
        //übermittelte seiten id der vorher aufgerufenen seite speichern
       // $seiten_zurück =$_POST['seiten_zurück'];
// beide felder gefüllt?
        if($_POST['login_name']!= "" AND $_POST['login_pass']!= "")

        {
           // überprüfen, ob Loginname gültig
           $sql = "SELECT n_id, n_admin, n_passwort FROM nutzer WHERE n_login =\"".$_POST['login_name']."\";";
            $result = mysqli_query($verbinde, $sql);
         
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
               

             
//prüfen, ob Passwort und Hash übereinstimmen
                if (password_verify($passwort, $hash))
                {
                
                //neue Session id
               // function session_regenerate_id();

                // seitenweiterleitung über die id variable
                $expire = time();
               // echo $expire;

                $_SESSION['csrf_token'] = md5(openssl_random_pseudo_bytes(32));
               
                

                $sql = "UPDATE cookie
                        SET n_id =\"".$nutzer."\", logged_in =true, expire=\"".$expire."\",  CRSF=\"abc\"  
                        WHERE cookie_wert= \"".$_COOKIE['sid']."\";";
                $result = mysqli_query($verbinde, $sql);
                echo "eingeloggt";
               header("Location: index.php");
                }
                    
             
            
          
            //Fehlermeldung, wenn Kombination falsch
            else
            {
                $B_Fehler= "Nutzername oder Passwort falsch!";
            }
        }

        }
        // Fehlermeldung, wenn nicht beide Felder ausgefüllt wurden
        else 
        {
            $B_Fehler2= "Nutzername und Passwort eingeben!";
        }
    }
    }

?>

