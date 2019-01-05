<?php
///////////////////////////////////////
// header des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


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
if (mysqli_connect_errno()){
    printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
    exit();
}
*/
$L_cookie = $_COOKIE['sid'];
$L_sqlCookieId = "SELECT cookie_id FROM cookie WHERE cookie_wert='$L_cookie'"; //!!!!!!!!!
$L_cookieIdres = mysqli_query($verbinde, $L_sqlCookieId);
$L_cookieIdarray = mysqli_fetch_assoc($L_cookieIdres);

$L_cookieId = $L_cookieIdarray["cookie_id"];

/*
$L_sqlbasketCount = "SELECT COUNT (korb_id) FROM warenkorb WHERE cookie_id='$L_cookieId';";
$L_basketCount = mysqli_query($verbinde, $L_sqlbasketCount);
return $L_basketCount;
*/

$L_sqlbasketCount = "SELECT korb_id FROM warenkorb WHERE cookie_id=$L_cookieId";
$L_basketCount = mysqli_query($verbinde, $L_sqlbasketCount);
$L_result = $L_basketCount;
$L_row_cnt = mysqli_num_rows($L_result);
if ($L_row_cnt!=null) {
    echo $L_row_cnt;
} else {
    echo "0";
}   
/*    
mysqli_free_result($L_cookieResult);
mysqli_free_result($L_result);

mysqli_close($verbinde);
*/
?>