<?php
/*nutzer daten vom registrieren in die Datenbank aufnehmen */

//javascript einbinden formulareingaben überprüfen
echo "<script src=\"pflanzenshop.js\"></script>";

if (isset ($_POST['user_registration_speichern']))
{
    //Loginname überprüfen: noch nicht vorhanden?
  //  $e_loginname= $_POST['user_registrieren_login_name'];
    $sql ="SELECT * FROM nutzer WHERE n_login =\"".$_POST['user_registrieren_login_name']."\";";
    $result= mysqli_query($verbinde, $sql);

    if (mysqli_num_rows ($result) > 0)
            {   
                echo "vergeben";
              //  echo "<script> clear_loginname() </script>";
              $R_Fehler = "Dieser Loginname ist bereits vergeben!";
            }
    else
    {

    $passwort = $_POST['user_registrieren_passwort'];
    $hash = password_hash($passwort, PASSWORD_DEFAULT);
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
                \"".$hash."\",
                false,
                \"".$_POST['user_registrieren_zahlart']."\"
            );";
    $sql = mysqli_query($verbinde, $sql) OR die (mysqli_error());


    echo "Daten egspeichert";
}
}

/*if (isset ($_POST['user_login']))
{
    
    
}

*/
?>