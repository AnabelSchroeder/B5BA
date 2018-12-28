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


$L_suche = "SELECT * FROM artikel";
$result = mysqli_query($verbinde /*$link*/, $L_suche);

if (mysqli_num_rows ($result) > 0)
{
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
    
}else {
    echo "nope";
}
?>