<?php
///////////////////////////////////////
// header des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

//Haupt CSS einbinden
echo"<link rel=\"stylesheet\" href=\"L_maincss.css\" type=\"text/css\">";


echo "<header>";

echo "<div id=\"L_headerContentContainer\">";

//===================================================================================//
echo "<div id=\"L_headerLinks\">";

//-----------------------------------------------------------------------------------//
    // Logo anzeigen und Link zur LandingPage
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"index\">";
            echo "<img class=\"L_img\" src=\"logo-weiß.png\">";
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
                echo "<img class=\"L_img\" src=\"assets/PH.jpg\">";
            echo "</button>";
        echo "</form>"; 
    echo "</div>";
        
//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Icon für Account/Login
//Abfrage: eingeloggt?
    // nicht eingeloggt weiterleitung zu login
if(isset($_SESSION['eingeloggt']) AND $_SESSION['eingeloggt']==false)
{
    

    echo "<form action=\"index.php?Seiten_ID=login\" method=\"POST\">";
    echo "<input type=\"hidden\" name=\"zu_user_seite\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"login\">";
            echo "<img class=\"L_img\" src=\"assets/PH.jpg\">";
            echo"login";
        echo "</button>";
    echo "</form>";
}

//eingeloggt
// weiterleitung zum Userkonto
    else if(isset($_SESSION['eingeloggt']) AND $_SESSION['eingeloggt']==true)
    {
        
    
        echo "<form action=\"index.php?Seiten_ID=Adminbereich\" method=\"POST\">";
            echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                    echo "value=\"login\">";
                echo "<img class=\"L_img\" src=\"assets/PH.jpg\">";
                echo"login";
            echo "</button>";
        echo "</form>";
    }
    else
    {
        echo "<form action=\"index.php?Seiten_ID=login\" method=\"POST\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
      
                echo "value=\"login\">";
                echo "<input type=\"hidden\" name=\"zu_user_seite\">";
            echo "<img class=\"L_img\" src=\"assets/PH.jpg\">";
            echo"login";
        echo "</button>";
    echo "</form>";
    }
//-----------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------//
    // Icon für Warenkorb mit Artikelanzahlanzeige
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<button class=\"L_headerButton\" name=\"Seiten_ID\" type=\"submit\" ";
                echo "value=\"warenkorb\">";
            echo "<img class=\"L_img\" src=\"assets/PH.jpg\">";
            echo "<div id=\"L_warenkorb_art_anz\">";  
                /*if (warenkorbAnzahl()!=null) {
                    echo warenkorbAnzahl();
                } else {
                    echo "0";
                } */
               // include "L_DB_Warenkorbanzahl.php";     
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