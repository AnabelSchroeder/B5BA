<?php
  //Datenbank einbinden
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbase = "ba_webshop";
  
  $verbinde = mysqli_connect($host,$user,$pass);
  $con = mysqli_select_db($verbinde,$dbase);




//überprüfung, ob eingeloggt//////////////////////////////////////////////////////////////
if ($seitenid== "kasse_1" || "kasse_2" || "kasse_3" || "kasse_4")
{
$sql ="SELECT logged_in, expire  FROM cookie WHERE cookie_wert=\"".$_COOKIE['sid']."\";";
$result = mysqli_query($verbinde, $sql);

if (mysqli_num_rows ($result) > 0)
        {   
            while ($zeile = mysqli_fetch_assoc($result))
            {
                $logged_in = $zeile['logged_in'];
                $expire = $zeile['expire'];
                $time_aktuell = time();
                
            }
        }
//nicht eingeloggt
//weiterleitung zu login wenn nicht eingeloggt////////////////////////////////////////////



   if ($logged_in == false  AND $seitenid =="kasse_1")
    {
        echo "nicht eingeloggt";
  
        header("Location:index.php?Seiten_ID=login");
    }

//////////////////////////////////////////////////////////////////////////////////////////////

//eingeloggt

//expire überprüfen: abgelaufen:
if ($logged_in == true AND $expire < $time_aktuell AND $seitenid =="kasse_1" )
    {
       $sql = "UPDATE cookie
       SET logged_in = false
       WHERE cookie_wert=\"".$_COOKIE['sid']."\";";
       $result = mysqli_query($verbinde, $sql);
  
        header("Location:index.php?Seiten_ID=login");
    }

// Nutzerdaten zur Nutzerid (übermittelt vom Login) selektieren



    if ($logged_in==true AND $expire > $time_aktuell)
 
//cookie id ermitteln
{


//user daten selektieren

$sql ="SELECT cookie_id, n_id FROM cookie WHERE cookie_wert =\"".$_COOKIE['sid']."\";";
$result = mysqli_query($verbinde, $sql);
         
        if (mysqli_num_rows ($result) > 0)
        {   
            while ($zeile = mysqli_fetch_assoc($result))
            { 
                $cookie_id=$zeile['cookie_id'];
                $kasse_n_id = $zeile['n_id'];
            }
        }





      //nutzerdaten selektieren
       $sql = "SELECT * FROM nutzer WHERE n_id=\"".$kasse_n_id."\";";
        $result = mysqli_query($verbinde, $sql);
         
        if (mysqli_num_rows ($result) > 0)
        {   
            while ($zeile = mysqli_fetch_assoc($result))
            {
                
 //sperre abprüfen//////////////////////////////////////////////////////////////
                $sperre=$zeile['n_sperre'];

//gesperrt:
// benachrichtigung und weiter button disablen
                if($sperre== 1)
                {
                    $K_Fehler = "Sie sind derzeit gesperrt. Ein Bestellvorgang ist nicht möglich!";
                    echo "<script type=\"text/javascript\"> kasse_sperren(); </script>";
                }
//////////////////////////////////////////////////////////////////////////////
                //Name und Adresse in Variablen speichern
                $kasse_vname= $zeile['n_vname'];
               
                $kasse_nname= $zeile['n_nname'];
            
                $kasse_strasse= $zeile['n_strasse'];
                
                $kasse_plz= $zeile['n_plz'];
                $kasse_ort = $zeile['n_ort'];

                $kasse_zahlart = $zeile['n_zahlart'];
            }
    } 
    
//warenkorbdaten selektieren für anzahl und gesamtbetrag
$sql= "SELECT korb_id FROM warenkorb WHERE cookie_id=\"".$cookie_id."\";";
$result = mysqli_query($verbinde, $sql);
         
if (mysqli_num_rows ($result) > 0)
{   
    //$resultset = array();
    while ($wkzeile = mysqli_fetch_array($result)) 
      //einträge zählen
      $wk_art_anzahl= count ($wkzeile); 
        {
      /* artikel daten zu den artikel IDs aus dem warenkorb suchen
        $sql = "SELECT  art_preis
        FROM artikel WHERE art_id=\"".$wkzeile['art_id']."\";";
        $result = mysqli_query($verbinde, $sql);*/
        }
    }
}
/////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
    // kasse2-zahlart: neue zahlart in Datenbank speichern
    if (isset($_POST['kasse2_zahlart_speichern']))
    {
        $sql= "UPDATE nutzer 
                SET n_zahlart = \"".$_POST['kasse_zahlungsmethode_zahlungsart']."\" WHERE n_id = 1;";
        mysqli_query($verbinde, $sql);

        $kasse_zahlart = $_POST['kasse_zahlungsmethode_zahlungsart'];
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

//kasse3
if($seitenid == "kasse_3")
{
    
    
// kasse 3: artikel stückzahl erhöhen ///////////////////////////////////////////////////////   
if (isset($_POST['kasse_3_anzahl_up']))
{
    // erhöhen, wenn anzahl kleiner als artikel stückzahl
    if ($_POST['kasse_wk_zahl']< $_POST['kasse_art_zahl'])
    {
    $sql = "UPDATE warenkorb
            SET anzahl_art = anzahl_art+1
            WHERE cookie_id=\"".$cookie_id."\" AND art_id =\"".$_POST['kasse_art_id']."\";";
             mysqli_query($verbinde, $sql);
    }
// Benachrichtigung, wenn keine erhöhung möglich
    else{
        echo "<span class=\"fehler\"> Die Stückanzahl kann nicht erhöht werden, 
        da der Lagerbestand bereits erreicht ist! </span>";
    }
} 

// kasse3: artikel stückzahl verringern////////////////////////////////////////////////////////////
if (isset($_POST['kasse_3_anzahl_down']))
{
    if ($_POST['kasse_wk_zahl']>1)
    {
    $sql = "UPDATE warenkorb
            SET anzahl_art = anzahl_art-1
            WHERE cookie_id=\"".$cookie_id."\" AND art_id =\"".$_POST['kasse_art_id']."\";";
             mysqli_query($verbinde, $sql);
    }

} 

//artikel aus warenkorb löschen/////////////////////////////////////////////////////////////////////////
if (isset($_POST['kasse_3_artikel_delete']))
{
    $sql = "DELETE FROM warenkorb
            WHERE cookie_id=\"".$cookie_id."\" AND art_id =\"".$_POST['kasse_art_id']."\";";
             mysqli_query($verbinde, $sql);
} 


//////////////////////////////////////////////////////////////////////////////////////////////


// warenkorb daten selektieren/////////////////////////////////////////////////////////////
    //ausgabe nav zeile
    echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav_active\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";

    //linke seite
    echo "<div class=\"kasse_div\">";
    echo "<div class=\"kasse_links\">";
        echo "<span class=\"kasse_ueberschrift_klein\">Überprüfe deine Bestellung und schließe den Kauf ab:</span><br>";
        echo "<table>";


$sql= "SELECT * FROM warenkorb WHERE cookie_id=\"".$cookie_id."\";";
$result = mysqli_query($verbinde, $sql);
         
if (mysqli_num_rows ($result) > 0)
{   
    //$resultset = array();
    while ($wkzeile = mysqli_fetch_array($result)) 

  
       // {
       //     $resultset[]= $zeile;
      //  }
     //   foreach ($resultset as $resultrow)
        {
        //einträge zählen
        echo count ($wkzeile);

        // artikel daten zu den artikel IDs aus dem warenkorb suchen
        $sql = "SELECT art_id, art_name, art_preis, art_stueckzahl, art_bild 
        FROM artikel WHERE art_id=\"".$wkzeile['art_id']."\";";
        $result = mysqli_query($verbinde, $sql);
        
    
           
        
    if (mysqli_num_rows ($result) > 0)
        {   
        while ($row = mysqli_fetch_assoc($result))
            {
               
             
//abfrage, ob stückzahl vorhanden
             //stückzahl nicht mehr vorhanden:
                if ($row['art_stueckzahl']< $wkzeile['anzahl_art'])
                {   echo " <form method=\"POST\" action=\"#\"> <tr> ";
                    echo "<tr> ";
                    echo "<td class=\"kasse_td\"> <img class=\"kasse_artikel_bild\" src=\"img/".$row['art_bild']."\"> </td>";
                    echo "<td class=\"kasse_td\">".$row['art_name']."<br> <button> artikel löschen</button> </td>";
// stückzahl auf die verfügbare anzahl setzen
                    echo "<td class=\"kasse_td\">".$row['art_stueckzahl']."

                    <button type=\"submit\" name=\"kasse_3_anzahl_up\"> + </button> 
                    <button type=\"submit\" name=\"kasse_3_anzahl_down\"> - </button> <br> je ".$row['art_preis']." €</td>
                    <input type=\"hidden\" name=\"kasse_art_id\" value=\"".$row['art_id']."\">
                    <input type=\"hidden\" name=\"kasse_wk_zahl\" value=\"".$wkzeile['anzahl_art']."\">
                    <input type=\"hidden\" name=\"kasse_art_zahl\" value=\"".$row['art_stueckzahl']."\">";

                    echo "<td class=\"kasse_td\">".$row['art_preis'] * $wkzeile['anzahl_art']." €"; 

                    echo "</tr>  </form>";
// Fehlerausgabe
                    echo "<pan class=\"fehler\"> Die gewünschte Menge des Artikel ".$row['art_name']. " ist leider nicht mehr verfügbar!</span>";
                }

 //Stückzahl vorhanden               
                else{
                    echo " <form method=\"POST\" action=\"#\"> <tr> ";
                    echo "<td class=\"kasse_td\"> <img class=\"kasse_artikel_bild\" src=\"img/".$row['art_bild']."\"> </td>";
                    echo "<td class=\"kasse_td\">".$row['art_name']."<br> <button type=\"submit\" name=\"kasse_3_artikel_delete\"> artikel löschen</button> </td>";
                    echo "<td class=\"kasse_td\">".$wkzeile['anzahl_art']."
                   
                    <input type=\"hidden\" name=\"kasse_art_id\" value=\"".$row['art_id']."\">
                    <input type=\"hidden\" name=\"kasse_wk_zahl\" value=\"".$wkzeile['anzahl_art']."\">
                    <input type=\"hidden\" name=\"kasse_art_zahl\" value=\"".$row['art_stueckzahl']."\">
                    <button type=\"submit\" name=\"kasse_3_anzahl_up\"> + </button> <button type=\"submit\" name=\"kasse_3_anzahl_down\"> - </button> 
                    
                    <br> je ".$row['art_preis']." €</td>";
                    echo "<td class=\"kasse_td\">".$row['art_preis'] * $wkzeile['anzahl_art']." €";
                    echo "</tr> </form>";
                }

            }

        }
    }
 

    }
    echo "</table>";
    echo "<form action=\"#\" method=\"POST\">";
    echo "<input type=\"checkbox\" id=\"AGB_check\" name=\"AGB_check\" onchange=\"return clickbar()\">
    <span class=\"kasse_rechts_klein\">Ich akzeptiere die <a class=\"kasse_ueberschrift_klein\"> AGB</a>
    und die <a class=\"kasse_ueberschrift_klein\"> Datenschutzbestimmungen </a>
    und bestätige die Korrektheit meiner Daten.</span>";
    echo "</form>";
    echo "<hr>";
}
}


?>