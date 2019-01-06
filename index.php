<?php
session_start();
//muss mit dem einloggen verbunden sein
/*if(!isset($_SESSION['csrf_token'])){
$_SESSION['csrf_token'] = md5(openssl_random_pseudo_bytes(32));
}*/

echo"<!DOCTYPE html>";
echo"<head>";
echo"<meta charset=\"utf-8\" />";
echo"<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />";
echo"<title>Pflanzenshop</title>";

//Haupt CSS einbinden
echo"<link rel=\"stylesheet\" href=\"CSS/maincss.css\" type=\"text/css\">";
//Adminbereich CSS einbinden
echo"<link rel=\"stylesheet\" href=\"CSS/admincss.css\" type=\"text/css\">";

echo"</head>";


echo"<body>";


// der Button muss später in den Header
echo"<form action=\"index.php\" method=\"get\">";
echo"<button name=\"Seiten_ID\" type=\"submit\" value=\"Adminbereich\">Admin</button>";
echo"</form>";


if(isset($_GET['Seiten_ID'])) {
    $seitenid = $_GET['Seiten_ID'];
} else {
    $seitenid = "index";
}


//Adminbereich einbinden
    include "Adminbereich/adminbereich.php";
    


echo"</body>";



echo"</html>";

?>