<?php
 if ($seitenid == "user_registration")
{
    //Datenbank einbinden
$host = "localhost";
$user = "root";
$pass = "";
$dbase = "ba_webshop";

$verbinde = mysqli_connect($host,$user,$pass);
$con = mysqli_select_db($verbinde,$dbase);

//registrieren
//controller für sql includieren
include "registrierung_controller.php";

echo "header";
//div container gerüst
echo "<div class=\"user_login_bg\">";
    echo "<div class=\"user_registration_div\">";
     echo "<div class=\"user_registration_headleiste\"> </div>";
// formular
    echo "<div class=\"user_registration_form\">";
        echo "<form method=\"POST\"  action=\"#\" name=\"Registration\">";
    
        echo "<table>";
     //Namensfelder  
            echo "<tr>";
                echo "<td>Vorname</td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_vname\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                 echo "<td> Nachname </td>";
                 echo "<td><input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_nname\"> </td>";
            echo "</td>";
    //Adresse
            echo "<tr>";
                echo "<td>Straße </td>";
                echo "<td><input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_strasse\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                echo "<td>PLZ, Ort </td>";
                echo "<td> <input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_plz\"> 
                <input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_ort\"></td>";
            echo "</tr>";
    //zahlart
            echo "<tr>";
                echo "<td>Zahlungsart </td>";
                echo "<td><select class=\"user_login_form\"name=\"user_registrieren_zahlart\">
                <option> Vorkasse </option>
                <option> Rechnung </option>
                <option> Pay Pal</option>
                <option> Lastschrift </option>
                </select> </td>";
            echo "</tr>";
          
            echo "<tr> <td></td></tr>";
            
    //logindaten
           
            echo "<tr>";
                echo "<td>Login Name</td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_login_name\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                echo "<td> Passwort</td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_passwort\" min-length=\"8\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                echo "<td>Passwort wiederholen<td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_passwort2\" min-length=\"8\"> </td>";
            echo "</tr>";
    //mail
            echo "<tr>";
                echo "<td> E-Mail </td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_mail\"> </td>";
            echo "</tr>";
    
            echo "</table>";
 // Button zum Formular senden           
                echo "<button class=\"button2\"> Abbrechen </button> <input class=\"button1\" onclick=\"return user_registration_pruefe()\" type=\"submit\" name=\"user_registration_speichern\" value=\"Speichern\">";
    echo"</div>";
echo "</div>";
echo "</div>";

}
?>