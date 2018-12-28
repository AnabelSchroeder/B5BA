<?php
///////////////////////////////////////
// DBanbindung des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

$servername = "localhost";
$username = "root";
$passwort = "root";
$dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung

$conn = new PDO("mysql:host= $servername;dbname= $dbname",$username, $passwort);

/**/ 

//----------------------------------------------------------------------------------------//
//Anzeige von Artikeln auf der Shopseite
//----------------------------------------------------------------------------------------//
/*function L_shopShowArticle() {
    foreach ($conn->query($L_suche) as $L_erg) {
        echo "<div class=\"L_shopArtContainer\">";       
        echo "<img  src=\"assets/img/" . $L_erg['art_bild'] . "\" class=\"L_shopArtBild\">";
        echo "<p class=\"L_shopArtName\">";
            echo $L_erg['art_name'];
        echo "</p>";
        if ($L_erg['sale_status']=false){
            echo "<p class=\"L_shopArtPreis\">";
                echo $L_erg['art_preis'];
            echo "</p>";
            echo "<p class=\"L_exPreis\">";
                echo "";
            echo "</p>";
        } else {
            echo "<p class=\"L_shopArtPreis\">";
                echo $L_erg['sale_preis'];
            echo "</p>";
            echo "<p class=\"L_exPreis\">";
                echo $L_erg['art_preis'];
            echo "</p>";
        }
        echo "</div>";
    }
};

//Anzeige auf shopseite nach Suche durchs Suchfeld
function L_shopsuchanzeige() {
    $L_suchbegriff = $_POST["L_searchfield"];

    $L_suche = "SELECT DISTINCT art_id, art_name, art_bild, art_preis, sale_status, sale_preis  
                FROM artikel 
                WHERE art_name OR art_text OR kat_bez OR art_ort OR art_pflege 
                LIKE %$L_suchbegriff%";
    L_shopShowArticle();

};

//Anzeige der Artikel bei Aufruf der shopseite
function L_shopArtikelanzeige() {
    $L_suche = "SELECT art_id, art_name, art_bild, art_preis, sale_status, sale_preis 
                FROM artikel 
                ORDER BY art_name";
    L_shopShowArticle();
}*/

//___________________________________________________ANZEIGE_FUNKTIONEN_ARTIKEL_DER_SHOPSEITE__//

// Ausgabe der Artikel in Div-Contaimerm ---!!!!MUSS NOCH FORM POST FÜR ARTIKELSEITE DAZU!!!!!!
function L_shopShowArticle() {

    $seitenid = "shop";
   
    foreach ($conn->query($L_suche) as $L_erg) {
        echo "<div class=\"L_shopArtContainer\">";       
        echo "<img  src=\"assets/img/" . $L_erg['art_bild'] . "\" class=\"L_shopArtBild\">";
        echo "<p class=\"L_shopArtName\">";
            echo $L_erg['art_name'];
        echo "</p>";
        if ($L_erg['sale_status']=false){
            echo "<p class=\"L_shopArtPreis\">";
                echo $L_erg['art_preis'] . " €";
            echo "</p>";
            echo "<p class=\"L_exPreis\">";
                echo "";
            echo "</p>";
        } else {
            echo "<p class=\"L_shopArtPreis\">";
                echo $L_erg['sale_preis'] . " €";
            echo "</p>";
            echo "<p class=\"L_exPreis\">";
                echo $L_erg['art_preis'] . " €";
            echo "</p>";
        }
        echo "</div>";
    }
};

//Anzeige auf shopseite nach Suche durchs Suchfeld
function L_shopsuchanzeige() {
    $L_suchbegriff = $_POST["L_searchfield"];

    $sql = "SELECT COUNT (*) 
                FROM artikel 
                WHERE art_name OR art_text OR kat_bez OR art_ort OR art_pflege 
                LIKE %$L_suchbegriff%;";

    if ($res = $conn->query($sql)) {
        if ($res->fetchColumn() > 0) {
            $L_suche = "SELECT DISTINCT art_id, art_name, art_bild, art_preis, sale_status, sale_preis  
            FROM artikel 
            WHERE art_name OR art_text OR kat_bez OR art_ort OR art_pflege 
            LIKE %$L_suchbegriff%;";

            L_shopShowArticle();            
        } else {
            print "<p>Die Suche hat leider keine Treffer ergeben.</p>";
        }
    }
}

//Anzeige der Artikel bei Aufruf der shopseite
function L_shopArtikelanzeige() {
    $sql = "SELECT COUNT (*) FROM artikel";

    if ($totalresult = $conn->query($sql)) {
        if ($totalresult->fetchColumn() > 0) {
            $L_suche = "SELECT art_id, art_name, art_bild, art_preis, sale_status, sale_preis 
                        FROM artikel 
                        LIMIT $recordSkip, $recordperpage 
                        ORDER BY art_name";
            L_shopShowArticle();
        } else {
            print "<p>Keine Artikel vorhanden.</p>";
        }
    }
}

// Seitenpagination im Shop
function L_shopPagination() {

    $recordperpage = 6;
    if (isset($_GET['page']) & !empty($_GET['page'])) {
        $currentpage = $_GET['page'];
    } else {
        $currentpage = 1;
    }

    $recordSkip = ($currentpage * $recordperpage) - $recordperpage;


    // Individuell
    $query1 = "SELECT COUNT ($column) 
                FROM $tableandrest";
    $totalresult = $conn->query($query1);

    if ($totalresult = 0) {
        print "<p>Keine Artikel vorhanden.</p>";
    } else {
    $lastpage = ceil($totalresult / $recordperpage);


    $recordSkippage = 1;
    $nextpage = $currentpage . 1;
    $previouspage = $currentpage - 1;

    
    // Individuell
    $query2 = "SELECT $column 
                FROM $tableandrest 
                LIMIT $recordSkip, $recordperpage";
    $res = $conn->query($query2);

    while ($r = $res->fetch_assoc()) {
        echo "<div class=\"L_shopArtContainer\">"; 
        echo "<form action=\"index.php\" method=\"post\">";
        echo "<button name=\"L_shopArtButton\" type=\"submit\" value=\"".$r['art_id']."\">";     
        echo "<img  src=\"assets/img/" . $r['art_bild'] . "\" class=\"L_shopArtBild\">";
        echo "<p class=\"L_shopArtName\">";
            echo $r['art_name'];
        echo "</p>";
        if ($r['sale_status']=false){
            echo "<p class=\"L_shopArtPreis\">";
                echo $r['art_preis'] . " €";
            echo "</p>";
            echo "<p class=\"L_exPreis\">";
                echo "";
            echo "</p>";
        } else {
            echo "<p class=\"L_shopArtPreis\">";
                echo $r['sale_preis'] . " €";
            echo "</p>";
            echo "<p class=\"L_exPreis\">";
                echo $r['art_preis'] . " €";
            echo "</p>";
        }
        echo "</button>";
        echo "</form>";
        echo "</div>";
    }
    echo "<div id=\"L_shopPagContBack\">";
        echo "<div id=\"L_shopPagContSigns\">";
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!--------HIER WEITERMACHEN-------------!!!!!!!!
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-----------------!!!!!!!!!!!!!!!!!!!!!!!!!!!    
        if ($currentpage != $recordSkippage) {
            echo "<a href=\"?page=".$recordSkippage."\">";
            echo $recordSkippage."</a>";
            
        if ($currentpage >= 5){
            echo "<a href=\"?page=".$previouspage."\">...";
            echo $previouspage."</a>";
        }
            echo "<a href=\"?page=".$currentpage."\">";
            echo $currentpage."</a>";

        if ($currentpage != $lastpage) {
            echo "<a href=\"?page=".$nextpage."\">";
            echo $nextpage."...</a>";
            echo "<a href=\"?page=".$lastpage."\">";
            echo "Last</a>";
        }

//Alternativ
                echo "<img id=\"L_pfeil_l\" class=\"L_pagPfeil\" src=\"assets/PH.jpg\">";
        
            echo "<span id=\"L_shopPagAusgabe\">";

                echo "1 2 3 4";

            echo "</span>";

            echo "<img id=\"L_pfeil_r\" class=\"L_pagPfeil\" src=\"assets/PH.jpg\">";
            
        echo "</div>";
    echo "</div>";
        }





    }
    
}
//----------------------------------------------------------------------------------------//


/* UNION nachsehen */

function Filtersuche(){

    $sql = NULL;

if (isset ($_POST["L_FilterFarbeAuswahl"])) {
    $L_farbauswahl = $_POST["L_FilterFarbeAuswahl"];
    $L_farbsql = "SELECT art_id FROM artikel WHERE art_farbe=$farbauswahl";

    $sql .= "$L_farbsql";
} else {
    $L_farbsql = NULL;
}

if (isset ($_POST["L_FilterKategorieAuswahl"])) {
    $L_katauswahl = $_POST["L_FilterKategorieAuswahl"];
    $L_katsql = "SELECT art_id FROM artikel WHERE kat_bez=$L_katauswahl";

    if ($sql == NULL){
        $sql .= "$L_katsql";
    }else {
        $sql .= " UNION $L_katsql";
    }
}else {
    $L_katsql = NULL;
}

if (isset ($_POST["L_FilterPflegeAuswahl"])) {
    $L_pflegeauswahl = $_POST["L_FilterPflegeAuswahl"];
    $L_pflegesql = "SELECT art_id FROM artikel WHERE art_pflege=$L_pflegeauswahl";

    if ($sql == NULL){
        $sql .= "$L_pflegesql";
    }else {
        $sql .= " UNION $L_pflegesql";
    }
}else {
    $L_pflegesql = NULL;
}


if (isset ($_POST["L_FilterStandortAuswahl"])) {
    $L_standortauswahl = $_POST["L_FilterStandortAuswahl"];
    $L_standortsql = "SELECT art_id FROM artikel WHERE art_ort=$L_standortauswahl";

    if ($sql == NULL){
        $sql .= "$L_standortsql";
    }else {
        $sql .= " UNION $L_standortsql";
    }
}else {
    $L_standortsql = NULL;
}

if (isset ($_POST["L_FilterPreisAuswahl"])) {
    $L_preisauswahl = $_POST["L_FilterPreisAuswahl"];

    $L_preissql = "SELECT art_id FROM artikel WHERE sale_status=0 AND art_preis=$L_preisauswahl 
                    UNION 
                    SELECT art_id FROM artikel WHERE sale_status=1 AND sale_preis=$L_preisauswahl";

    
    if ($sql == NULL){
        $sql .= "$L_preissql";
    }else {
        $sql .= " UNION $L_preissql";
    }
}else {
    $L_preissql = NULL;
}

if (isset ($_POST["L_FilterHoeheAuswahl"])) {
    $L_hoeheauswahl = $_POST["L_FilterHoeheAuswahl"];
    $L_hoehesql = "SELECT art_id FROM artikel WHERE art_groesse=$L_hoeheauswahl";

    if ($sql == NULL){
        $sql .= "$L_hoehesql";
    }else {
        $sql .= " UNION $L_hoehesql";
    }
}else {
    $L_hoehesql = NULL;
}

if ($totalresult = $conn->query($sql)) {
    if ($totalresult->fetchColumn() > 0) {
        $L_suche = "SELECT art_id, art_name, art_bild, art_preis, sale_status, sale_preis 
                    FROM artikel 
                    LIMIT $recordSkip, $recordperpage 
                    ORDER BY art_name";
        L_shopShowArticle();
    } else {
        print "<p>Keine Artikel vorhanden.</p>";
    }
}
}
/**/
//----------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------//
?>