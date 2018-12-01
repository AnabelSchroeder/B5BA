<?php
    //Datenbank einbinden
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbase = "ba_webshop";
    
    $verbinde = mysqli_connect($host,$user,$pass);
    $con = mysqli_select_db($verbinde, $dbase);




//eingabe überprüfen
    if (isset( $_POST['login_name']))
    {
// beide felder gefüllt?
        if($_POST['login_name']!= "" AND $_POST['login_pass']!= "")

        {
           // überprüfen, ob Daten gültig

            $sql = "SELECT n_id FROM nutzer WHERE n_login =\"".$_POST['login_name']."\" AND n_passwort=\"".$_POST['login_pass']."\";";
            $result = mysqli_query($verbinde, $sql);
          
            // wenn Kombination richtig, weiterleitung  zur Index
            if (mysqli_num_rows ($result) > 0)
                {
                    while ($zeile = mysqli_fetch_assoc($result))
                    {
                         header("Location: index.php");
                    }
                }
            //Fehlermeldung, wenn Kombination falsch
            else
            {
                $B_Fehler= "Nutzername oder Passwort falsch!";
            }
         

        }
        // Fehlermeldung, wenn nicht beide Felder ausgefüllt wurden
        else 
        {
            $B_Fehler2= "Nutzername und Passwort eingeben!";
        }
    }

?>

