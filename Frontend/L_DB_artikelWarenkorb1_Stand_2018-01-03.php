<?php

///////////////////////////////////////
// DBanbindung des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

if(isset($_POST['L_artIDinBasket'])){
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

/*
$L_sqlCookieId = "SELECT cookie_id FROM cookie WHERE cookie_wert=\"".$_COOKIE['sid']."\";"; //!!!!!!!!!
$L_cookieIdres = mysqli_query($verbinde, $L_sqlCookieId);
$L_cookieId = mysqli_fetch_assoc($L_cookieIdres);
*/$L_cookieId = 1;

/*
//if ((isset ($_POST['Menge']) && !empty($_POST['Menge'])) && isset($_POST['L_artIDinBasket'])) 
if (isset ($_POST['Menge']) && !empty($_POST['Menge'])) 
{
    //$seitenid = "warenkorb";
$sqlinsert = "INSERT INTO warenkorb
(

cookie_id,
art_id,
anzahl_art
)
VALUES
(

\"".$L_cookieId."\", 
\"".$_POST['L_artIDinBasket']."\", 
\"".$_POST['Menge']."\"
);";
$sqlinsert = mysqli_query($verbinde, $sqlinsert) OR die (mysqli_error());
echo "Daten gespeichert";
*/

if (isset ($_POST['Menge']) && !empty($_POST['Menge'])) 
{
    $L_basketArtID = $_POST['L_artIDinBasket'];
    $L_basketMenge = $_POST['Menge'];
    //$seitenid = "warenkorb";
$sqlinsert = "INSERT INTO `warenkorb`
(

`cookie_id`,
`art_id`,
`anzahl_art`
)
VALUES
(

$L_cookieId, 
$L_basketArtID, 
$L_basketMenge
)";
$sqlinsert = mysqli_query($verbinde, $sqlinsert) OR die (mysqli_error());
echo "Daten gespeichert";

$L_sucheGespDaten = "SELECT * FROM warenkorb WHERE cookie_id='$L_cookieId'";
$L_abfrGespDaten = mysqli_query($verbinde, $L_sucheGespDaten);
global $L_gespDaten;
/*while ($L_gespDaten = mysqli_fetch_assoc($L_abfrGespDaten)){
    echo $L_gespDaten['korb_id']." ".$L_gespDaten['cookie_id']." ".$L_gespDaten['art_id']." ".$L_gespDaten['anzahl_art'];*/
}
}


?>