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
        echo "<div >";  
        echo "<form action=\"index.php?Seiten_ID=warenkorb\" method=\"get\">";
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