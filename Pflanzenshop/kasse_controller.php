<?php
  //Datenbank einbinden
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbase = "ba_webshop";
  
  $verbinde = mysqli_connect($host,$user,$pass);
  $con = mysqli_select_db($verbinde,$dbase);
//mysqli_set_charset($con, "utf8");



/**************************************************************************************** */
/*KASSE: nutzerdaten selektieren und variablen anlegen
/******************************************************************************************* */

//überprüfung, ob eingeloggt//////////////////////////////////////////////////////////////
if (isset ($_POST['kasse']))

{
    //nutzerdaten selektieren
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

        $sql = "SELECT * FROM nutzer WHERE n_id=\"".$kasse_n_id."\";";
        $result = mysqli_query($verbinde, $sql);
         
        if (mysqli_num_rows ($result) > 0)
        {   
            while ($zeile = mysqli_fetch_assoc($result))
            {
                $_SESSION['kasse_vname']= $zeile['n_vname'];
               
                $_SESSION['kasse_nname']= $zeile['n_nname'];
               
                    $_SESSION['kasse_strasse']= $zeile['n_strasse'];
                   
                $_SESSION['kasse_plz']= $zeile['n_plz'];
                    $_SESSION['kasse_ort'] = $zeile['n_ort'];
   
                   $_SESSION['kasse_zahlart'] = $zeile['n_zahlart'];
               }
}
}

/**************************************************************************************** */
/*KASSE: Login und Sperre prüfen*/
/******************************************************************************************* */

if($seitenid== "kasse_1" || $seitenid =="kasse_2" || $seitenid=="kasse_3" || $seitenid=="kasse_4")
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
if ($logged_in == false)
    {
        echo "nicht eingeloggt";
  
        header("Location:index.php?Seiten_ID=login");
    }


//eingeloggt/////////////////////////////////////////////////////////////////////////////////

//expire überprüfen///////////////////////////////////////////////////////////////////////
//abgelaufen:
if ($logged_in == true AND $expire < $time_aktuell )
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
                    //session-variable
                    $_SESSION['gesperrt'] = true;
                    // benachrichtigung und weiter button disablen
                    $K_Fehler = "Sie sind derzeit gesperrt. Ein Bestellvorgang ist nicht möglich!";
                   // echo "<script type=\"text/javascript\"> kasse_sperren(); </script>";
                }
//////////////////////////////////////////////////////////////////////////////

            }
    } 
    

}}
/////////////////////////////////////////////////////////////////////////////////////////

/*******************************************************************************************
 /*KASSE 1*/
 /********************************************************************************************* */
 //lieferadresse ändern
 if (isset($_POST['kasse1_adresse_aendern']))
 {
     //csrf
    if ($_POST['csrf'] !== $_SESSION['csrf_token'])
    {
        die ("ungültiger Token");
    }
    //csrf gültig
    else
    {
        $_SESSION['kasse_vname']= htmlspecialchars($_POST['liefer_vname'],ENT_QUOTES, 'utf-8');
               
        $_SESSION['kasse_nname']= htmlspecialchars($_POST['liefer_nname'],ENT_QUOTES, 'utf-8');
       
        $_SESSION['kasse_strasse']= htmlspecialchars($_POST['liefer_strasse'],ENT_QUOTES, 'utf-8');
           
        $_SESSION['kasse_plz']= htmlspecialchars($_POST['liefer_plz'],ENT_QUOTES, 'utf-8');
        $_SESSION['kasse_ort']= htmlspecialchars($_POST['liefer_ort'],ENT_QUOTES, 'utf-8');
    }

 }
 

/******************************************************************************************** */
/*KASSE 2*/
/********************************************************************************************* */
    // kasse2-zahlart: neue zahlart in Datenbank speichern
    if (isset($_POST['kasse2_zahlart_speichern']))
    {
//user daten selektieren

/*$sql ="SELECT cookie_id, n_id FROM cookie WHERE cookie_wert =\"".$_COOKIE['sid']."\";";
$result = mysqli_query($verbinde, $sql);
         
        if (mysqli_num_rows ($result) > 0)
        {   
            while ($zeile = mysqli_fetch_assoc($result))
            { 
                $cookie_id=$zeile['cookie_id'];
                $kasse_n_id = $zeile['n_id'];
            }
        }*/
//token prüfen/////////////////////////////////////////////////////////////////////////////////////
        if ($_POST['csrf'] !== $_SESSION['csrf_token'])
        {
            die ("ungültiger Token");
        }
        //wenn gültig: 
        else{
        /*$sql= "UPDATE nutzer 
                SET n_zahlart = \"".$_POST['kasse_zahlungsmethode_zahlungsart']."\" WHERE n_id =\"".$kasse_n_id ."\";";
        mysqli_query($verbinde, $sql);*/
        
        $_SESSION['kasse_zahlart'] =htmlspecialchars($_POST['kasse_zahlungsmethode_zahlungsart'],ENT_QUOTES, 'utf-8');
        
       }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

/******************************************************************************************** */
/*KASSE bestellartikel und preisinformationen
/********************************************************************************************* */
if($seitenid =="kasse_1" || $seitenid =="kasse_2" || $seitenid=="kasse_3" || $seitenid=="kasse_4")
{

// preis variablen
$kasse_gesamt_preis = 0;
$versand = 4.95;
$bruttobetrag = 0;


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



 
$sql= "SELECT * FROM warenkorb WHERE cookie_id=\"".$cookie_id."\";";
$result = mysqli_query($verbinde, $sql);
         
if (mysqli_num_rows ($result) > 0)
{   
    //$resultset = array();
    while ($wkzeile = mysqli_fetch_array($result)) 
{
        //einträge zählen
         $wk_art_anzahl = mysqli_num_rows($result);



        // artikel daten zu den artikel IDs aus dem warenkorb suchen
        $sql2 = "SELECT art_id, art_name, art_preis, sale_status, sale_preis, art_stueckzahl, art_bild 
        FROM artikel WHERE art_id=\"".$wkzeile['art_id']."\";";
        $result2 = mysqli_query($verbinde, $sql2);
    
   

if (mysqli_num_rows ($result2) > 0)
{   
while ($row = mysqli_fetch_assoc($result2))
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


//prüfen, ob stückzahl vorhanden
if ($row['art_stueckzahl']< $wkzeile['anzahl_art'])
{
    $kasse_zeilen_preis= $kasse_art_preis * $row['art_stueckzahl'];
}

if ($row['art_stueckzahl']>= $wkzeile['anzahl_art'])
{
    $kasse_zeilen_preis= $kasse_art_preis * $wkzeile['anzahl_art'];
}}}
$kasse_gesamt_preis = $kasse_gesamt_preis + $kasse_zeilen_preis;
$kasse_bruttobetrag = $kasse_gesamt_preis + $versand;
}}}
//////////////////////////////////////////////////////////////////////////////////////////////



/******************************************************************************************** */
// KASSE 3: 
/********************************************************************************************* */


if($seitenid == "kasse_3")
{
  $kasse_gesamt_preis =0;



// warenkorb daten selektieren/////////////////////////////////////////////////////////////
    //ausgabe nav zeile
    echo "<div class=\"kasse_headleiste\">";
    echo "Kasse <br>";
    echo "<a class=\"kasse_nav\">Adresse </a> <a class=\"kasse_nav\"> Zahlungsmethode </a> <a class=\"kasse_nav_active\"> Kauf abschließen </a> <a class=\"kasse_nav\"> Bestellbestätigung </a>";
echo "</div>";

    //linke seite///////////////////////////////////////////////////////////////////////////////
    echo "<div class=\"kasse_div\">";
    echo "<div class=\"kasse_links\">";

//eventuelle Meldung bei Nutzersperre//////////////////////////////////////////////
if(isset ($K_Fehler))
{
     echo "<span class=\"fehler\">$K_Fehler</span>";
    echo"<br><br>";
}
////////////////////////////////////////////////////////////////////////////////////////    
        echo "<span class=\"kasse_ueberschrift_klein\">Überprüfe deine Bestellung und schließe den Kauf ab:</span><br>";
        echo "<table>";

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




        $sql= "SELECT * FROM warenkorb WHERE cookie_id=\"".$cookie_id."\";";
        $result = mysqli_query($verbinde, $sql);
                 
        if (mysqli_num_rows ($result) > 0)
        {   
            //$resultset = array();
            while ($wkzeile = mysqli_fetch_array($result)) 
        {
                //einträge zählen
                $wk_art_anzahl= mysqli_num_rows($result);
                $wk_korb_id =$wkzeile['korb_id'];
        

        
                // artikel daten zu den artikel IDs aus dem warenkorb suchen
                $sql2 = "SELECT art_id, art_name, art_preis, sale_status, sale_preis, art_stueckzahl, art_bild 
                FROM artikel WHERE art_id=\"".$wkzeile['art_id']."\";";
                $result2 = mysqli_query($verbinde, $sql2);
            
           
        
    if (mysqli_num_rows ($result2) > 0)
        {   
        while ($row = mysqli_fetch_assoc($result2))
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


                    <button type=\"submit\" name=\"kasse_3_anzahl_up\" class=\"more_less\"> + </button> 
                    <button type=\"submit\" name=\"kasse_3_anzahl_down\" class=\"more_less\"> - </button> <br> je ".$kasse_art_preis." €</td>
                    <input type=\"hidden\" name=\"kasse_art_id\" value=\"".$row['art_id']."\">
                    <input type=\"hidden\" name=\"kasse_wk_zahl\" value=\"".$wkzeile['anzahl_art']."\">
                    <input type=\"hidden\" name=\"kasse_art_zahl\" value=\"".$row['art_stueckzahl']."\">";

//stückzahl in datenbank ändern
$sql4="UPDATE warenkorb
        SET anzahl_art= \"".$row['art_stueckzahl']."\"
        WHERE korb_id =\"".$wk_korb_id."\";";
        $result4 = mysqli_query($verbinde, $sql4);

// zeilen preis 
                    $kasse_zeilen_preis= $kasse_art_preis * $row['art_stueckzahl'];
                    echo "<td class=\"kasse_td\">".$kasse_zeilen_preis." €"; 

                    echo "</tr>  </form>";
                    $kasse_gesamt_preis = $kasse_gesamt_preis + $kasse_zeilen_preis;
                    $kasse_bruttobetrag = $kasse_gesamt_preis + $versand;
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
                    <button type=\"submit\" name=\"kasse_3_anzahl_up\" class=\"more_less\"> + </button>
                    <input type=\"hidden\" name=\"kasse_art_zahl\" value=\"".$row['art_stueckzahl']."\">
                    <button class=\"more_less\"type=\"submit\" name=\"kasse_3_anzahl_down\"> - </button> 
                    
                    <br> je ".$kasse_art_preis." €</td>";
                    // zeilen preis
                  $kasse_zeilen_preis= $kasse_art_preis * $wkzeile['anzahl_art'];  
                    echo "<td class=\"kasse_td\">". $kasse_zeilen_preis." €";
                    echo "</tr> </form>";

                    $kasse_gesamt_preis = $kasse_gesamt_preis + $kasse_zeilen_preis;
                    $kasse_bruttobetrag = $kasse_gesamt_preis + $versand;
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




/////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////




/******************************************************************************************** */
// KASSE 4: 
/********************************************************************************************* */
if ($seitenid=="kasse_4")

{ 
    $kasse_gesamt_preis =0;
////////////////////////////////////////////////////////////////////////////////////////////////////
 //bestellung speichern
  

  
/******************************************************************************************** */
// KASSE 4: SeitenAufbau
/********************************************************************************************* */

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

    // Artikeltabelle
    echo "<span class=\"kasse_ueberschrift_klein\"> bestellte Artikel </span><br>";
    $kasse_4_preis;    

/******************************************************************************************** */
// KASSE 4: Artikeltabelle bestellte Artikel
/********************************************************************************************* */
$sql5= "SELECT * FROM bestellte_artikel WHERE best_id=\"".$_SESSION['index']."\";";
$result5 = mysqli_query($verbinde, $sql5);
         
if (mysqli_num_rows ($result5) > 0)
{   
  
    while ($wkzeile = mysqli_fetch_array($result5)) 
{
        //einträge zählen
         $wk_art_anzahl =mysqli_num_rows($result5);
      
        
//artikel tabelle darstellen

echo "<table>";
echo "<tr> ";
echo "<td class=\"kasse_td\"> <img class=\"kasse_artikel_bild\" src=\"img/".$wkzeile['best_art_bild']."\"> </td>";
echo "<td class=\"kasse_td\">".$wkzeile['best_art_name']."</td>";
echo "<td class=\"kasse_td\"> St&uuml;ckzahl: ".$wkzeile['best_anzahl']."<br> je ". $wkzeile['best_art_preis']." €</td>";

    // zeilen preis
    $kasse_zeilen_preis= $wkzeile['best_art_preis'] * $wkzeile['best_anzahl'];  
echo "<td class=\"kasse_td\">".$kasse_zeilen_preis." €";
echo "</tr>";
echo "</table>";   

$kasse_gesamt_preis = $kasse_gesamt_preis + $kasse_zeilen_preis;
$kasse_bruttobetrag = $kasse_gesamt_preis + $versand;




        
    }      
}
           
      
}

    





////////////////////////////////////////////////////////////








//////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

//bestellung speichern
if (isset ($_POST['bestellung']))
{  

  //csrf prüfen/////////////////////////////////////////////////////////////////////////////////
  if ($_POST['csrf'] !== $_SESSION['csrf_token'])
  {
      die ("ungültiger Token");
  }

  else{

  
    ////////////////////////////////////////////////////////////////////////////////////////////////////
// aktuelles datum
$best_date= date("Y-m-d H:i:s");  
/******************************************************************************************** */
// KASSE 3: Bestellung speichern
/********************************************************************************************* */



// bestellung in datenbank : tabelle bestellung
$sql6="INSERT INTO bestellung
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
\"".$kasse_n_id."\",
\"".$_SESSION['kasse_vname']."\",
\"".$_SESSION['kasse_nname']."\",
\"".$_SESSION['kasse_strasse']."\",
\"".$_SESSION['kasse_plz']."\",
\"".$_SESSION['kasse_ort']."\",
\"".$_SESSION['kasse_zahlart']."\"
)";
$result = mysqli_query($verbinde, $sql6);
/////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

//bestell_id herausfinden
$sql ="SELECT cookie_id, n_id FROM cookie WHERE cookie_wert =\"".$_COOKIE['sid']."\";";
$result=mysqli_query($verbinde, $sql);
$best_nutzer = mysqli_fetch_array($result);
$best_nutzer_id = $best_nutzer['n_id'];
$best_wk = $best_nutzer['cookie_id'];



$sql = " SELECT best_id, best_datum FROM bestellung WHERE n_id=\"".$best_nutzer_id."\" ORDER BY best_datum DESC";
$ergebnis = mysqli_query($verbinde, $sql);
$best_array = mysqli_fetch_array($ergebnis);
$_SESSION['index'] = (isset($best_array[0])) ? $best_array[0] : null;

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

//tabelle best artikel
$sql= "SELECT * FROM warenkorb WHERE cookie_id=\"".$cookie_id."\";";
$erg = mysqli_query($verbinde, $sql);
         
if (mysqli_num_rows ($erg) > 0)
{   
    //$resultset = array();
    while ($best = mysqli_fetch_array($erg)) 
{
        
        // artikel daten zu den artikel IDs aus dem warenkorb suchen
        $sql2 = "SELECT art_id, art_name, art_preis, sale_status, sale_preis, art_stueckzahl, art_bild 
        FROM artikel WHERE art_id=\"".$best['art_id']."\";";
        $result2 = mysqli_query($verbinde, $sql2);
    
   

        if (mysqli_num_rows ($result2) > 0)
        {   
        while ($row = mysqli_fetch_assoc($result2))
        {


/******************************************************************************************** */
//Kasse 3: Abfrage ob sale
/********************************************************************************************* */
//sale 
if($row['sale_status']== true)
{
$best_art_preis = $row['sale_preis'];
}             
//nicht sale
if ($row['sale_status']== false)
{
$best_art_preis = $row['art_preis'];
}

$sql7="INSERT INTO bestellte_artikel
(   art_id,
best_id,
best_art_name,
best_art_bild,
best_anzahl,
best_art_preis

)
VALUES
( 
    \"".$row['art_id']."\",
    \"".$_SESSION['index']."\",
    \"".$row['art_name']."\",
    \"".$row['art_bild']."\",
    \"".$best['anzahl_art']."\",
    \"".$best_art_preis."\"


)";
$result = mysqli_query($verbinde, $sql7);
        }}}}

/////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

//rechnung aufstellen

// nutzerdaten selektieren
$sql = "SELECT * FROM nutzer WHERE n_id =\"".$best_nutzer_id."\";";
$result = mysqli_query($verbinde, $sql) OR die(mysqli_error);
$best= mysqli_fetch_assoc($result);


$sql ="INSERT INTO rechnung
(
    r_datum,
    best_id,
    n_id,
    r_n_name,
    r_n_vname,
    r_n_strasse,
    r_n_ort,
    r_n_plz,
    r_n_mail,
    r_n_zahlart
)
VALUES
(
    \"".$best_date."\",
    \"".$_SESSION['index']."\",
    \"".$best_nutzer_id."\",
    \"".$best['n_nname']."\",
    \"".$best['n_vname']."\",
    \"".$best['n_strasse']."\",
    \"".$best['n_ort']."\",
    \"".$best['n_plz']."\",
    \"".$best['n_mail']."\",
    \"".$_SESSION['kasse_zahlart']."\"

)";
$esult = mysqli_query($verbinde, $sql) OR die(mysqli_error);


/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
//warenkorb löschen


//warenkorb löschen
$sql = "DELETE FROM warenkorb
WHERE cookie_id=\"".$best_wk."\";";
mysqli_query($verbinde, $sql) OR die(mysqli_error);        
}
}
?>