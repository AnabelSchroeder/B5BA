<?php
///////////////////////////////////////
// footer des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

echo "<footer>";

    // Logo anzeigen
    echo "<img src=\"../assets/img/PH.jpg\">";

    //Container für interne Links
    echo "<div>";

        // Verlinkung zur Home-Seite anzeigen
        echo "<button>";
            echo "Home";
        echo "</button>";

        // Verlinkung zur Shop-Seite anzeigen
        echo "<button>";
            echo "Shop";
        echo "</button>";

        // Verlinkung zum Impressum
        echo "<button>";
            echo "Impressum";
        echo "</button>";

        //Verlinkung zur Datenschutzerklärung
        echo "<button>";
            echo "Datenschutzerklärung";
        echo "</button>";

    echo "</div>";

    // Container für externe Links
    echo "<div>";

        // Facebook - Logo & Link
        echo "<button>";
            echo "<img src=\"../assets/img/PH.jpg\">";
            echo "Facebook";
        echo "<button>";

        // Twitter - Logo & Link
        echo "<button>";
            echo "<img src=\"../assets/img/PH.jpg\">";
            echo "Twitter";
        echo "<button>";

        // Instagram
        echo "<button>";
            echo "<img src=\"../assets/img/PH.jpg\">";
            echo "Instagram";
        echo "<button>";

    echo "</div>";

    // Container für Firmenangaben
    echo "<div>";

        // Name & Adresse
        echo "<div>";
            echo "Muster Unternehmen, Musterstrasse, Musterort";
        echo "<div>";

        // Tel
        echo "<div>";
            echo "Telefon: 01234-56789";
        echo "</div>";

        // mail
        echo "<div>";
            echo "mail@musterunternehmen.com";
        echo "</div>";


    echo "</div>";

echo "</footer>";

?>