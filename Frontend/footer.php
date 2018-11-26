<?php
///////////////////////////////////////
// footer des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

//Haupt CSS einbinden
echo"<link rel=\"stylesheet\" href=\"../CSS/maincss.css\" type=\"text/css\">";

echo "<footer>";

    echo "<div id=\"L_footerContenContainer\">";

    echo "<div class=\"L_footerUntercontainer\">";

    // Logo anzeigen und Link zur LandingPage/Home
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button class=\"L_footerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"index\">";
            echo "<img class=\"L_img\" src=\"assets/PH.jpg\">";
        echo "</button>";
    echo "</form>";

    echo "</div>";


    //Container für interne Links
    echo "<div class=\"L_footerUntercontainer\">";

         // Verlinkung zur Home-Seite anzeigen
        echo "<form action=\"index.php\" method=\"get\">";
            echo "<button class=\"L_footerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                    echo "value=\"index\">";
                echo "Home";
            echo "</button>";
        echo "</form>";


       // Verlinkung zur Shop-Seite anzeigen
       echo "<form action=\"index.php\" method=\"get\">";
            echo "<button class=\"L_footerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                    echo "value=\"Shop\">";
                echo "Shop";
            echo "</button>";
        echo "</form>";    


        // Verlinkung zum Impressum
        echo "<button class=\"L_footerButton\" >";
            echo "Impressum";
        echo "</button>";

        //Verlinkung zur Datenschutzerklärung
        echo "<button class=\"L_footerButton\" >";
            echo "Datenschutzerklärung";
        echo "</button>";

    echo "</div>";

    // Container für externe Links
    echo "<div class=\"L_footerUntercontainer\">";

        echo "<ul id=\"L_footerExLinks\">";
        echo "<li>";

        // Facebook - Logo & Link
        echo "<button class=\"L_footerButton\" >";
            echo "<img class=\"L_imgFooter\" src=\"assets/PH.jpg\">";
            echo "Facebook";
        echo "</button>";

        echo "</li>";

        echo "<li>";

        // Twitter - Logo & Link
        echo "<button class=\"L_footerButton\" >";
            echo "<img class=\"L_imgFooter\" src=\"assets/PH.jpg\">";
            echo "Twitter";
        echo "</button>";

        echo "</li>";

        echo "<li>";

        // Instagram
        echo "<button class=\"L_footerButton\" >";
            echo "<img class=\"L_imgFooter\" src=\"assets/PH.jpg\">";
            echo "Instagram";
        echo "</button>";

        echo "</li>";

        echo "</ul>";

    echo "</div>";

    // Container für Firmenangaben
    echo "<div id=\"L_Adresse\" class=\"L_footerUntercontainer\">";

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

    echo "</div>";

echo "</footer>";

?>