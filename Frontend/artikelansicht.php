<?php
///////////////////////////////////////
// artikelansicht des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


if ($seitenid == "artikelansicht") {

// Einfügen des Suchbereiches
include "Frontend/suchbereichBildhintergrund.php";

//_Content________________________________________________________
L_artansShowArtikel();

//----------------------------------------------------------------------------------------//
//Artikelansicht
function L_artansShowArtikel() {
    $L_artid = $_POST["L_shopArtButton"];

    $sql = "SELECT * FROM artikel WHERE art_id=$L_artid";
    foreach ($conn->query($sql) as $row) {

        //oberer Container für Bild und Kaufinfos des Artikels-----------------------
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
                // Wenn kein Angebot
                if ($L_erg['sale_status']=false){                       
                    echo "<p id=\"L_artPreis\">";
                        echo $row['art_preis'] + " €";
                    echo "</p>";
                } //Wenn Angebot
                else {
                    echo "<p id=\"L_artPreis\">";
                        echo $L_erg['sale_preis'] + " €";
                    echo "</p>";
                    echo "<p class=\"L_exPreis\">";
                        echo $L_erg['art_preis'] + " €";
                    echo "</p>";
                }

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
    // 
    echo "<div id=\"L_artText\">";

            echo "<h3 class=\"L_h3\">Produktbeschreibung</h3>";
            echo "<p id=\"L_artProdBeschr\" class=\"L_p\">";
                echo $row['art_text'];
            echo "</p>";
           /* echo "<h3 class=\"L_h3\">Pflegehinweise</h3>";
            echo "<p id=\"L_artPflege\" class=\"L_p\">";
                echo $row['art_pflege'];
            echo "</p>";*/
            echo "<h3 class=\"L_h3\">Produkthinweise</h3>";

                echo "<table class=\"L_table\">";   

                    echo "<tr class=\"L_tr\">";
                        echo "<td>";
                            echo "Kategorie";
                        echo "</td>";
                        echo "<td class=\"L_artProdHinR\">";
                            echo $row['kat_bez'];
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
                            echo "Pflege";
                        echo "</td>";
                        echo "<td class=\"L_artProdHinR\">";
                            echo $row['art_pflege'];
                        echo "</td>";
                    echo "</tr>";
            
                echo "</table>";

    echo "</div>";
        }
}

/*
echo "<div id=\"L_artikelAnsicht\" class=\"L_contentbereich\">";

        //Container für Bild und Kaufinfos -----------------------
    echo "<div id=\"L_artAnsichtKopfCont\">";

            //Container für Bild
        echo "<div id=\"L_artBild\">";
            echo "<img class=\"L_artImg\" src=\"assets/img/begonie.jpg\">";
        echo "</div>";

            //Container für Kaufinfos
        echo "<div id=\"L_artKaufInfoCon\">";
                //Artikelname
            echo "<h1 class=\"L_h1\">";
                echo "BEISPIEL";
            echo "</h1>";
                //Container für Kaufinfos
            echo "<div id=\"L_artKaufInfo\">";
                    //Absatz Preis
                echo "<p id=\"L_artPreis\">";
                    echo "12,34 €";
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
                echo "Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht. 
                        Die Pflanze ist grü und blüht. Die Pflanze ist grü und blüht.";
            echo "</p>";

            echo "<h3 class=\"L_h3\">Pflegehinweise</h3>";
            echo "<p id=\"L_artPflege\" class=\"L_p\">";
                echo "Regelmäßig mit Wasser gießen und düngen. Regelmäßig mit Wasser gießen und düngen. 
                        Regelmäßig mit Wasser gießen und düngen. Regelmäßig mit Wasser gießen und düngen. 
                        Regelmäßig mit Wasser gießen und düngen. Regelmäßig mit Wasser gießen und düngen. 
                        Regelmäßig mit Wasser gießen und düngen. Regelmäßig mit Wasser gießen und düngen. 
                        Regelmäßig mit Wasser gießen und düngen. Regelmäßig mit Wasser gießen und düngen.";
            echo "</p>";

            echo "<h3 class=\"L_h3\">Produkthinweise</h3>";

                echo "<table class=\"L_table\">";

                

                        echo "<tr class=\"L_tr\">";

                            echo "<td>";
                                echo "Höhe";
                            echo "</td>";

                            echo "<td class=\"L_artProdHinR\">";
                                echo "12 cm";
                            echo "</td>";

                        echo "</tr>";

                        echo "<tr class=\"L_tr\">";

                            echo "<td>";
                                echo "Standort";
                            echo "</td>";

                            echo "<td class=\"L_artProdHinR\">";
                                echo "Halbschatten";
                            echo "</td>";

                        echo "</tr>";

                        echo "<tr class=\"L_tr\">";

                            echo "<td>";
                                echo "Farbe";
                            echo "</td>";

                            echo "<td class=\"L_artProdHinR\">";
                                echo "Grün";
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
echo "</div>";
*/

}

?>