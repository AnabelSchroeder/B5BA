<?php
session_start();




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
echo"<link rel=\"stylesheet\" href=\"Frontend/Antonia/pflanzenshop_Lbearb.css\" type=\"text/css\">";
//Lisas CSS
echo"<link rel=\"stylesheet\" href=\"CSS/L_maincss.css\" type=\"text/css\">";

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
//include "Frontend/warenkorb.php";
include "Frontend/warenkorb.php";
//include "Frontend/L_DB_artikelWarenkorb1.php";
//include "Frontend/L_DBanbindung.php";

//Antonias
//include "Antonia/Landing_controller_Lbearb.php";
include "Antonia/landing_page_Lbearb.php";

//Adminbereich einbinden
    include "Adminbereich/adminbereich.php";
    


include "Frontend/footer.php";



echo"</body>";



echo"</html>";

?>

<script type="text/javascript" src="js/L.js"></script>