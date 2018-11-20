<?php
///////////////////////////////////////
// header des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


echo "<header>";

//-----------------------------------------------------------------------------------//
    // Logo anzeigen und Link zur LandingPage/Home
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"index\">";
            echo "<img src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</form>";

//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Verlinkung zur Home-Seite anzeigen
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"index\">";
            echo "Home";
        echo "</button>";
    echo "</form>";

//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Verlinkung zur Shop-Seite anzeigen
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"Shop\">";
            echo "Shop";
        echo "</button>";
    echo "</form>";    

//-----------------------------------------------------------------------------------//

//-----------------------------------------------------------------------------------//
    // der Button muss später in den Header - Adminbutton
    echo"<form action=\"index.php\" method=\"get\">";
        echo"<button name=\"Seiten_ID\" type=\"submit\" value=\"Adminbereich\">Admin</button>";
    echo"</form>";

//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Icon für Suchfeld
   /* echo "<form action=\"index.php\" method=\"get\">";
        echo "<button name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"?\">";
            echo "<img src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</form>"; */

    echo "<button on:click=\"showSearchField()\">";
        echo "<img src=\"../assets/PH.jpg\">";
    echo "</button>";

//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Icon für Account/Login
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"Login\">";
            echo "<img src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</form>";

//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Icon für Warenkorb mit Artikelanzahlanzeige
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"Warenkorb\">";
            echo "<img src=\"../assets/PH.jpg\">";
            echo "<div id=\"warenkorb_art_anz\">";
                echo $w_art_anz;
            echo "</div>";
        echo "</button>";
    echo "</form>";

//-----------------------------------------------------------------------------------//


echo "</header>";

?>