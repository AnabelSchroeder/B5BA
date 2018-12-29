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

$L_sqlCookieId = "SELECT cookie_id FROM cookie WHERE cookie_wert=$_COOKIE[KEINEAHNUNG]"; //!!!!!!!!!
$L_cookieId = mysqli_query($verbinde, $L_sqlCookieId);

if (isset ($_POST['Menge']))
{
$sqlinsert = "INSERT INTO warenkorb
(
korb_id,
cookie_id,
art_id,
anzahl_art
)
VALUES
(
auto,
\"".$L_cookieId."\", 
\"".$_POST['art_id']."\", //NOCHT NICHT RICHTIG!!!!!!!!!!!!!
\"".$_POST['Menge']."\"
);";
$sqlinsert = mysqli_query($verbinde, $sqlinsert) OR die (mysqli_error());
echo "Daten gespeichert";

}
?>