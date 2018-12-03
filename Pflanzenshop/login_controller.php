<?php
    //Datenbank einbinden
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbase = "ba_webshop";
    
    $verbinde = mysqli_connect($host,$user,$pass);
    $con = mysqli_select_db($verbinde, $dbase);


//session aufnehmen
session_start();

//einlogversuche zählen
if (isset($_POST['user_login']))
{
    $_SESSION['versuche']--;

    if ($_SESSION['versuche']==0)
    {
        echo "drei Loginversuche verbraucht";
    }
}

    //eingabe überprüfen
    if (isset( $_POST['login_name']))
    {
        //übermittelte seiten id der vorher aufgerufenen seite speichern
        $seiten_zurück =$_POST['seiten_zurück'];
// beide felder gefüllt?
        if($_POST['login_name']!= "" AND $_POST['login_pass']!= "")

        {
           // überprüfen, ob Loginname gültig
           $sql = "SELECT n_id, n_passwort FROM nutzer WHERE n_login =\"".$_POST['login_name']."\";";
            $result = mysqli_query($verbinde, $sql);
         
            if (mysqli_num_rows ($result) > 0)
            {   
                while ($zeile = mysqli_fetch_assoc($result))
                {
                //nutzerid speichern
                $_nutzer = $zeile['n_id'];
                //eingegebenes Passwort speichern
                $passwort = $_POST['login_pass'];
                //gehashtes Passwort aus der Datenbank 
                $hash = $zeile['n_passwort'];
               

             
//prüfen, ob Passwort und Hash übereinstimmen
                if (password_verify($passwort, $hash))
                {
                //login cookie setzen    
                //setcookie("login_cookie",$sid, time()+1800);

                // seitenweiterleitung über die id variable
               // $seitenid = $seiten_zuürck;
                 header("Location: index.php");

                
                $_SESSION['loged_in'] = "true";
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

