<?php
///////////////////////////////////////
// header des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

echo "<header>";
    // Logo anzeigen
    echo "<img src=\"../img/PH.jpg\">";

    // Verlinkung zur Home-Seite anzeigen
    echo "<button>";
        echo "Home";
    echo "</button>";

    // Verlinkung zur Shop-Seite anzeigen
    echo "<button>";
        echo "Shop";
    echo "</button>";

    // Icon für Suchfeld
    echo "<button>";
        echo "<img src=\"../img/PH.jpg\">";
    echo "</button>";

    // Icon für Account/Login
    echo "<button>";
        echo "<img src=\"../img/PH.jpg\">";
    echo "</button>";

    // Icon für Warenkorb mit Artikelanzahlanzeige
    echo "<button>";
        echo "<img src=\"../img/PH.jpg\">";
        echo "<div id=\"warenkorb_art_anz\">";
            echo "";
        echo "</div>";
    echo "</button>";


// der Button muss später in den Header
echo"<form action=\"index.php\" method=\"get\">";
echo"<button name=\"Seiten_ID\" type=\"submit\" value=\"Adminbereich\">Admin</button>";
echo"</form>";


if(isset($_GET['Seiten_ID'])) {
    $seitenid = $_GET['Seiten_ID'];
} else {
    $seitenid = "index";
}



echo "</header>";

?>