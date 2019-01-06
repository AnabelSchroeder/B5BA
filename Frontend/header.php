<?php
///////////////////////////////////////
// header des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

echo "<header>";
    // Logo anzeigen
    echo "<img src=\"../assets/img/PH.jpg\">";

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
        echo "<img src=\"../assets/img/PH.jpg\">";
    echo "</button>";

    // Icon für Account/Login
    echo "<button>";
        echo "<img src=\"../assets/img/PH.jpg\">";
    echo "</button>";

    // Icon für Warenkorb mit Artikelanzahlanzeige
    echo "<button>";
        echo "<img src=\"../assets/img/PH.jpg\">";
        echo "<div id=\"warenkorb_art_anz\">";
            echo "";
        echo "</div>";
    echo "</button>";

echo "</header>";

?>