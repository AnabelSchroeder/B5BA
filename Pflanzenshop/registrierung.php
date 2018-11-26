<?php
/*nutzer daten vom registrieren in die Datenbank aufnehmen */

if (isset ($_POST['user_registration_speichern']))
{
    $sql = "INSERT INTO nutzer
            (
                n_nname,
                n_vname,
                n_strasse,
                n_ort,
                n_plz,
                n_mail,
                n_login,
                n_passwort,
                n_sperre,
                n_zahlart
                
            )
            
            VALUES
            (
                
                \"".$_POST['user_registrieren_nname']."\",
                \"".$_POST['user_registrieren_vname']."\",
                \"".$_POST['user_registrieren_strasse']."\",
                \"".$_POST['user_registrieren_ort']."\",
                \"".$_POST['user_registrieren_plz']."\",
                \"".$_POST['user_registrieren_mail']."\",
                \"".$_POST['user_registrieren_login_name']."\",
                \"".$_POST['user_registrieren_passwort']."\",
                false,
                \"".$_POST['user_registrieren_zahlart']."\"
            );";
    $sql = mysqli_query($verbinde, $sql) OR die (mysqli_error());


    echo "Daten egspeichert";
}


/*if (isset ($_POST['user_login']))
{
    
    
}

*/
?>