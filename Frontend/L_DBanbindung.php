<?php
///////////////////////////////////////
// DBanbindung des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

$servername = "localhost";
$username = "root";
$passwort = "";
$dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung

$conn = new PDO("mysql:host= $servername;dbname= $dbname",$username, $passwort);


?>