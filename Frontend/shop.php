<?php
///////////////////////////////////////
// shopseite des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


//Haupt CSS einbinden
echo"<link rel=\"stylesheet\" href=\"../CSS/maincss.css\" type=\"text/css\">";

// Bildbereich mit Suchfeld
echo "<div id=\"L_Content_SucheContainer\">";
    echo "<form action=\"index.php\" method=\"post\">";
        echo "<input id=\"L_ContSuchfeld\" type=\"text\" 
                    name=\"L_searchfield\" onkeyup=\"L_startSearch()\" 
                    placeholder=\"Suchen nach Produkten, Farben, Anlässen, ...\">";
        echo "<button id=\"L_ContSearchButton\" type=\"submit\">";
            echo "<img id=\"L_ContSearchButtIcon\" src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</form>";
echo "</div>";


// Filterleiste
echo "<div id=\"L_FilterBarCon\">";

echo "<div id=\"L_FilterBar\">";

    echo "<div id=\"L_FilterPreis\" class=\"L_FilterKat\">";
        echo "<span>Preis</span>";
        echo "<button onclick=\"L_showPreisFilterMenu()\">";
            echo "<img class=\"L_FilterButtonIcon\" src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</div>";


    echo "<div id=\"L_FilterFarbe\" class=\"L_FilterKat\">";
        echo "<span>Farbe</span>";
        echo "<button onclick=\"L_showFarbeFilterMenu()\">";
            echo "<img class=\"L_FilterButtonIcon\" src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</div>";


    echo "<div id=\"L_FilterKategorie\" class=\"L_FilterKat\">";
        echo "<span>Kategorie</span>";
        echo "<button onclick=\"L_showKategorieFilterMenu()\">";
            echo "<img class=\"L_FilterButtonIcon\" src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</div>";


    echo "<div id=\"L_FilterTopic\" class=\"L_FilterKat\">";
        echo "<span>Anlässe und Themen</span>";
        echo "<button onclick=\"L_showTopicFilterMenu()\">";
            echo "<img class=\"L_FilterButtonIcon\" src=\"../assets/PH.jpg\">";
        echo "</button>";
    echo "</div>";

echo "<form action=\"index.php\" method=\"post\">";

    echo "<button id=\"L_filterReset\" type=\"reset\">Filter zurücksetzen</button>";

echo "</form>";

echo "</div>";

echo "<div id=\"L_FilterAnzeige\">";
    echo "BLABLABLA";
echo "</div>";

echo "</div>";


// Artikelanzeige (der Suche)
echo "<div id=\"L_shopArtAusgabe\">";

    echo "<div class=\"L_shopArtContainer\">";
        echo "<img src=\"../assets/PH.jpg\" class=\"L_shopArtBild\">";
        echo "<p class=\"L_shopArtName\">";
            echo "PLATZHALTER";
        echo "</p>";
        echo "<p class=\"L_shopArtPreis\">";
            echo "12,34 €";
        echo "</p>";
    echo "</div>";

echo "</div>";


// Seitenzahl der Artikel
echo "<div id=\"L_shopPagContBack\">";
    echo "<div id=\"L_shopPagContSigns\">";
        
            echo "<img src=\"../assets/PH.jpg\">";
        
            echo "<div id=\"L_shopPagAusgabe\">";

                echo "1 2 3 4";

            echo "</div>";

            echo "<img src=\"../assets/PH.jpg\">";
            
    echo "</div>";
echo "</div>";

?>