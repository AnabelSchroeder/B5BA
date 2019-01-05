<?php

///////////////////////////////////////
// DBanbindung des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

global $servername, $username, $passwort, $dbname;

$servername = "localhost";
$username = "root";
$passwort = "root";
$dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung

//$port = 8889;

//$link = mysqli_init();
//$success = mysqli_real_connect($link, $servername, $username, $passwort, $dbname, $port);

$verbinde = mysqli_connect($servername, $username, $passwort);
$connmysql = mysqli_select_db($verbinde, $dbname);

//Wenn das Suchfeld betätigt wurde
if (isset ($_POST["L_searchfield"]) && ($_POST["L_searchfield"]) != null){
    $L_suchbegriff = htmlspecialchars($_POST["L_searchfield"], ENT_QUOTES, 'UTF-8');
    //$L_suche ="SELECT COUNT (*) FROM artikel WHERE art_name OR art_text OR kat_bez OR art_ort OR art_pflege LIKE '%$L_suchbegriff%'";
    
    $L_sucheArtName = "SELECT * FROM artikel WHERE art_name LIKE '%$L_suchbegriff%'";
    $L_abfrArtName = mysqli_query($verbinde, $L_sucheArtName);
    $L_ergCountArtName = mysqli_num_rows($L_abfrArtName);
    if ($L_ergCountArtName == null){
        $L_suche = "";
    }else {
        $L_suche = $L_sucheArtName;
    }

    $L_sucheArtText = "SELECT * FROM artikel WHERE art_text LIKE '%$L_suchbegriff%'";
    $L_abfrArtText = mysqli_query($verbinde, $L_sucheArtText);
    $L_ergCountArtText = mysqli_num_rows($L_abfrArtText);
    if($L_ergCountArtText == null){
        $L_sucheArtText = "";
    } else {
        if($L_suche == ""){
            $L_suche = $L_sucheArtText;
        }else{
            $L_suche .= " UNION $L_sucheArtText";
        }
    }
    
    $L_sucheKatBez = "SELECT * FROM artikel WHERE kat_bez LIKE '%$L_suchbegriff%'";
    $L_abfrKatBez = mysqli_query($verbinde, $L_sucheKatBez);
    $L_ergCountKatBez = mysqli_num_rows($L_abfrKatBez);
    if($L_ergCountKatBez == null){
        $L_sucheKatBez = "";
    } else {
        if($L_suche == ""){
            $L_suche = $L_sucheKatBez;
        }else{
            $L_suche .= " UNION $L_sucheKatBez";
        }
    }

    $L_sucheArtOrt = "SELECT * FROM artikel WHERE art_ort LIKE '%$L_suchbegriff%'";
    $L_abfrArtOrt = mysqli_query($verbinde, $L_sucheArtOrt);
    $L_ergCountArtOrt = mysqli_num_rows($L_abfrArtOrt);
    if($L_ergCountArtOrt == null){
        $L_sucheArtOrt = "";
    } else {
        if($L_suche == ""){
            $L_suche = $L_sucheArtOrt;
        }else{
            $L_suche .= " UNION $L_sucheArtOrt";
        }
    }

    $L_sucheArtPflege = "SELECT * FROM artikel WHERE art_pflege LIKE '%$L_suchbegriff%'";
    $L_abfrArtPflege = mysqli_query($verbinde, $L_sucheArtPflege);
    $L_ergCountArtPflege = mysqli_num_rows($L_abfrArtPflege);
    if($L_ergCountArtPflege == null){
        $L_sucheArtPflege = "";
    } else {
        if($L_suche == ""){
            $L_suche = $L_sucheArtPflege;
        }else{
            $L_suche .= " UNION $L_sucheArtPflege";
        }
    }  

    $L_sucheArtFarbe = "SELECT * FROM artikel WHERE art_farbe LIKE '%$L_suchbegriff%'";
    $L_abfrArtFarbe = mysqli_query($verbinde, $L_sucheArtFarbe);
    $L_ergCountArtFarbe = mysqli_num_rows($L_abfrArtFarbe);
    if($L_ergCountArtFarbe == null){
        $L_sucheArtFarbe = "";
    } else {
        if($L_suche == ""){
            $L_suche = $L_sucheArtFarbe;
        }else{
            $L_suche .= " UNION $L_sucheArtFarbe";
        }
    }
        
}
//Wenn mind. ein Filter gesetzt wurde
else if ((isset ($_POST["L_FilterPreis"]) && ($_POST["L_FilterPreis"]) != NULL) || 
(isset ($_POST["L_FilterFarbe"]) && ($_POST["L_FilterFarbe"]) != NULL) || 
(isset ($_POST["L_FilterKategorie"]) && ($_POST["L_FilterKategorie"]) != NULL )|| 
(isset ($_POST["L_FilterPflege"]) && ($_POST["L_FilterPflege"]) != NULL) || 
(isset ($_POST["L_FilterHoehe"]) && ($_POST["L_FilterHoehe"]) != NULL) || 
(isset ($_POST["L_FilterStandort"]) && ($_POST["L_FilterStandort"]) != NULL) ){
    $L_suche = "";
    //Gewählten Filter in Variabler für Suchanfrage speichern
    if (isset ($_POST["L_FilterFarbeAuswahl"]) && ($_POST["L_FilterFarbeAuswahl"]) != null) {
        $L_farbauswahl = $_POST["L_FilterFarbeAuswahl"];
        $L_farbsql = "SELECT * FROM artikel WHERE art_farbe='$farbauswahl'";
        $L_suche .= "$L_farbsql";
    } else {
        $L_farbsql = "";
    }
    //Gewählten Filter in Variabler für Suchanfrage speichern
    if (isset ($_POST["L_FilterKategorieAuswahl"])) {
        $L_katauswahl = $_POST["L_FilterKategorieAuswahl"];
        $L_katsql = "SELECT * FROM artikel WHERE kat_bez='$L_katauswahl'";
        //Prüfen, ob schon eine Suchanfrage in der Variable gespeichert ist, wenn ja Suchanfragen vereinen
        if ($L_suche == ""){
            $L_suche .= "$L_katsql";
        }else {
            $L_suche .= " UNION $L_katsql";
        }
    }else {
        $L_katsql = "";
    }
    //Gewählten Filter in Variabler für Suchanfrage speichern
    if (isset ($_POST["L_FilterPflegeAuswahl"])) {
        $L_pflegeauswahl = $_POST["L_FilterPflegeAuswahl"];
        $L_pflegesql = "SELECT * FROM artikel WHERE art_pflege='$L_pflegeauswahl'";    
        //Prüfen, ob schon eine Suchanfrage in der Variable gespeichert ist, wenn ja Suchanfragen vereinen
        if ($L_suche == ""){
            $L_suche .= "$L_pflegesql";
        }else {
            $L_suche .= " UNION $L_pflegesql";
        }
    }else {
        $L_pflegesql = "";
    }
    //Gewählten Filter in Variabler für Suchanfrage speichern    
    if (isset ($_POST["L_FilterStandortAuswahl"])) {
        $L_standortauswahl = $_POST["L_FilterStandortAuswahl"];
        $L_standortsql = "SELECT * FROM artikel WHERE art_ort='$L_standortauswahl'";    
        //Prüfen, ob schon eine Suchanfrage in der Variable gespeichert ist, wenn ja Suchanfragen vereinen
        if ($L_suche == ""){
            $L_suche .= "$L_standortsql";
        }else {
            $L_suche .= " UNION $L_standortsql";
        }
    }else {
        $L_standortsql = "";
    }
    //Gewählten Filter in Variabler für Suchanfrage speichern
    if (isset ($_POST["L_FilterPreisAuswahl"])) {
        $L_preisauswahl = $_POST["L_FilterPreisAuswahl"];    
        $L_preissql = "SELECT * FROM artikel WHERE sale_status=0 AND art_preis=$L_preisauswahl 
                        UNION 
                        SELECT * FROM artikel WHERE sale_status=1 AND sale_preis=$L_preisauswahl";        
        //Prüfen, ob schon eine Suchanfrage in der Variable gespeichert ist, wenn ja Suchanfragen vereinen
        if ($L_suche == ""){
            $sql .= "$L_preissql";
        }else {
            $L_suche .= " UNION $L_preissql";
        }
    }else {
        $L_preissql = "";
    }
    //Gewählten Filter in Variabler für Suchanfrage speichern
    if (isset ($_POST["L_FilterHoeheAuswahl"])) {
        $L_hoeheauswahl = $_POST["L_FilterHoeheAuswahl"];
        $L_hoehesql = "SELECT * FROM artikel WHERE art_groesse=$L_hoeheauswahl";   
        //Prüfen, ob schon eine Suchanfrage in der Variable gespeichert ist, wenn ja Suchanfragen vereinen
        if ($L_suche == ""){
            $L_suche .= "$L_hoehesql";
        }else {
            $L_suche .= " UNION $L_hoehesql";
        }
    }else {
        $L_hoehesql = "";
    }
    //$L_suche .= ";";
}  
//Wenn Seite "normal" aufgerufen wird
else {
    $L_suche = "SELECT * FROM artikel ORDER BY sale_status DESC";
}

 //Artikelanzahl pro Seite
 $recordperpage = 6;
 //Wenn eine Seite ausgewählt wurde, ist diese die aktuelle Seite, sonst die Erste
 if (isset($_GET['page']) & !empty($_GET['page'])) {
     $currentpage = $_GET['page'];
 } else {
     $currentpage = 1;
 }
 //Wieviele Artikel werden übersprungen, um die aktuellen Anzuzeigen
 // bsp: akt.Seite=1 -> 1*6=6-6=0, um Seite 1 anzuzeigen werden keine Artikel übersprungen
 $recordSkip = ($currentpage * $recordperpage) - $recordperpage;

$totalpageCounted = mysqli_query($verbinde /*$link*/, $L_suche);
//echo $totalpageCounted;
$totalresult = mysqli_num_rows($totalpageCounted);



if ($totalresult <= 0)
{
    echo "Gesuchte Artikel nicht vorhanden.";
    
}else {

    $lastpage = ceil($totalresult / $recordperpage);
    $recordSkippage = 1;
    $nextpage = $currentpage + 1;
    $previouspage = $currentpage - 1;

    $L_suchePag = "$L_suche LIMIT $recordSkip, $recordperpage";

    $result = mysqli_query($verbinde /*$link*/, $L_suchePag);


    while ($L_erg = mysqli_fetch_assoc($result))
    {
        echo "<div class=\"L_shopArtContainer\">";  
        echo "<form action=\"index.php\" method=\"get\">";
        echo "<input name=\"L_shopArtButton\" type=\"hidden\" value=" . $L_erg['art_id'] . ">";
        echo "<button name=\"Seiten_ID\" type=\"submit\" value=\"artikelansicht\" class=\"L_shopArtContainer\"> ";     
        echo "<img  src=\"assets/img/" . $L_erg['art_bild'] . "\" class=\"L_shopArtBild\">";
        echo "<p class=\"L_shopArtName\">";
            echo $L_erg['art_name'];
        echo "</p>";
        if ($L_erg['sale_status']==0){
            echo "<p class=\"L_shopArtPreis\">";
                echo $L_erg['art_preis'] . " €";
            echo "</p>";
            echo "<p class=\"L_exPreis\">";
                echo "";
            echo "</p>";
        } else {
            echo "<p class=\"L_shopArtPreis\">";
                echo $L_erg['sale_preis'] . " €";
            echo "</p>";
            echo "<p class=\"L_exPreis\">";
                echo $L_erg['art_preis'] . " €";
            echo "</p>";
        }
        echo "</button>";
        echo "</form>";
        echo "</div>";
    }
    echo "</div>";
    echo "<div id=\"L_shopPagContBack\">";
        echo "<div id=\"L_shopPagContSigns\">";

        if ($currentpage != $recordSkippage) {
            echo "<a href=\"?Seiten_ID=shop&page=".$recordSkippage."\" class=\"L_pagPfeil\">";
            echo "Erste</a>";
        }  
        if ($currentpage >= 3){
            echo "<a href=\"?Seiten_ID=shop&page=".$previouspage."\" class=\"L_shopPagAusgabe\">...";
            echo $previouspage."     </a>";
        }

        echo "<a href=\"?Seiten_ID=shop&page=".$currentpage."\" class=\"L_shopPagAusgabe\">     ";
        echo $currentpage . "     </a>";

        if ($currentpage != $lastpage & $lastpage != 0) {
            echo "<a href=\"?Seiten_ID=shop&page=".$nextpage."\" class=\"L_shopPagAusgabe\">";
            echo $nextpage."...</a>";
            echo "<a href=\"?Seiten_ID=shop&page=".$lastpage."\" class=\"L_pagPfeil\">";
            echo "Letzte</a>";
        } 

        echo "</div>";
    echo "</div>";

    /*
    if (!mysqli_query($verbinde //$link
  , "SET @a:='this will not work'")) {
        printf("Error: %s\n", mysqli_error($verbinde //$link
    ));
    }  
//mysqli_free_result($result);
//mysqli_close($verbinde //$link
);
*/


}
?>