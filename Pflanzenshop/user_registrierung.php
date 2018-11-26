<?php
 if ($seitenid == "user_registration")
{

//registrieren
include "registrierung.php";

echo "header";
echo "<div class=\"user_login_bg\">";
    echo "<div class=\"user_registration_div\">";
     echo "<div class=\"user_registration_headleiste\"> </div>";
    echo "<div class=\"user_registration_form\">";
        echo "<form method=\"POST\"  action=\"#\" name=\"Registration\">";
    
        echo "<table>";
        
            echo "<tr>";
                echo "<td>Vorname</td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_vname\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                 echo "<td> Nachname </td>";
                 echo "<td><input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_nname\"> </td>";
            echo "</td>";
    
            echo "<tr>";
                echo "<td>Straße </td>";
                echo "<td><input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_straße\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                echo "<td>PLZ, Ort </td>";
                echo "<td> <input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_plz\"> 
                <input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_ort\"></td>";
            echo "</tr>";
    
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
    
            echo "<tr>";
                echo "<td> E-Mail </td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_email\"> </td>";
            echo "</tr>";
    
            echo "</table>";
                echo "<button class=\"button2\"> Abbrechen </button> <input class=\"button1\" onclick=\"return user_registration_pruefe()\" type=\"submit\" name=\"User_Registration_speichern\" value=\"Speichern\">";
    echo"</div>";
echo "</div>";
echo "</div>";

}
?>