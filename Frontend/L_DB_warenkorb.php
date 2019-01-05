<?php
///////////////////////////////////////
// DB-abfrage für die Anzeige der Artikel im warenkorb des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

$servername = "localhost";
$username = "root";
$passwort = "root";
$dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung

$verbinde = mysqli_connect($servername, $username, $passwort);
$connmysql = mysqli_select_db($verbinde, $dbname);


if(isset($_POST["L_basketMengeChange"])){
    $L_basketkorbID = $_POST["L_basketMengeChange"];
    $L_basketArtMenge = $_POST["basketMenge"];

    $L_sql = "UPDATE warenkorb SET anzahl_art=$L_basketArtMenge WHERE korb_id=$L_basketkorbID";
    mysqli_query($verbinde, $L_sql);
}

if(isset($_POST["basketArtDel"])){
    $L_korbID = $_POST["basketArtDel"];

    $L_sql = "DELETE FROM warenkorb WHERE korb_id=$L_korbID";
    mysqli_query($verbinde, $L_sql);
}
?>