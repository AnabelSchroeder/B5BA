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
   // echo "<form action=\"Frontend/shop.php\" method=\"post\">"; Funktioniert nicht
    echo "<form action=\"index.php?Seiten_ID=shop\" method=\"post\">";
        echo "<input id=\"L_ContSuchfeld\" type=\"text\" 
                    name=\"L_searchfield\" size=\"50\" "; /*onkeyup=\"L_startSearch()\" */
                echo "placeholder=\"Suchen nach Produkten, Farben, ...\">";
        echo "<button id=\"L_ContSearchButton\" name=\"L_suchbutton\" type=\"submit\" "; 
        //echo "onClick=\"L_suchfeldplatzhalterAendern()\"";  //Klappt nicht
        echo ">";
            echo "<img id=\"L_ContSearchButtIcon\" src=\"assets/PH.jpg\">";
        echo "</button>";
    echo "</form>";
echo "</div>";

/*
if (isset ($_POST['L_suchbutton']) & ($_POST['L_searchfield']) != "" ) {
    $seitenid = "shop";
} else {
    $seitenid = $_GET['Seiten_ID'];
}
*/
?>