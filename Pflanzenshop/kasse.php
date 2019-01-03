<?php
/******************************************************************************************** */
// KASSE: Seitenaufbau
/********************************************************************************************* */

//controller einbinden
include "kasse_controller.php";

/******************************************************************************************** */
// KASSE 1
/********************************************************************************************* */
 if ($seitenid== "kasse_1")
{
 // headleiste   
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a  class=\"kasse_nav_active\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";
//div container
// linke seite/////////////////////////////////////////////////////////////////////////////////////
echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";

//eventuelle Meldung bei Nutzersperre//////////////////////////////////////////////
if(isset ($K_Fehler))
{
     echo "<span class=\"fehler\">$K_Fehler</span>";
    echo"<br><br>";
}
//Ausgabe der Nutzerdaten//////////////////////////////////////////////////////////////////////
    echo "<span class=\"kasse_ueberschrift_klein\">Name und Adresse </span><br><br>";
    echo"Vorname:  ".$kasse_vname."<br>";
    echo "Nachname:  ".$kasse_nname."<br>";
    echo "Straße:  ".$kasse_strasse."<br>";
    echo "PLZ,Ort:  ".$kasse_plz." ".$kasse_ort." <br>";
    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br>";
    // änderungs link
    echo "<a class=\"kasse_ueberschrift_klein\">Adresse ändern?</a>";
    echo "<hr>";
   
   //seitenweiterleitung
    //Buttons weiter und zurück////////////////////////////////////////////////////////////////////
    echo "<form method=\"GET\"  action=\"index.php?Seiten_ID=kasse_2\">";
    echo "<button class=\"kasse_button_zurück\"> zurück </button> 
    <button class=\"kasse_button_weiter\" id=\"kasse_1_weiter\" name=\"Seiten_ID\" value=\"kasse_2\"> weiter </button>";
    echo "</form>";
    echo "</div>";

//////////////////////////////////////////////////////////////////////////////////////////////////
//rechte Seite/////////////////////////////////////////////////////////////////////////////////////
echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br><hr>";

echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span> <br> <br>";
echo $wk_art_anzahl." Artikel xx€ <br> <hr>";
echo "Versandkosten 4.95€ <br> <hr>";
echo "<span class=\"kasse_rechts_klein\">Bruttobetrag xx€ </span> <br> <br>";
echo "</div>";
echo "</div>";

}


 /******************************************************************************************** */
// KASSE 2
/********************************************************************************************* */   
// Zahlungsmethode///////////////////////////////////////////////////////////////////////////////

else if ($seitenid=="kasse_2")
{


// headleiste//////////////////////////////////////////////////////////////////////////////////
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav_active\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";

 //div container
 //linke seite////////////////////////////////////////////////////////////////////////////////////   
echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";    
    echo "<span class=\"kasse_ueberschrift_klein\">Wähle eine Zahlungsmethode aus: </span> <br><br> <br>";
    echo "<form method=\"POST\">";

    // csrf////////////////////////////////////////////////////////////////////////////////
    echo "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">";
    echo "Zahlungsart   <select name=\"kasse_zahlungsmethode_zahlungsart\">";

    // zahlart vorbelegen//////////////////////////////////////////////////////////////////////////////////
    //Vorkasse
    if ($kasse_zahlart == "Vorkasse")
    {
      echo"<option selected> Vorkasse </option>
        <option> Rechnung </option>
        <option> Pay Pal</option>
        <option> Lastschrift </option>";
    }
    //Rechnung
    else if ($kasse_zahlart=="Rechnung")
    {
      echo"<option > Vorkasse </option>
        <option selected> Rechnung </option>
        <option> Pay Pal</option>
        <option> Lastschrift </option>";
    }

       //Pay Pal
       else if ($kasse_zahlart=="Pay Pal")
       {
         echo"<option > Vorkasse </option>
           <option > Rechnung </option>
           <option selected> Pay Pal</option>
           <option> Lastschrift </option>";
       }

        //Lastschrift
        else if ($kasse_zahlart=="Lastschrift")
        {
          echo"<option > Vorkasse </option>
            <option > Rechnung </option>
            <option > Pay Pal</option>
            <option selected> Lastschrift </option>";
        }
//////////////////////////////////////////////////////////////////////////////////////////////
        echo"</select> <br>";
// speicher button
    echo "<button class =\"kasse_button_zurück\" name=\"kasse2_zahlart_speichern\" type=\"submit\"> speichern </button>";
    echo "</form>";
    echo " <br> <br> <br> <br> <br> <br> <br> <br><br><br><hr>";

    //Seitenweiterleitung: Buttons///////////////////////////////////////////////////////////////////
    //zurück zu kasse1: "Adresse"
    echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_3\">";
    echo "<button class=\"kasse_button_zurück\"  name=\"Seiten_ID\" value=\"kasse_1\"> zurück </button>";

    //weiter zu kasse3: "kauf abschließen"
    echo "<button class=\"kasse_button_weiter\" name=\"Seiten_ID\"  value=\"kasse_3\"> weiter </button>";
     
    echo "</form>";
      echo "</div>";


///////////////////////////////////////////////////////////////////////////////////////////////////////////
//rechte Seite//////////////////////////////////////////////////////////////////////////////////////////////

echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br><hr>";
// Anschrift ausgeben///////////////////////////////////////////////////////////////////////
echo "<span class=\"kasse_ueberschrift_klein\"> Anschrift </span><br>";
echo $kasse_vname."<br>";
echo $kasse_nname."<br>";
echo $kasse_strasse."<br>";
echo $kasse_plz." ".$kasse_ort." <br><hr>";
echo "<br>";
//Artikelanzahl und Gesamtbetrag////////////////////////////////////////////////////////
echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span>";
echo "</div>";
echo "</div>";
}


 /******************************************************************************************** */
// KASSE 3
/********************************************************************************************* */   
//kauf abschließen /////////////////////////////////////////////////////////////////////////////////////////////////

else if ($seitenid== "kasse_3")
{

    //buttons zur Seitenweiterleitung///////////////////////////////////////////////////

    //zurück zu kasse2: "zahlart"
       echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_4\">";
       echo "<button class=\"kasse_button_zurück\" type=\"submit\" name=\"Seiten_ID\" value=\"kasse_2\"> zurück </button>";
    //weiter zu kasse4: bestellbestätigung
    echo "<button id=\"kasse3_bestellen\" class=\"kasse_button_weiter_disabled\" type=\"submit\" name=\"Seiten_ID\" value=\"kasse_4\" disabled> zahlungspflichtig bestellen </button>";
   
    //csrf///////////////////////////////////////////////////////////////////////
   echo "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">";
    echo "</form>";
    echo "</div>";

///////////////////////////////////////////////////////////////////////////////////////////////////////
//rechte Seite/////////////////////////////////////////////////////////////////////////////////
    echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br><hr>";
//Anschrift ausgeben
echo "<span class=\"kasse_ueberschrift_klein\"> Anschrift </span><br>";
echo $kasse_vname."<br>";
echo $kasse_nname."<br>";
echo $kasse_strasse."<br>";
echo $kasse_plz." ".$kasse_ort." <br> <hr>";
echo "<br>";
//Zahlart ausgeben
echo "<span class=\"kasse_ueberschrift_klein\"> Zahlungmethode </span><br>";
echo $kasse_zahlart."<br> <hr>";
//Gesamtbetrag und Artikelzahl
echo "<span class=\"kasse_rechts_klein\">Gesamtbetrag: </span>";
echo "</div>";
echo "</div>";
}


 /******************************************************************************************** */
// KASSE 4
/********************************************************************************************* */   
// bestellbestätigung///////////////////////////////////////////////////////////////////////////////////////////////
else if ($seitenid == "kasse_4")
{
    //crsf prüfen///////////////////////////////////////// ?????????????????????
    if($_GET['csrf'] !== $_SESSION['csrf_token'])
    {
        die ("ungültiger Token!");
    }
//gültig
else
{
//headleiste//////////////////////////////////////
echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav\"> Kauf abschließen </a> <a class=\"kasse_nav_active\"> Bestellbestätigung </a>";
echo "</div>";

//linke seite////////////////////////////////////////////////////////////////////////////
echo "<div class=\"kasse_div\">";
echo "<div class=\"kasse_links\">";
echo  "<span class=\"kasse_ueberschrift_klein\"> Der Kauf ist abgeschlossen. Wir wünschen viel Spaß mit unseren Produkten </span><br>";
echo "<span class=\"kasse_rechts_ueberschrift\">Ihre Bestellung </span> <br><br>";
echo "<span class=\"kasse_ueberschrift_klein\"> Anschrift </span><br>";

//Anschrift ausgeben

echo $kasse_vname."<br>";
echo $kasse_nname."<br>";
echo $kasse_strasse."<br>";
echo $kasse_plz." ".$kasse_ort." <br>";
echo "<br>";

//Zahlart ausgeben
echo "<span class=\"kasse_ueberschrift_klein\"> Zahlungmethode </span><br>";
echo $kasse_zahlart."<br><br> <br>";

//artikel tabelle darstellen
echo "<span class=\"kasse_ueberschrift_klein\"> bestellte Artikel </span><br>";
echo "<table>";
echo "<tr> ";
echo "<td class=\"kasse_td\"> <img class=\"kasse_artikel_bild\" src=\"img/".$row['art_bild']."\"> </td>";
echo "<td class=\"kasse_td\">".$row['art_name']."</td>";
echo "<td class=\"kasse_td\"> St&uuml;ckzahl: ".$kasse_4_anzahl."<br> je ". $kasse_art_preis." €</td>";
echo "<td class=\"kasse_td\">".$kasse_art_preis * $kasse_4_anzahl." €";
echo "</tr>";
echo "</table>";



//////////////////////////////////////////////////////////////////////////////////////////////
//unten: Kosten und Gesamtbetrag
echo "<br> <br> <br><br><hr>";
echo "Versandkosten: 4,95€ <br>";
echo "Gesamtsumme: <br>";


//Buttons
//
echo "<form method=\"GET\" action=\"index.php\">";
//weiter
echo "<button class=\"kasse_button_zurück\" type=\"submit\" name=\"Seiten_ID\" value=\"index\"> Weiter Shoppen </button>";
//ausdrucken
echo "<button class=\"kasse_button_weiter\"> Ausdrucken </button>";
echo "</form>";
echo "</div>";
echo "</div>";
}
};
?>