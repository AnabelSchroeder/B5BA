<?php
///////////////////////////////////////
// shopseite des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


if ($seitenid == "shop") {

include "Frontend/suchbereichBildhintergrund.php";


// Filterleiste _______________________________________________________________FILTERLEISTE_______//
echo "<div id=\"L_FilterBarCon\">";
        //Container für den Content der Filterleiste

    echo "<div>";

    echo "<div id=\"L_FilterBar\">";
            //Container für Preisfilterfeld und gewählte Filteranzeige
        //echo "<div>";
            echo "<div id=\"L_FilterPreis\" class=\"L_FilterKat\">";
                echo "<span>Preis</span>";
                echo "<button onClick=\"L_showPreisFilterMenu()\">";
                    echo "<img class=\"L_FilterButtonIcon\" src=\"assets/PH.jpg\">";
                echo "</button>";
                //echo "<div id=\"L_Preisfiltermenuanzeige\" class=\"L_FilterMenu\"></div>";
            echo "</div>";
            //echo "<div id=\"L_gewFilterAnzeige\">";
                //echo "Gewählte Filter: ";
            //echo "</div>";
        //echo "</div>";

            //Filter für Farbe
        echo "<div id=\"L_FilterFarbe\" class=\"L_FilterKat\">";
            echo "<span>Farbe</span>";
            echo "<button onclick=\"L_showFarbeFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";

            //Filter für Kategorie
        echo "<div id=\"L_FilterKategorie\" class=\"L_FilterKat\">";
            echo "<span>Kategorie</span>";
            echo "<button onclick=\"L_showKategorieFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";


            //Filter für Höhe
            echo "<div id=\"L_FilterHoehe\" class=\"L_FilterKat\">";
            echo "<span>Hoehe</span>";
            echo "<button onclick=\"L_showHoeheFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";

            //Filter für Pflege
            echo "<div id=\"L_FilterPflege\" class=\"L_FilterKat\">";
            echo "<span>Pflege</span>";
            echo "<button onclick=\"L_showPflegeFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";

            //Filter für Standort
            echo "<div id=\"L_FilterStandort\" class=\"L_FilterKat\">";
            echo "<span>Standort</span>";
            echo "<button onclick=\"L_showStandortFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";

    echo "<form action=\"index.php\" method=\"post\">";
            //Zurücksetzenbutton
        echo "<button id=\"L_filterReset\" type=\"reset\">Filter zurücksetzen</button>";

    echo "</form>";

    echo "</div>";
    echo "<div id=\"L_gewFilterAnzeige\">";
                echo "Gewählte Filter: ";
            echo "</div>";

    echo "</div>";
   
    echo "</div>";


//_Artikelanzeige (der Suche)__________________________________________ARTIKELANZEIGE_(SUCHE)__//
echo "<div id=\"L_shopArtAusgabe\" class=\"L_contentbereich\">";

    //function in L_DBanbindung.php
    /*echo "<div class=\"L_shopArtContainer\">";
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
    echo "</div>";*/

echo "</div>";


//_Seitenzahl der Artikel______________________________________________SEITENZAHL_D_ARTIKEL__//
echo "<div id=\"L_shopPagContBack\">";
    echo "<div id=\"L_shopPagContSigns\">";
        
            echo "<img id=\"L_pfeil_l\" class=\"L_pagPfeil\" src=\"assets/PH.jpg\">";
        
            echo "<span id=\"L_shopPagAusgabe\">";

                echo "1 2 3 4";

            echo "</span>";

            echo "<img id=\"L_pfeil_r\" class=\"L_pagPfeil\" src=\"assets/PH.jpg\">";
            
    echo "</div>";
echo "</div>";

}

?>