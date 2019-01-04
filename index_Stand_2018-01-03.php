<?php
session_start();

/*
//??$cookie_
//Cookie_Antonia
$servername = "localhost";
$username = "root";
$passwort = "root";
$dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung

//$port = 8889;

//$link = mysqli_init();
//$success = mysqli_real_connect($link, $servername, $username, $passwort, $dbname, $port);

$verbinde = mysqli_connect($servername, $username, $passwort);
$connmysql = mysqli_select_db($verbinde, $dbname);

if (isset($_COOKIE['sid'])) {
    echo "cookie vorhanden";
   // in der Datenbank nachschauen, ob Cookie vorhanden
   //$sql ="SELECT cookie_id FROM cookie WHERE cookie_wert =\"".$_COOKIE['sid']."\";";
   $L_cookieSID = $_COOKIE['sid'];
   $sql ="SELECT cookie_id FROM cookie WHERE cookie_wert ='$L_cookieSID'";
   $result = mysqli_query($verbinde, $sql);

   $zeile = mysqli_fetch_assoc($result);
   echo "Cookie: ".$zeile['cookie_id'];


// evtl. Cookie verlängern 
$sid = $_COOKIE['sid'];
setcookie("sid", $sid, time()+3600*48);

}
    
else {
    // cookie id zufällig generieren
    $sid = md5(openssl_random_pseudo_bytes(32));
    // cookie setzen
setcookie("sid", $sid, time()+3600*48);
    // In DB speichern
    $sql = "INSERT INTO cookie
    ( 
        cookie_wert
    )
    VALUES
    (
        \"".$sid."\"
    );";
    /*$sql = "INSERT INTO cookie
    ( 
        cookie_wert
    )
    VALUES
    (
        '$sid'
    )";
    $sql = mysqli_query($verbinde, $sql);
    echo "neues cookie gesetzt";
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
//Antonias CSS
echo"<link rel=\"stylesheet\" href=\"Antonia/pflanzenshop.css\" type=\"text/css\">";

echo"</head>";


echo"<body>";

// Lisa: header einfügen
include "Frontend/header.php";

/* der Button muss später in den Header
echo"<form action=\"index.php\" method=\"get\">";
echo"<button name=\"Seiten_ID\" type=\"submit\" value=\"Adminbereich\">Admin</button>";
echo"</form>";
*/



if(isset($_GET['Seiten_ID'])) {
    $seitenid = $_GET['Seiten_ID'];
} else {
    $seitenid = "index";
}

//
echo $_GET['Seiten_ID']; echo $seitenid;

include "Frontend/shop.php";
//include "Frontend/L_DB_shop1.php";
include "Frontend/artikelansicht.php";
include "Frontend/warenkorb.php";
include "Frontend/L_DB_artikelWarenkorb1.php";
//include "Frontend/L_DBanbindung.php";

//Antonias
include "Antonia/Landing_controller.php";
include "Antonia/landing_page.php";

//Adminbereich einbinden
    include "Adminbereich/adminbereich.php";
    


include "Frontend/footer.php";



echo"</body>";



echo"</html>";

?>

<script type="text/javascript" src="js/L.js"></script>