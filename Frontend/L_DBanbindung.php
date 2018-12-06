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

//Anzeige von Artikeln auf der Shopseite
function L_shopShowArticle() {
    foreach ($conn->query($L_suche) as $L_erg) {
        echo "<div class=\"L_shopArtContainer\">";
        
        echo "<img  src=\"assets/img/" + $L_erg['art_bild'] + "\" class=\"L_shopArtBild\">";
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

    $L_suche = "SELECT art_id, art_name, art_bild, art_preis, sale_status, sale_preis 
                FROM (DISTINCT art_id) artikel 
                WHERE art_name, art_text, kat_bez, art_ort, art_pflege 
                LIKE %$L_suchbegriff%";
    L_shopShowArticle();

};

//Anzeige der Artikel bei Aufruf der shopseite
function L_shopArtikelanzeige() {
    $L_suche = "SELECT art_id, art_name, art_bild, art_preis, sale_status, sale_preis 
                FROM (DISTINCT art_id) artikel 
                ORDER BY art_name";
    L_shopShowArticle();
}

//Artikelansicht
function L_artansShowArtikel() {
    $L_artid = $_POST["L_shopArtButton"];

    $sql = "SELECT * FROM artikel WHERE art_id=$L_artid";
    foreach ($conn->query($sql) as $row) {
        //Container für Bild und Kaufinfos -----------------------
        echo "<div id=\"L_artAnsichtKopfCont\">";

            //Container für Bild
        echo "<div id=\"L_artBild\">";
            echo "<img class=\"L_artImg\" src=\"assets/img/" + $row['art_bild'] + "\">";
        echo "</div>";

            //Container für Kaufinfos
        echo "<div id=\"L_artKaufInfoCon\">";
                //Artikelname
            echo "<h1 class=\"L_h1\">";
                echo $row['art_name'];
            echo "</h1>";
                //Container für Kaufinfos
            echo "<div id=\"L_artKaufInfo\">";
                    //Absatz Preis
                echo "<p id=\"L_artPreis\">";
                    echo $row['art_preis'] + " €";
                echo "</p>";

                echo "<p id=\"L_artInklMWST\">";
                    echo "inkl. MwSt.";
                echo "</p>";


                echo "<p id=\"L_zzglVersandko\">";
                    echo "zzgl. Versandkosten";
                echo "</p>";

                    //Formular für Menge in den Warenkorb
                echo "<form action=\"index.php\" method=\"post\">";
                    echo "<input >";
                    echo "<button id=\"L_artInBasket\" type=\"submit\">In den Warenkorb</button>";
                echo "</form>";

            echo "</div>";


        echo "</div>";

    echo "</div>";
    // ------------------------------------------------------

    echo "<div id=\"L_artText\">";

            echo "<h3 class=\"L_h3\">Produktbeschreibung</h3>";
            echo "<p id=\"L_artProdBeschr\" class=\"L_p\">";
                echo $row['art_text'];
            echo "</p>";

            echo "<h3 class=\"L_h3\">Pflegehinweise</h3>";
            echo "<p id=\"L_artPflege\" class=\"L_p\">";
                echo $row['art_pflege'];
            echo "</p>";

            echo "<h3 class=\"L_h3\">Produkthinweise</h3>";

                echo "<table class=\"L_table\">";

                

                        echo "<tr class=\"L_tr\">";

                            echo "<td>";
                                echo "Höhe";
                            echo "</td>";

                            echo "<td class=\"L_artProdHinR\">";
                                echo $row['art_groesse'];
                            echo "</td>";

                        echo "</tr>";

                        echo "<tr class=\"L_tr\">";

                            echo "<td>";
                                echo "Standort";
                            echo "</td>";

                            echo "<td class=\"L_artProdHinR\">";
                                echo $row['art_ort'];
                            echo "</td>";

                        echo "</tr>";

                        echo "<tr class=\"L_tr\">";

                            echo "<td>";
                                echo "Farbe";
                            echo "</td>";

                            echo "<td class=\"L_artProdHinR\">";
                                echo $row['art_farbe'];
                            echo "</td>";

                        echo "</tr>";

                        echo "<tr class=\"L_tr\">";

                            echo "<td>";
                                echo "Anlass";
                            echo "</td>";

                            echo "<td class=\"L_artProdHinR\">";
                                echo "Geburtstag";
                            echo "</td>";

                        echo "</tr>";

                

                echo "</table>";
    echo "</div>";
        }
};



/**/
?>