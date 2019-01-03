<?php
/******************************************************************************************** */
// Login: Registrierung: Controller
/********************************************************************************************* */

//javascript einbinden formulareingaben überprüfen
echo "<script src=\"pflanzenshop.js\"></script>";

//wenn button gesetzt
if (isset ($_POST['user_registration_speichern']))
{
    
/******************************************************************************************** */
// prüfen ob Loginname schon vergeben
/********************************************************************************************* */
    $sql ="SELECT * FROM nutzer WHERE n_login =\"".$_POST['user_registrieren_login_name']."\";";
    $result= mysqli_query($verbinde, $sql)OR die(mysqli_error);

    if (mysqli_num_rows ($result) > 0)
            {
// Loginname schon vergeben//////////////////////////////////////////////////      
                echo "vergeben";
             $R_Fehler = "Dieser Loginname ist bereits vergeben!";
            }
//Loginname frei: User Registrierung durchführen
    else
    {

    $passwort = $_POST['user_registrieren_passwort'];
    //Passwort hashen
    $hash = password_hash($passwort, PASSWORD_DEFAULT);
    //Daten in Tabelle nutzer einfügen
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
                
                \"".htmlspecialchars($_POST['user_registrieren_nname'], ENT_QUOTES, 'utf-8')."\",
                \"".htmlspecialchars($_POST['user_registrieren_vname'],ENT_QUOTES, 'utf-8')."\",
                \"".htmlspecialchars($_POST['user_registrieren_strasse'],ENT_QUOTES, 'utf-8')."\",
                \"".htmlspecialchars($_POST['user_registrieren_ort'],ENT_QUOTES, 'utf-8')."\",
                \"".htmlspecialchars($_POST['user_registrieren_plz'],ENT_QUOTES, 'utf-8')."\",
                \"".htmlspecialchars($_POST['user_registrieren_mail'],ENT_QUOTES, 'utf-8')."\",
                \"".htmlspecialchars($_POST['user_registrieren_login_name'],ENT_QUOTES, 'utf-8')."\",
                \"".htmlspecialchars($hash,ENT_QUOTES, 'utf-8')."\",
                false,
                \"".$_POST['user_registrieren_zahlart']."\"
            );";
    $sql = mysqli_query($verbinde, $sql) OR die (mysqli_error());


    echo "Daten egspeichert";
}
}


?>