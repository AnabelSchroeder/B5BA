<?php
///////////////////////////////////////
// header des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

function warenkorbAnzahl(){
    $servername = "localhost";
$username = "root";
$passwort = "root";
$dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung

//$port = 8889;

//$link = mysqli_init();
//$success = mysqli_real_connect($link, $servername, $username, $passwort, $dbname, $port);

$verbinde = mysqli_connect($servername, $username, $passwort);
$connmysql = mysqli_select_db($verbinde, $dbname);

$L_cookie = $_COOKIE['KEINEAHNUNG']; //!!!!!!!!!

$L_sqlCookieId = "SELECT cookie_id FROM cookie WHERE cookie_wert='$L_cookie'"; 
$L_cookieId = mysqli_query($verbinde, $L_sqlCookieId);

$L_sqlbasketCount = "SELECT COUNT (korb_id) FROM warenkorb WHERE cookie_id='$L_cookieId'";
$L_basketCount = mysqli_query($verbinde, $L_sqlbasketCount);
return $L_basketCount;
}

?>