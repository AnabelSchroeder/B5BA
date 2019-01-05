<?php
///////////////////////////////////////
// header des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

//Haupt CSS einbinden
//echo"<link rel=\"stylesheet\" href=\"../CSS/maincss.css\" type=\"text/css\">";


echo "<header>";

echo "<div id=\"L_headerContentContainer\">";

//===================================================================================//
echo "<div id=\"L_headerLinks\">";

//-----------------------------------------------------------------------------------//
    // Logo anzeigen und Link zur LandingPage
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"index\">";
            echo "<img class=\"L_img\" src=\"assets/PH.jpg\">";
        echo "</button>";
    echo "</form>";

//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Verlinkung zur LandingPage anzeigen
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"index\">";
            echo "Home";
        echo "</button>";
    echo "</form>";

//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Verlinkung zur Shop-Seite anzeigen
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"shop\">";
            echo "Shop";
        echo "</button>";
    echo "</form>";    

//-----------------------------------------------------------------------------------//

//-----------------------------------------------------------------------------------//
    // der Button muss später in den Header - Adminbutton
    echo"<form action=\"index.php\" method=\"get\">";
        echo"<button class=\"L_headerButton\" name=\"Seiten_ID\" 
                     id=\"L_AdminButton\" style=\"visibility:hidden\"
                    type=\"submit\" 
                    value=\"Adminbereich\">Admin</button>";
    echo"</form>";

//-----------------------------------------------------------------------------------//

echo "</div>";
//===================================================================================//

echo "<div id=\"L_headerLücke\"></div>";

//===================================================================================//
echo "<div id=\"L_headerRechts\">";

//-----------------------------------------------------------------------------------//
    // Icon für Suchfeld
    echo "<div id=\"L_headerSuche\">";
        echo "<form action=\"index.php\" method=\"get\">";
            echo "<button name=\"Seiten_ID\" type=\"submit\" class=\"L_headerButton\"";
                    echo "value=\"shop\">";
                echo "<img class=\"L_img\" src=\"assets/icons/icons8-search-48 Kopie_weiss.png\">";
            echo "</button>";
        echo "</form>"; 
    echo "</div>";
        
//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Icon für Account/Login
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"Login\">";
            echo "<img class=\"L_img\" src=\"assets/icons/DefaultStaffMember_bearb_weiss.png\">";
        echo "</button>";
    echo "</form>";

//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Icon für Warenkorb mit Artikelanzahlanzeige
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"warenkorb\">";
            echo "<img class=\"L_img\" src=\"assets/icons/img_334581 Kopie_weiss_Basket.png\">";
            echo "<div id=\"L_warenkorb_art_anz\">";  
                /*if (warenkorbAnzahl()!=null) {
                    echo warenkorbAnzahl();
                } else {
                    echo "0";
                } */
                include "Frontend/L_DB_Warenkorbanzahl.php";     
            echo "</div>";
        echo "</button>";
    echo "</form>";

//-----------------------------------------------------------------------------------//

echo "</div>";
//===================================================================================//

echo "</div>";

echo "</header>";

/*echo "<script type=\"text/javascript\" src=\"../js/L.js\"></script>";*/

/*include "Frontend/L_DB_Warenkorbanzahl.php";'*/
?>