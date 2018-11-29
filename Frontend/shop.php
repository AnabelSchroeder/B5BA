<?php
///////////////////////////////////////
// shopseite des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


//Haupt CSS einbinden
echo"<link rel=\"stylesheet\" href=\"../CSS/maincss.css\" type=\"text/css\">";

include "Frontend/suchbereichBildhintergrund.php";


// Filterleiste _________________________________________________
echo "<div id=\"L_FilterBarCon\">";
        //Container für den Content der Filterleiste
    echo "<div id=\"L_FilterBar\">";
            //Container für Preisfilterfeld und gewählte Filteranzeige
        echo "<div>";
            echo "<div id=\"L_FilterPreis\" class=\"L_FilterKat\">";
                echo "<span>Preis</span>";
                echo "<button onclick=\"L_showPreisFilterMenu()\">";
                    echo "<img class=\"L_FilterButtonIcon\" src=\"../assets/PH.jpg\">";
                echo "</button>";
            echo "</div>";
            echo "<div id=\"L_gewFilterAnzeige\">";
                echo "Gewählte Filter: ";
            echo "</div>";
        echo "</div>";

            //Filter für Farbe
        echo "<div id=\"L_FilterFarbe\" class=\"L_FilterKat\">";
            echo "<span>Farbe</span>";
            echo "<button onclick=\"L_showFarbeFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"../assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";

            //Filter für Kategorie
        echo "<div id=\"L_FilterKategorie\" class=\"L_FilterKat\">";
            echo "<span>Kategorie</span>";
            echo "<button onclick=\"L_showKategorieFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"../assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";

            //Filter für Anlässe
        echo "<div id=\"L_FilterTopic\" class=\"L_FilterKat\">";
            echo "<span>Anlässe und Themen</span>";
            echo "<button onclick=\"L_showTopicFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"../assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";

    echo "<form action=\"index.php\" method=\"post\">";
            //Zurücksetzenbutton
        echo "<button id=\"L_filterReset\" type=\"reset\">Filter zurücksetzen</button>";

    echo "</form>";

    echo "</div>";
   
    echo "</div>";


//_Artikelanzeige (der Suche)__________________________________________
echo "<div id=\"L_shopArtAusgabe\" class=\"L_contentbereich\">";

    echo "<div class=\"L_shopArtContainer\">";
        echo "<img src=\"../assets/img/begonie.jpg\" class=\"L_shopArtBild\">";
        echo "<p class=\"L_shopArtName\">";
            echo "PLATZHALTER";
        echo "</p>";
        echo "<p class=\"L_shopArtPreis\">";
            echo "12,34 €";
        echo "</p>";
        echo "<p class=\"L_exPreis\">";
            echo "23,45 €";
        echo "</p>";
    echo "</div>";

echo "</div>";


//_Seitenzahl der Artikel______________________________________________
echo "<div id=\"L_shopPagContBack\">";
    echo "<div id=\"L_shopPagContSigns\">";
        
            echo "<img id=\"L_pfeil_l\" class=\"L_pagPfeil\" src=\"../assets/PH.jpg\">";
        
            echo "<span id=\"L_shopPagAusgabe\">";

                echo "1 2 3 4";

            echo "</span>";

            echo "<img id=\"L_pfeil_r\" class=\"L_pagPfeil\" src=\"../assets/PH.jpg\">";
            
    echo "</div>";
echo "</div>";

?>