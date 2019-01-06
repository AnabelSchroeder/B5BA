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
    echo "<span class=\"kasse_ueberschrift_klein\">Name und Adresse <br><br>
    Bei abweichender Lieferanschrift bitte hier ändern.</span><br><br>";
    //Formular
    echo "<form action=\"#\" method=\"POST\">";

    // csrf////////////////////////////////////////////////////////////////////////////////
    echo "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">";

    echo"Vorname:<input type=\"text\" name=\"liefer_vname\"value=\"".$_SESSION['kasse_vname']."\"><br>";
    echo "Nachname: <input type=\"text\" name=\"liefer_nname\" value=\"".$_SESSION['kasse_nname']."\"><br><br>";
    echo "Strasse: <input type=\"text\" name=\"liefer_strasse\" value=\"".$_SESSION['kasse_strasse']."\"> <br>";
    echo "PLZ: <input type=\"text\" name=\"liefer_plz\" value=\"".$_SESSION['kasse_plz']."\"> <br>";
    echo "Ort: <input type=\"text\" name=\"liefer_ort\" value=\"".$_SESSION['kasse_ort']."\"> <br>";
    echo "<br> <br>";
     // änderungs link
     echo "<input type=\"submit\"  name=\"kasse1_adresse_aendern\" value=\"speichern\">";
    echo "</form> <br> <br> <br> <br> <br> <br> <br>";
   
    echo "<hr>";
   
   //seitenweiterleitung
   //prüfen ob gesperrt
   //gesperrt:
 if (isset($_SESSION['gesperrt']) AND $_SESSION['gesperrt']== true)
   {
    //Buttons weiter und zurück////////////////////////////////////////////////////////////////////
    echo "<form method=\"GET\"  action=\"index.php?Seiten_ID=kasse_2\">";
    echo "<button class=\"kasse_button_zurück\"> abbrechen </button> 
    <button class=\"kasse_button_weiter_disabled\" id=\"kasse_1_weiter\" name=\"Seiten_ID\" value=\"kasse_2\" disabled > weiter </button>";
    echo "</form>";
    echo "</div>";
    
   }
   else{
        //Buttons weiter und zurück////////////////////////////////////////////////////////////////////
    echo "<form method=\"GET\"  action=\"index.php?Seiten_ID=kasse_2\">";
    echo "<button class=\"kasse_button_zurück\"> abbrechen </button> 
    <button class=\"kasse_button_weiter\" id=\"kasse_1_weiter\" name=\"Seiten_ID\" value=\"kasse_2\"enabled> weiter </button>";
    echo "</form>";
    echo "</div>";
   }
  
//////////////////////////////////////////////////////////////////////////////////////////////////
//rechte Seite/////////////////////////////////////////////////////////////////////////////////////
echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br><hr>";
//Anschrift ausgeben

//Gesamtbetrag und Artikelzahl

echo "<span class=\"kasse_ueberschrift_klein\">Gesamtbetrag: </span> <br>";
echo $wk_art_anzahl." Artikel: ".$kasse_gesamt_preis. " € <br> <hr>";
echo "Versandkosten ".$versand." € <br> <hr>";
echo "Bruttobetrag  ".$kasse_bruttobetrag. "€";
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

//eventuelle Meldung bei Nutzersperre//////////////////////////////////////////////
if(isset ($K_Fehler))
{
     echo "<span class=\"fehler\">$K_Fehler</span>";
    echo"<br><br>";
}
//////////////////////////////////////////////////////////////////////////
    echo "<span class=\"kasse_ueberschrift_klein\">Wähle eine Zahlungsmethode aus: </span> <br><br> <br>";
    echo "<form action=\"#\" method=\"POST\">";

    // csrf////////////////////////////////////////////////////////////////////////////////
    echo "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">";
    echo "Zahlungsart   <select name=\"kasse_zahlungsmethode_zahlungsart\">";

    // zahlart vorbelegen//////////////////////////////////////////////////////////////////////////////////
    //Vorkasse
    if ($_SESSION['kasse_zahlart'] == "Vorkasse")
    {
      echo"<option selected> Vorkasse </option>
        <option> Rechnung </option>
        <option> Pay Pal</option>
        <option> Lastschrift </option>";
    }
    //Rechnung
    else if ($_SESSION['kasse_zahlart']=="Rechnung")
    {
      echo"<option > Vorkasse </option>
        <option selected> Rechnung </option>
        <option> Pay Pal</option>
        <option> Lastschrift </option>";
    }

       //Pay Pal
       else if ($_SESSION['kasse_zahlart']=="Pay Pal")
       {
         echo"<option > Vorkasse </option>
           <option > Rechnung </option>
           <option selected> Pay Pal</option>
           <option> Lastschrift </option>";
       }

        //Lastschrift
        else if ($_SESSION['kasse_zahlart']=="Lastschrift")
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
     //prüfen ob gesperrt
   //gesperrt:
   if (isset($_SESSION['gesperrt']) AND $_SESSION['gesperrt']== true)
   {
       //zurück zu kasse1: "Adresse"
    echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_3\">";
    echo "<button class=\"kasse_button_zurück\"  name=\"Seiten_ID\" value=\"kasse_1\" disabled> zurück </button>";

    //weiter zu kasse3: "kauf abschließen"
    echo "<button class=\"kasse_button_weiter\" name=\"Seiten_ID\"  value=\"kasse_3\" disabled> weiter </button>";
     
    echo "</form>";
   }

   else{
    //zurück zu kasse1: "Adresse"
    echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_3\">";
    echo "<button class=\"kasse_button_zurück\"  name=\"Seiten_ID\" value=\"kasse_1\"> zurück </button>";
    echo "</form>";

    //weiter zu kasse3: "kauf abschließen"
    echo "<form method=\"Post\" action=\"index.php?Seiten_ID=kasse_3\">";
    echo "<button class=\"kasse_button_weiter\" name=\"Seiten_ID\"  value=\"kasse_3\"> weiter </button>";
    echo "<input type=\"hidden\" name=\"kontrolle\">";
    echo "</form>";
   }
      echo "</div>";


///////////////////////////////////////////////////////////////////////////////////////////////////////////
//rechte Seite//////////////////////////////////////////////////////////////////////////////////////////////

echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br><hr>";
//Anschrift ausgeben
echo "<span class=\"kasse_ueberschrift_klein\"> Anschrift </span><br>";
echo $_SESSION['kasse_vname']."<br>";
echo $_SESSION['kasse_nname']."<br>";
echo $_SESSION['kasse_strasse']."<br>";
echo $_SESSION['kasse_plz']." ".$_SESSION['kasse_ort']." <br> <hr>";
echo "<br>";

//Gesamtbetrag und Artikelzahl

echo "<span class=\"kasse_ueberschrift_klein\">Gesamtbetrag: </span> <br>";
echo $wk_art_anzahl." Artikel: ".$kasse_gesamt_preis. " € <br> <hr>";
echo "Versandkosten ".$versand." € <br> <hr>";
echo "Bruttobetrag  ".$kasse_bruttobetrag. "€";
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
    if(!isset($_SESSION['gesperrt'])) 
 {
    if( isset($_POST['kontrolle']) || isset($_POST['kasse_3_anzahl_up']) || isset($_POST['kasse_3_anzahl_down']))
{
    echo "<form method=\"GET\" action=\"index.php?Seiten_ID=kasse_2\">";
    echo "<button class=\"kasse_button_zurück\" type=\"submit\" name=\"Seiten_ID\" value=\"kasse_2\"> zurück </button>";
     echo "</form>";


     echo "<form method=\"POST\" action=\"index.php?Seiten_ID=kasse_4\">";
    //weiter zu kasse4: bestellbestätigung
 echo "<button id=\"kasse3_bestellen\" class=\"kasse_button_weiter_disabled\" type=\"submit\" name=\"bestellung\" value=\"kasse_4\" disabled> zahlungspflichtig bestellen </button>";

 //csrf///////////////////////////////////////////////////////////////////////
echo "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">";
 echo "</form>";
   }}
    echo "</div>";

///////////////////////////////////////////////////////////////////////////////////////////////////////
//rechte Seite/////////////////////////////////////////////////////////////////////////////////
    echo "<div class=\"kasse_rechts\">";
echo "<span class=\"kasse_rechts_ueberschrift\">Bestellübersicht </span> <br><hr>";
//Anschrift ausgeben
echo "<span class=\"kasse_ueberschrift_klein\"> Anschrift </span><br>";
echo $_SESSION['kasse_vname']."<br>";
echo $_SESSION['kasse_nname']."<br>";
echo $_SESSION['kasse_strasse']."<br>";
echo $_SESSION['kasse_plz']." ".$_SESSION['kasse_ort']." <br> <hr>";
echo "<br>";
//Zahlart ausgeben
echo "<span class=\"kasse_ueberschrift_klein\"> Zahlungmethode </span><br>";
echo $_SESSION['kasse_zahlart']."<br> <hr><br>";
//Gesamtbetrag und Artikelzahl

echo "<span class=\"kasse_ueberschrift_klein\">Gesamtbetrag: </span> <br>";
echo $wk_art_anzahl." Artikel: ".$kasse_gesamt_preis. " € <br> <hr>";
echo "Versandkosten ".$versand." € <br> <hr>";
echo "Bruttobetrag  ".$kasse_bruttobetrag. "€";
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
   /* if($_GET['csrf'] !== $_SESSION['csrf_token'])
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
echo $kasse_zahlart."<br><br> <br>"; */





//////////////////////////////////////////////////////////////////////////////////////////////
//unten: Kosten und Gesamtbetrag
echo "<br> <br> <br><br><hr>";
echo "Versandkosten:". $versand." € <br>";
echo "Gesamtsumme:" .$kasse_bruttobetrag. " €<br>";


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

};
?>