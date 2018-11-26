<?php
 if ($seitenid== "kasse_1")
{



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

else if ($seitenid=="kasse_2")
{


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

else if ($seitenid== "kasse_3")
{

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
else if ($seitenid == "kasse_4")
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
?>