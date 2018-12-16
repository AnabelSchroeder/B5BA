<?php
include "kasse_controller.php";
 if ($seitenid== "kasse_1")
{
    



echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a  class=\"kasse_nav_active\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";

echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";

//eventuelle Meldung bei Nutzersperre
if(isset ($K_Fehler))
{
     echo "<span class=\"fehler\">$K_Fehler</span>";
    echo"<br>";
}
//Ausgabe der Nutzerdaten
    echo "<span class=\"kasse_ueberschrift_klein\">Name und Adresse </span> <br>";
    echo"Vorname:  ".$kasse_vname."<br>";
    echo "Nachname:  ".$kasse_nname."<br>";
    echo "Straße:  ".$kasse_strasse."<br>";
    echo "PLZ,Ort:  ".$kasse_plz." ".$kasse_ort." <br>";
    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br>";
    echo "<a class=\"kasse_ueberschrift_klein\">Adresse ändern?</a>";
    echo "<hr>";

   
    //Buttons weiter und zurück
    echo "<form method=\"GET\"  action=\"index.php?Seiten_ID=kasse_2\">";
    echo "<button class=\"kasse_button_zurück\"> zurück </button> 
    <button class=\"kasse_button_weiter\" id=\"kasse_1_weiter\" name=\"Seiten_ID\" value=\"kasse_2\"> weiter </button>";
    echo "</form>";
    echo "</div>";

//rechte Seite
echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br>";
echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span>";
echo "</div>";
echo "</div>";

}


    
// Zahlungsmethode///////////////////////////////////////////////////////////////////////////////

else if ($seitenid=="kasse_2")
{


echo "header";
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav_active\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";

    
echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";    
    echo "<span class=\"kasse_ueberschrift_klein\">Wähle eine Zahlungsmethode aus: </span> <br>";
    echo "<form method=\"POST\">";
    echo "Zahlungsart   <select name=\"kasse_zahlungsmethode_zahlungsart\">
                    <option selected>".$kasse_zahlart."</option>
                    <option> Vorkasse </option>
                    <option> Rechnung </option>
                    <option> Pay Pal</option>
                    <option> Lastschrift </option>
                    </select> <br>";
    echo "<button class =\"kasse_button_zurück\" name=\"kasse2_zahlart_speichern\" type=\"submit\"> speichern </button>";
    echo "</form>";
    echo " <br> <br> <br> <br> <br> <br> <br> <br><br><br><hr>";

    // Buttons
    //zurück zu kasse1: "Adresse"
    echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_1\">";
    echo "<button class=\"kasse_button_zurück\" type=\"submit\" name=\"Seiten_ID\" value=\"kasse_1\"> zurück </button>";
    echo "</form>";

    //weiter zu kasse3: "kauf abschließen"
    echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_3\">";
        echo "<button class=\"kasse_button_weiter\" name=\"Seiten_ID\" type=\"submit\" value=\"kasse_3\"> weiter </button>";
    echo "</form>";
      echo "</div>";
//rechte Seite

echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br>";
echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span>";
echo "</div>";
echo "</div>";
}


//kauf abschließen /////////////////////////////////////////////////////////////////////////////////////////////////

else if ($seitenid== "kasse_3")
{

//nav anzeige
/*
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav_active\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";
    
//container links
/*echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";
    echo "<span class=\"kasse_ueberschrift_klein\">Überprüfe deine Bestellung und schließe den Kauf ab:</span><br>";
    echo "<table>";
    echo "</table>";
    echo "<input type=\"checkbox\" id=\"AGB_check\" name=\AGB_check\" oncheck= \"return clickbar()\"> <span class=\"kasse_rechts_klein\">Ich akzeptiere die <a class=\"kasse_ueberschrift_klein\"> AGB</a> und die <a class=\"kasse_ueberschrift_klein\"> Datenschutzbestimmungen </a> und bestätige die Korrektheit meiner Daten.</span>";
    echo "<hr>";
*/
    //buttons

    //zurück zu kasse2: "zahlart"
       echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_2\">";
       echo "<button class=\"kasse_button_zurück\" type=\"submit\" name=\"Seiten_ID\" value=\"kasse_2\"> zurück </button>";
       echo "</form>";

    //weiter zu kasse4: bestellbestätigung
    echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_4\">";
  
   echo "<button id=\"kass3_bestellen\" class=\"kasse_button_weiter_disabled\" type=\"submit\" name=\"Seiten_ID\" value=\"kasse_4\" disabled> zahlungspflichtig bestellen </button>";
    echo "</form>";
    echo "</div>";
    
    //rechte Seite
    echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br>";
echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span>";
echo "</div>";
echo "</div>";
}

// bestellbestätigung///////////////////////////////////////////////////////////////////////////////////////////////
else if ($seitenid == "kasse_4")
{



//nav anzeige
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav_active\"> Bestellbestätigung </a>";
echo "</div>";

//linke seite
echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";
echo  "<span class=\"kasse_ueberschrift_klein\"> Der Kauf ist abgeschlossen. Wir wünschen viel Spaß mit unseren Produkten </span><br>";
echo "<span class=\"kasse_rechts_ueberschrift\">Ihre Bestellung </span> <br><br>";
echo "<span class=\"kasse_ueberschrift_klein\"> Anschrift </span><br>";

//Anschrift ausgeben
echo "Anschrift <br>";
echo $kasse_vname."<br>";
echo $kasse_nname."<br>";
echo $kasse_strasse."<br>";
echo $kasse_plz." ".$kasse_ort." <br>";
echo "<br>";

//Zahlart ausgeben
echo "Zahlungsmethode <br>";
echo $kasse_zahlart."<br>";

echo "<table>";
echo "<tr> ";
echo "<td class=\"kasse_td\"> <img class=\"kasse_artikel_bild\" src=\"img/".$row['art_bild']."\"> </td>";
echo "<td class=\"kasse_td\">".$row['art_name']."<br> <button> artikel löschen</button> </td>";
echo "<td class=\"kasse_td\">".$zeile['anzahl_art']."<br> je ".$row['art_preis']." €</td>";
echo "<td class=\"kasse_td\">".$row['art_preis'] * $zeile['anzahl_art']." €";
echo "</tr>";
echo "</table>";


echo "Versandkosten: 4,95€ <br>";
echo "Gesamtsumme: <br>";


//Buttons
//zurück
echo "<form method=\"GET\" action=\"index.php\">";
echo "<button class=\"kasse_button_zurück\" type=\"submit\" name=\"Seiten_ID\" value=\"index\"> Weiter Shoppen </button>";
echo "</form>";
echo "<button class=\"kasse_button_weiter\"> Ausdrucken </button>";
echo "</div>";
echo "</div>";

};
?>