<?php

//Datenbank einbinden
$host = "localhost";
$user = "root";
$pass = "";
$dbase = "ba_webshop";

$verbinde = mysqli_connect($host,$user,$pass);
$con = mysqli_select_db($verbinde,$dbase);

 echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"pflanzenshop.css\">";

echo "<html>";
    echo "<body>";
 
$seite = "kasse_1";

if ($seite== "landing") {

//landing page

  
    
    echo "header";
    echo "<br>";
    
echo "<div class=\"landing_container\">";
    
    echo "<div class=\"landing_mosaik_1\">";
    
        echo "<span class=\"landing_mosaik_weiß\"> Bonsai </span> <br>";

        echo "<button class=\"button1\"> Jetzt kaufen </button>";
    echo "</div>";
    
    
    
      echo "<div class=\"landing_mosaik_2\">";
    
            echo "<span class=\"landing_mosaik_weiß\"> Blume </span> <br>";

            echo "<button class=\"button1\"> Jetzt kaufen </button>";
      echo "</div>";
    
    
     echo "<div class=\"landing_mosaik_3\">";
  
        echo "<span class=\"landing_mosaik_weiß\"> Kaktus </span> <br>";

        echo "<button class=\"button1\"> Jetzt kaufen </button>";
     echo "</div>";
    
    
    
    
     echo "<div class=\"landing_mosaik_4\">";

        echo "<span class=\"landing_mosaik_weiß\"> Gr&uuml;npflanze </span> <br>";

        echo "<button class=\"button1\"> Jetzt kaufen </button>";
     echo "</div>";
    
    
 
    
    echo "<div class=\"landing_mosaik_5\">";
    
        echo "<span class=\"landing_mosaik_weiß\"> Schenken </span> <br>";

        echo "<button class=\"button1\"> Jetzt kaufen </button>";
    echo "</div>";
 
echo "</div> <br><br>";


echo "<div class=\"landing_slogan_container\"> <span class=\"landing_slogan_schrift\"> SLOGAN </span> </div>";

echo "<div class=\"landing_neuheiten_container\">";
echo "Unsere Neuheiten <br> <br>";
    
echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\"> Schwertfarn </span><br>";
    echo "<span> 29,99€ </span>";
echo "</div>";
 
echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\"> Schwertfarn </span><br>";
    echo "<span> 29,99€ </span>";
echo "</div>";
    
echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\"> Schwertfarn </span><br>";
    echo "<span> 29,99€ </span>";
echo "</div>";
    
echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\"> Schwertfarn </span><br>";
    echo "<span> 29,99€ </span>";
echo "</div>";
    
echo "</div>";
}

else if ($seite == "login")
{


// login
$_Get = login;
   
echo "header";
echo "<div class=\"user_login_bg\">";
    echo "<div class=\"user_login_container\">";
    echo "<form action=\"pflanzenshop_AS.php\"  name=\"Login\" method=\"POST\">";
    echo "<div class=\"user_login_div\">";
        echo "<div class=\"user_login_div_headleiste_l\"> Login </div>";
    
        echo "<div class=\"user_login_div_links\">";
        
        echo "Benutzer <input class=\"user_login_form\" type=\"text\" name=\"login_name\" placeholder=\"Nutzername\"> <br>";
        echo "Passwort <input class=\"user_login_form\" type=\"text\" name=\"login_pass\" placeholder=\"Passwort\"> <br>";
        echo "<input class=\"button1\" name=\"user_login\" onclick=\"return user_login_pruefe()\" type=\"submit\" value=\"Login\" \">";
       
        echo "</div>";
    echo "</div>";


    echo "<div class=\"user_login_div\">";
        echo "<div class=\"user_login_div_headleiste_r\"> Konto erstellen </div>";
    
        echo "<div class=\"user_login_div_rechts\">";
        
        echo "Du hast noch kein Konto bei uns? <br> <br>";
        echo "Dann Melde dich einfach an!";
        echo "<input class=\"button1\" name=\"registrieren\" type=\"submit\" value=\"Jetzt registrieren\"> <br>";
           
        echo "</div>";
        echo "<div class=\"clear\"> </div>";
    echo "</form>";
echo "</div>";
echo "<div>";
    
}


else if ($seite == "User_registration")
{

//registrieren
include "registrierung.php";
$_GET = User_registration;
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



//Kasse

// Adresse

else if ($seite== "kasse_1")
{

$_GET = Kasse_1;

echo "header";
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";

echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";
    echo "<span class=\"kasse_ueberschrift_klein\">Name und Adresse </span> <br>";
    echo "Vorname <br>";
    echo "Nachname <br>";
    echo "Straße <br>";
    echo "PLZ, Ort <br>";
    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br>";
    echo "<a class=\"kasse_ueberschrift_klein\">Adresse ändern?</a>";
    echo "  <hr>";
    echo "<button class=\"kasse_button_zurück\"> zurück </button> <button class=\"kasse_button_weiter\"> weiter </button>";
echo "</div>";

echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br>";
echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span>";
echo "</div>";
echo "</div>";

}


    
// Zahlungsmethode

else if ($seite=="kasse_2")
{
$_GET = Kasse_2;

echo "header";
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";

    
echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";    
    echo "<span class=\"kasse_ueberschrift_klein\">Wähle eine Zahlungsmethode aus: </span> <br>";
    echo "<form method=\"POST\">";
    echo "Zahlungsart   <select name=\"kasse_zahlungsmethode_zahlungsart\">
                    <option> Vorkasse </option>
                    <option> Rechnung </option>
                    <option> Pay Pal</option>
                    <option> Lastschrift </option>
                    </select> <br>";
    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br><hr>";
      echo "<button class=\"kasse_button_zurück\"> zurück </button> <button class=\"kasse_button_weiter\"> weiter </button>";
echo "</div>";


echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br>";
echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span>";
echo "</div>";
echo "</div>";
}


//kauf abschließen

else if ($seite == "kasse_3")
{
$_GET = Kasse_3;
echo "header";
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";
    

echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";
    echo "<span class=\"kasse_ueberschrift_klein\">Überprüfe deine Bestellung und schließe den Kauf ab:</span><br>";
    echo "Inhalt warenkorb<br><br><br><br><br> <br><br> <br> <br><br>";

    echo "<input type=\"checkbox\" name=\AGB_check\"> <span class=\"kasse_rechts_klein\">Ich akzeptiere die <a class=\"kasse_ueberschrift_klein\"> AGB</a> und die <a class=\"kasse_ueberschrift_klein\"> Datenschutzbestimmungen </a> und bestätige die Korrektheit meiner Daten.</span>";
    echo "<hr>";
    echo "<button class=\"kasse_button_zurück\"> zurück </button> <input class=\"kasse_button_weiter\" type=\"submit\" name=\"bestellen\" value=Zahlungspflichtig bestellen\">";
echo "</div>";
    
    
    echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br>";
echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span>";
echo "</div>";
echo "</div>";
}

// bestellbestätigung
else if ($seite == "kasse_4")
{

$_GET = Kasse_4;

echo "header";
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";
    
echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";
echo  "<span class=\"kasse_ueberschrift_klein\"> Der Kauf ist abgeschlossen. Wir wünschen viel Spaß mit unseren Produkten </span><br>";
echo "<span class=\"kasse_rechts_ueberschrift\">Ihre Bestellung </span> <br><br>";
echo "<span class=\"kasse_ueberschrift_klein\"> Anschrift </span><br> <br> <br><br><br><br> <br>";



echo "<button class=\"kasse_button_zurück\"> Weiter Shoppen </button> <button class=\"kasse_button_weiter\"> Ausdrucken </button>";
echo "</div>";
echo "</div>";

};



/*if (isset ($_POST['registrieren']))
{
    $seite = "User_registration";
    
}
*/

echo"</body>";
echo "</html>";



echo "<script src=\"pflanzenshop.js\"></script>"

    
?>

    