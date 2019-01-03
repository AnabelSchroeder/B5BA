<?php
  //Datenbank einbinden
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbase = "ba_webshop";
  
  $verbinde = mysqli_connect($host,$user,$pass);
  $con = mysqli_select_db($verbinde,$dbase);


/**************************************************************************************** */
/*KASSE: Login und Sperre prüfen*/
/******************************************************************************************* */

//überprüfung, ob eingeloggt//////////////////////////////////////////////////////////////
if ($seitenid== "kasse_1" || "kasse_2" || "kasse_3" || "kasse_4")
{
$sql ="SELECT logged_in, expire  FROM cookie WHERE cookie_wert=\"".$_COOKIE['sid']."\";";
$result = mysqli_query($verbinde, $sql);

if (mysqli_num_rows ($result) > 0)
        {   
            while ($zeile = mysqli_fetch_assoc($result))
            {
                // login und expire speichern
                $logged_in = $zeile['logged_in'];
                $expire = $zeile['expire'];
                // aktuelle Zeit speichern
                $time_aktuell = time();
                
            }
        }
//nicht eingeloggt////////////////////////////////////////////////////////////////////////
//weiterleitung zu login wenn nicht eingeloggt
if ($logged_in == false  AND $seitenid =="kasse_1")
    {
        echo "nicht eingeloggt";
  
        header("Location:index.php?Seiten_ID=login");
    }


//eingeloggt/////////////////////////////////////////////////////////////////////////////////

//expire überprüfen///////////////////////////////////////////////////////////////////////
//abgelaufen:
if ($logged_in == true AND $expire < $time_aktuell AND $seitenid =="kasse_1" )
    {
       $sql = "UPDATE cookie
       SET logged_in = false
       WHERE cookie_wert=\"".$_COOKIE['sid']."\";";
       $result = mysqli_query($verbinde, $sql);
        // weiterleitung zur Loginseite
        header("Location:index.php?Seiten_ID=login");
    }

//nicht abgelaufen:
if ($logged_in==true AND $expire > $time_aktuell)
{
//cookie id und nutzer id herausfinden
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

//gesperrt:///////////////////////////////////////////////////////////////
                if($sperre== 1)
                {
                    // benachrichtigung und weiter button disablen
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

/******************************************************************************************** */
/*KASSE 2*/
/********************************************************************************************* */
    // kasse2-zahlart: neue zahlart in Datenbank speichern
    if (isset($_POST['kasse2_zahlart_speichern']))
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
//token prüfen/////////////////////////////////////////////////////////////////////////////////////
        if ($_POST['csrf'] !== $_SESSION['csrf_token'])
        {
            die ("ungültiger Token");
        }
        //wenn gültig: 
        else{
        $sql= "UPDATE nutzer 
                SET n_zahlart = \"".$_POST['kasse_zahlungsmethode_zahlungsart']."\" WHERE n_id =\"".$kasse_n_id ."\";";
        mysqli_query($verbinde, $sql);

        $kasse_zahlart = $_POST['kasse_zahlungsmethode_zahlungsart'];
       }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

/******************************************************************************************** */
/*KASSE 2*/
/********************************************************************************************* */
if($seitenid == "kasse_3")
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
 
/******************************************************************************************** */
// kasse: artikel anzahl bearbeiten 
/********************************************************************************************* */

// kasse 3: artikel stückzahl erhöhen ///////////////////////////////////////////////////////   
if (isset($_POST['kasse_3_anzahl_up']))
{
    //csrf prüfen/////////////////////////////////////////////////////////////////////////////
    if ($_POST['csrf'] !== $_SESSION['csrf_token'])
    {
        die ("ungültiger Token");
    }

    //csrf gültig
    else{
    // erhöhen, wenn anzahl kleiner als artikel stückzahl
    if ($_POST['kasse_wk_zahl']< $_POST['kasse_art_zahl'])
    {
    //warenkorb tabelle updaten: Artikel erhöhen
    $sql = "UPDATE warenkorb
            SET anzahl_art = anzahl_art+1
            WHERE cookie_id=\"".$cookie_id."\" AND art_id =\"".$_POST['kasse_art_id']."\";";
             mysqli_query($verbinde, $sql);
    }
//Fehler: Benachrichtigung, wenn keine erhöhung möglich
    else{
        echo "<span class=\"fehler\"> Die Stückanzahl kann nicht erhöht werden, 
        da der Lagerbestand bereits erreicht ist! </span>";
    }
}
} 

// kasse3: artikel stückzahl verringern////////////////////////////////////////////////////////////
if (isset($_POST['kasse_3_anzahl_down']))
{
    //csrf prüfen/////////////////////////////////////////////////////////////////////////////////
    if ($_POST['csrf'] !== $_SESSION['csrf_token'])
    {
        die ("ungültiger Token");
    }

    //csrf gültig
    else{
    if ($_POST['kasse_wk_zahl']>1)
    {
        // warenkorb tabelle updaten: artikel stückzahl verringern
    $sql = "UPDATE warenkorb
            SET anzahl_art = anzahl_art-1
            WHERE cookie_id=\"".$cookie_id."\" AND art_id =\"".$_POST['kasse_art_id']."\";";
             mysqli_query($verbinde, $sql);
    }
}
} 
/******************************************************************************************** */
// kasse: artikel löschen
/********************************************************************************************* */
//artikel aus warenkorb löschen/////////////////////////////////////////////////////////////////////////
if (isset($_POST['kasse_3_artikel_delete']))
{
    //csrf prüfen////////////////////////////////////////////////////////////////////
    if ($_POST['csrf'] !== $_SESSION['csrf_token'])
    {
        die ("ungültiger Token");
    }
    //csrf gültig
    else {
    // warenkorb tabelle updaten: artikel löschen
    $sql = "DELETE FROM warenkorb
            WHERE cookie_id=\"".$cookie_id."\" AND art_id =\"".$_POST['kasse_art_id']."\";";
             mysqli_query($verbinde, $sql);
    }
} 


//////////////////////////////////////////////////////////////////////////////////////////////



/******************************************************************************************** */
// KASSE 3: Seitenausgabe
/********************************************************************************************* */

// warenkorb daten selektieren/////////////////////////////////////////////////////////////
    //ausgabe nav zeile
    echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav_active\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";

    //linke seite///////////////////////////////////////////////////////////////////////////////
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
        {
                //einträge zählen
                 count ($wkzeile);
        
                
        
                // artikel daten zu den artikel IDs aus dem warenkorb suchen
                $sql = "SELECT art_id, art_name, art_preis, sale_status, sale_preis, art_stueckzahl, art_bild 
                FROM artikel WHERE art_id=\"".$wkzeile['art_id']."\";";
                $result = mysqli_query($verbinde, $sql);
            
           
        
    if (mysqli_num_rows ($result) > 0)
        {   
        while ($row = mysqli_fetch_assoc($result))
            {
 
/******************************************************************************************** */
//Kasse 3: Abfrage ob sale
/********************************************************************************************* */
//sale 
if($row['sale_status']== true)
{
    $kasse_art_preis = $row['sale_preis'];
}             
//nicht sale
if ($row['sale_status']== false)
{
    $kasse_art_preis = $row['art_preis'];
}
/******************************************************************************************** */
// KASSE 3: Stückzahl abfrage
/********************************************************************************************* */

//Artikelanzeige: stückzahl nicht mehr vorhanden:////////////////////////////////////////////////////////////////////////
                if ($row['art_stueckzahl']< $wkzeile['anzahl_art'])
                {   echo " <form method=\"POST\" action=\"#\"> <tr> ";
                     //csrf
                    echo "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">";
                    echo "<tr> ";
                    echo "<td class=\"kasse_td\"> <img class=\"kasse_artikel_bild\" src=\"img/".$row['art_bild']."\"> </td>";
                    echo "<td class=\"kasse_td\">".$row['art_name']."<br> <button> Artikel löschen</button> </td>";
// stückzahl auf die verfügbare anzahl setzen////////////////////////////////////////////////////////////////
                    echo "<td class=\"kasse_td\">".$row['art_stueckzahl']."

                    <button type=\"submit\" name=\"kasse_3_anzahl_up\"> + </button> 
                    <button type=\"submit\" name=\"kasse_3_anzahl_down\"> - </button> <br> je ".$kasse_art_preis." €</td>
                    <input type=\"hidden\" name=\"kasse_art_id\" value=\"".$row['art_id']."\">
                    <input type=\"hidden\" name=\"kasse_wk_zahl\" value=\"".$wkzeile['anzahl_art']."\">
                    <input type=\"hidden\" name=\"kasse_art_zahl\" value=\"".$row['art_stueckzahl']."\">";
// zeilen preis 
                    echo "<td class=\"kasse_td\">".$kasse_art_preis * $wkzeile['anzahl_art']." €"; 

                    echo "</tr>  </form>";
// Fehlerausgabe: Artikelmenge nicht verfügbar///////////////////////////////////////////////////////////////////////////////////////////////////
                    echo "<span class=\"fehler\"> Die gewünschte Menge des Artikel ".$row['art_name']. " ist leider nicht mehr verfügbar!</span>";
                }


///////////////////////////////////////////////////////////////////////////////////////////////////////////
 //Artikelanzeige: Stückzahl vorhanden //////////////////////////////////////////////////////////////////////////////////////////////              
                else{
                    echo " <form method=\"POST\" action=\"#\"> <tr> ";
                     //csrf
                    echo "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">";
                    //artikeldaten
                    echo "<td class=\"kasse_td\"> <img class=\"kasse_artikel_bild\" src=\"img/".$row['art_bild']."\"> </td>";
                    echo "<td class=\"kasse_td\">".$row['art_name']."<br> <button type=\"submit\" name=\"kasse_3_artikel_delete\"> artikel löschen</button> </td>";
                    echo "<td class=\"kasse_td\">".$wkzeile['anzahl_art']."
                   
                    <input type=\"hidden\" name=\"kasse_art_id\" value=\"".$row['art_id']."\">
                    <input type=\"hidden\" name=\"kasse_wk_zahl\" value=\"".$wkzeile['anzahl_art']."\">
                    <input type=\"hidden\" name=\"kasse_art_zahl\" value=\"".$row['art_stueckzahl']."\">
                    <button type=\"submit\" name=\"kasse_3_anzahl_up\"> + </button> <button type=\"submit\" name=\"kasse_3_anzahl_down\"> - </button> 
                    
                    <br> je ".$kasse_art_preis." €</td>";
                    // zeilen preis
                    echo "<td class=\"kasse_td\">". $kasse_art_preis * $wkzeile['anzahl_art']." €";
                    echo "</tr> </form>";
                }

            }

        }
    }
 

    }
    //Kasse 3: AGB checkbox/////////////////////////////////////////////////////////////
    echo "</table>";
    echo "<form action=\"#\" method=\"POST\">";
    echo "<input type=\"checkbox\" id=\"AGB_check\" name=\"AGB_check\" onchange=\"return clickbar()\">
    <span class=\"kasse_rechts_klein\">Ich akzeptiere die <a class=\"kasse_ueberschrift_klein\"> AGB</a>
    und die <a class=\"kasse_ueberschrift_klein\"> Datenschutzbestimmungen </a>
    und bestätige die Korrektheit meiner Daten.</span>";
    echo "</form>";
    echo "<hr>";
}

/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

/******************************************************************************************** */
// KASSE 4: 
/********************************************************************************************* */
if ($seitenid=="kasse_4")

{
    // warenkorb daten
    $sql= "SELECT * FROM warenkorb WHERE cookie_id=\"".$cookie_id."\";";
    $result = mysqli_query($verbinde, $sql);
         
if (mysqli_num_rows ($result) > 0)
{   
    //$resultset = array();
    while ($wkzeile = mysqli_fetch_array($result)) 
{
        //einträge zählen
        echo count ($wkzeile);
        $kasse_4_anzahl = $wkzeile['anzahl_art'];
        

        // artikel daten zu den artikel IDs aus dem warenkorb suchen
        $sql = "SELECT art_id, art_name, art_bild , art_preis, sale_status, sale_preis
        FROM artikel WHERE art_id=\"".$wkzeile['art_id']."\";";
        $result = mysqli_query($verbinde, $sql);
        if (mysqli_num_rows ($result) > 0)
        {   
        while ($row = mysqli_fetch_assoc($result))
        {

/******************************************************************************************** */
// KASSE 4: Sale abfrage
/********************************************************************************************* */
       //sale
        if($row['sale_status']== true)
        {
            $kasse_art_preis = $row['sale_preis'];
        }             
        //nicht sale
        if ($row['sale_status']== false)
        {
            $kasse_art_preis = $row['art_preis'];
        }
        }
        }
        
    
           
        

    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////
// aktuelles datum
$best_date= date("Y-m-d H:i:s");

/******************************************************************************************** */
// KASSE 4: Bestellung speichern
/********************************************************************************************* */
// bestellung in datenbank : tabelle bestellung
$sql="INSERT INTO bestellung
(best_datum,
n_id,
best_n_vname,
best_n_name,
lieferstrasse,
lieferplz,
lieferort,
best_bezahlart)

VALUES
(
    \"".$best_date."\",
    \"". $kasse_n_id."\",
    \"".$kasse_vname."\",
    \"". $kasse_nname."\",
    \"". $kasse_strasse."\",
    \"". $kasse_plz."\",
    \"". $kasse_ort."\",
    \"". $kasse_zahlart."\"
)";
$result = mysqli_query($verbinde, $sql);
//////////////////////////////////////////////////////////////////////////////////////////////////////


}
////////////////////////////////////////////////////////////
}


?>