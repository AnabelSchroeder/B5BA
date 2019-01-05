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
    
 /*   
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
*/

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

/*
            //Filter für Höhe
            echo "<div id=\"L_FilterHoehe\" class=\"L_FilterKat\">";
            echo "<span>Hoehe</span>";
            echo "<button onclick=\"L_showHoeheFilterMenu()\">";
                echo "<img class=\"L_FilterButtonIcon\" src=\"assets/PH.jpg\">";
            echo "</button>";
        echo "</div>";
*/

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

    //echo "<form action=\"index.php\" method=\"post\">";
    echo "<form action=\"index.php?Seiten_ID=shop\" method=\"post\">";
            //Zurücksetzenbutton
        echo "<button id=\"L_filterReset\" name=\"L_resetFilter\" type=\"submit\">Filter zurücksetzen</button>";

    echo "</form>";
include "Frontend/L_DB_shop_reset1.php";
    echo "</div>";
    echo "<div id=\"L_gewFilterAnzeige\">";
                echo "Gewählte Filter: ";
                if(
                    //(isset ($_POST["Preis"]) && ($_POST["L_FilterPreisAuswahl"]) != NULL) || 
                    (isset($_SESSION["L_filterPreis"]) && $_SESSION["L_filterPreis"] != null) || 
                    //(isset ($_POST["Farbe"]) && ($_POST["L_FilterFarbeAuswahl"]) != NULL) || 
                    (isset($_SESSION["L_filterFarbe"]) && $_SESSION["L_filterFarbe"]!= null) || 
                    //(isset ($_POST["Kategorie"]) && ($_POST["L_FilterKategorieAuswahl"]) != NULL )|| 
                    (isset($_SESSION["L_filterKategorie"]) && $_SESSION["L_filterKategorie"] != null) || 
                    //(isset ($_POST["Pflege"]) && ($_POST["PfL_FilterPflegeAuswahllege"]) != NULL) || 
                    (isset($_SESSION["L_filterPflege"]) && $_SESSION["L_filterPflege"] != null) || 
                    //(isset ($_POST["Hoehe"]) && ($_POST["L_FilterHoeheAuswahl"]) != NULL) || 
                    (isset($_SESSION['L_filterHoehe']) && $_SESSION['L_filterHoehe'] != null) ||
                    //(isset ($_POST["Standort"]) && ($_POST["L_FilterStandortAuswahl"]) != NULL) || 
                    (isset($_SESSION["L_filterStandort"]) && $_SESSION["L_filterStandort"] != null)
                    ){
                    //if (isset ($_POST["Preis"]) & ($_POST["L_FilterPreisAuswahl"]) != NULL){
                    if (isset($_SESSION["L_filterPreis"]) && $_SESSION["L_filterPreis"] != null){
                        //$L_filtertext = "Preis=".$_POST["L_FilterPreisAuswahl"];
                        $L_filtertext = "Preis=".$_SESSION["L_filterPreis"];
                    }else{$L_filtertext = "";}
                    //if (isset ($_POST["Farbe"]) & ($_POST["L_FilterFarbeAuswahl"]) != NULL){
                    if (isset($_SESSION["L_filterFarbe"]) && $_SESSION["L_filterFarbe"]!= null){
                        if ($L_filtertext == ""){
                            //$L_filtertext = "Farbe=".$_POST["L_FilterFarbeAuswahl"];
                            $L_filtertext = "Farbe=".$_SESSION["L_filterFarbe"];
                        }else{$L_filtertext .= "; Farbe=".$_SESSION["L_filterFarbe"];}
                    }else{$L_filtertext .= "";}
                    //if (isset ($_POST["Kategorie"]) & ($_POST["L_FilterKategorieAuswahl"]) != NULL ){
                    if(isset($_SESSION["L_filterKategorie"]) && $_SESSION["L_filterKategorie"] != null){
                        if ($L_filtertext == ""){
                            //$L_filtertext = "Kategorie=".$_POST["L_FilterKategorieAuswahl"];
                            $L_filtertext = "Kategorie=".$_SESSION["L_filterKategorie"];
                        }else{$L_filtertext .= "; Kategorie=".$_SESSION["L_filterKategorie"];} 
                    }else{$L_filtertext .= "";}
                    //if (isset ($_POST["Pflege"]) & ($_POST["PfL_FilterPflegeAuswahllege"]) != NULL){
                    if(isset($_SESSION["L_filterPflege"]) && $_SESSION["L_filterPflege"] != null){
                        if ($L_filtertext == ""){
                            //$L_filtertext = "Pflege=".$_POST["PfL_FilterPflegeAuswahllege"];
                            $L_filtertext = "Pflege=".$_SESSION["L_filterPflege"];
                        }else{$L_filtertext .= "; Pflege=".$_SESSION["L_filterPflege"];}    
                    }else{$L_filtertext .= "";}
                    //if (isset ($_POST["Hoehe"]) & ($_POST["L_FilterHoeheAuswahl"]) != NULL){
                    if(isset($_SESSION['L_filterHoehe']) && $_SESSION['L_filterHoehe'] != null){
                        if ($L_filtertext == ""){
                            //$L_filtertext = "Ho&uuml;he= ".$_POST["L_FilterHoeheAuswahl"];
                            $L_filtertext = "Ho&uuml;he= ".$_SESSION['L_filterHoehe'];
                        }else{$L_filtertext.="; Ho&uuml;he=".$_SESSION['L_filterHoehe'];}
                    }else{$L_filtertext.="";}
                    //if (isset ($_POST["Standort"]) & ($_POST["L_FilterStandortAuswahl"]) != NULL){
                    if(isset($_SESSION["L_filterStandort"]) && $_SESSION["L_filterStandort"] != null){
                        if ($L_filtertext == ""){
                            //$L_filtertext = "Standort=".$_POST["L_FilterStandortAuswahl"];
                            $L_filtertext = "Standort=".$_SESSION["L_filterStandort"];
                        }else{$L_filtertext .= "; Standort= ".$_SESSION["L_filterStandort"];}
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
include "Frontend/L_DB_shop_reset1.php";
}

?>