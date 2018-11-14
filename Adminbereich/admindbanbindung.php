<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ba_webshop";


$a_rechte = $_POST["a-rechte"];
$a_nname =  $_POST["a-nachname"];
$a_vname = $_POST["a-vorname"];
$a_strasse = $_POST["a-strasse"];
$a_ort = $_POST["a-ort"];
$a_plz = $_POST["a-plz"];
$a_email = $_POST["a-email"];
$a_loginname = $_POST["a-loginname"];
$a_passwort = $_POST["a-passwort"];
$a_sperrung = $_POST["a-sperrung"];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO nutzer (n_admin, n_nname, n_vname, n_strasse, n_ort, n_plz, n_mail, n_login, n_passwort, n_sperre)
    VALUES ('$a_rechte', '$a_nname', '$a_vname', '$a_strasse', '$a_ort', '$a_plz', '$a_email', '$a_loginname', '$a_passwort', '$a_sperrung' )";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


?>