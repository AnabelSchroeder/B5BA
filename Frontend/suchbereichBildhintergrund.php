<?php
///////////////////////////////////////
// shopseite des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


//Haupt CSS einbinden
echo"<link rel=\"stylesheet\" href=\"../CSS/maincss.css\" type=\"text/css\">";

//_Bildbereich mit Suchfeld______________________________________
    //Bild-Container
echo "<div id=\"L_Content_SucheContainer\">";
        //Formular für's Suchfeld mit Button
    echo "<form action=\"index.php\" method=\"post\">";
        echo "<input id=\"L_ContSuchfeld\" type=\"text\" 
                    name=\"L_searchfield\" onkeyup=\"L_startSearch()\" 
                    placeholder=\"Suchen nach Produkten, Farben, Anlässen, ...\">";
        echo "<button id=\"L_ContSearchButton\" type=\"submit\">";
            echo "<img id=\"L_ContSearchButtIcon\" src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</form>";
echo "</div>";

?>