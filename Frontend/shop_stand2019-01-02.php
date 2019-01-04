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
        echo "<button id=\"L_filterReset\" name=\"L_resetFilter\" type=\"reset\">Filter zurücksetzen</button>";

    echo "</form>";

    echo "</div>";
    echo "<div id=\"L_gewFilterAnzeige\">";
                echo "Gewählte Filter: ";
                if((isset ($_POST["L_FilterPreis"]) & ($_POST["L_FilterPreis"]) != NULL) || 
                (isset ($_POST["L_FilterFarbe"]) & ($_POST["L_FilterFarbe"]) != NULL) || 
                (isset ($_POST["L_FilterKategorie"]) & ($_POST["L_FilterKategorie"]) != NULL )|| 
                (isset ($_POST["L_FilterPflege"]) & ($_POST["L_FilterPflege"]) != NULL) || 
                (isset ($_POST["L_FilterHoehe"]) & ($_POST["L_FilterHoehe"]) != NULL) || 
                (isset ($_POST["L_FilterStandort"]) & ($_POST["L_FilterStandort"]) != NULL)){
                    if (isset ($_POST["L_FilterPreis"]) & ($_POST["L_FilterPreis"]) != NULL){
                        $L_filtertext = "Preis: ".$_POST["L_FilterPreis"];
                    }else{$L_filtertext = "";}
                    if (isset ($_POST["L_FilterFarbe"]) & ($_POST["L_FilterFarbe"]) != NULL){
                        if ($L_filtertext == ""){
                            $L_filtertext = "Farbe: ".$_POST["L_FilterFarbe"];
                        }else{$L_filtertext .= "; Farbe: ".$_POST["L_FilterFarbe"];}
                    }else{$L_filtertext .= "";}
                    if (isset ($_POST["L_FilterKategorie"]) & ($_POST["L_FilterKategorie"]) != NULL ){
                        if ($L_filtertext == ""){
                            $L_filtertext = "Kategorie: ".$_POST["L_FilterKategorie"];
                        }else{$L_filtertext .= "; Kategorie: ".$_POST["L_FilterKategorie"];} 
                    }else{$L_filtertext .= "";}
                    if (isset ($_POST["L_FilterPflege"]) & ($_POST["L_FilterPflege"]) != NULL){
                        if ($L_filtertext == ""){
                            $L_filtertext = "Pflege: ".$_POST["L_FilterPflege"];
                        }else{$L_filtertext .= "; Pflege: ".$_POST["L_FilterPflege"];}    
                    }else{$L_filtertext .= "";}
                    if (isset ($_POST["L_FilterHoehe"]) & ($_POST["L_FilterHoehe"]) != NULL){
                        if ($L_filtertext == ""){
                            $L_filtertext = "Ho&uuml;he: ".$_POST["L_FilterHoehe"];
                        }else{$L_filtertext.="; Ho&uuml;he: ".$_POST["L_FilterHoehe"];}
                    }else{$L_filtertext.="";}
                    if (isset ($_POST["L_FilterStandort"]) & ($_POST["L_FilterStandort"]) != NULL){
                        if ($L_filtertext == ""){
                            $L_filtertext = "Standort: ".$_POST["L_FilterStandort"];
                        }else{$L_filtertext .= "; Standort: ".$_POST["L_FilterStandort"];}
                    }else{$L_filtertext.="";}
                }
                echo $L_filtertext;
            echo "</div>";

    echo "</div>";
   
    echo "</div>";


//_Artikelanzeige (der Suche)__________________________________________ARTIKELANZEIGE_(SUCHE)__//
echo "<div id=\"L_shopArtAusgabe\" class=\"L_contentbereich\">";


if (isset($_GET['page']) & !empty($_GET['page'])) {
    $currentpage = $_GET['page'];
} else {
    $currentpage = 1;
}

//include "Frontend/L_DB_pdo.php";

//include "Frontend/L_DB_mysqli.php";
include "Frontend/L_DB_shop1.php";

}

?>