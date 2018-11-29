<?php
///////////////////////////////////////
// warenkorb des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


//Haupt CSS einbinden
echo"<link rel=\"stylesheet\" href=\"../CSS/maincss.css\" type=\"text/css\">";

// Einfügen des Suchbereiches
include "Frontend/suchbereichBildhintergrund.php";

//_Content________________________________________________________
echo "<div id=\"L_artikelAnsicht\" class=\"L_contentbereich\">";


    echo "<h1 id=\"L_warKorH1\" class=\"L_h1\">Warenkorb</h1>";


    echo "<div id=\"L_warKorCon\">";

        echo "<div class=\"L_warKorArt\">";

            echo "<div class=\"L_warKorArtImgDiv\">";
                echo "<img class=\"L_warKorArtImg\" src=\"assets/img/begonie.jpg\">";
            echo "</div>";

            echo "<div class=\"L_warKorArtInfosCon\">";

                echo "<table class=\"L_warKorTable\">";

                    echo "<tr class=\"L_warKorTr\">";

                        echo "<td class=\"L_warKorArtName\" class=\"L_warKorSpalte1\">";
                            echo "Beispiel";
                        echo "</td>";

                        echo "<td class=\"L_warKorArtMenge\" class=\"L_warKorSpalte2\">";
                            echo "<input >";
                        echo "</td>";


                        echo "<td class=\"L_warKorArtSum\" class=\"L_warKorSpalte3\">";
                            echo "<input >";
                        echo "</td>";

                    echo "</tr>";

                    echo "<tr class=\"L_warKorTr\">";

                        echo "<td class=\"L_warKorSpalte1\">";
                            echo "<button class=\"L_warKorArtLöButt\">";
                                echo "<img src=\"assets/PH.jpg\">Artikel l&ouml;schen";
                            echo "</button>";
                        echo "</td>";

                        echo "<td class=\"L_warKorArtStckPreis\" class=\"L_warKorSpalte2\">";
                            echo "je 12,34 €";
                        echo "</td>";


                        echo "<td class=\"L_warKorSpalte3\">";
                            echo "";
                        echo "</td>";

                    echo "</tr>";
                
                echo "</table>";
 
            echo "</div>";
        echo "</div>";
    echo "</div>";   


    echo "<div id=\"L_warKorRUCon\">";

        echo "<table id=\"L_warKorSumTable\">";

            echo "<tr id=\"L_warKorSumTr1\">";
                echo "<td class=\"L_warKorSumTd1\">Versandkosten</td>";
                echo "<td id=\"L_warKorSumVersand\" class=\"L_warKorSumTd2\">";
                    echo "3,45 €";
                echo "</td>";
            echo "</tr>";

            echo "<tr id=\"L_warKorSumTr2\">";
                echo "<td class=\"L_warKorSumTd1\">Gesamtsumme</td>";
                echo "<td id=\"L_warKorSumTotal\" class=\"L_warKorSumTd2\">";
                    echo "66,66 €";
                echo "</td>";
            echo "</tr>";

            echo "<tr id=\"L_warKorSumTr2\">";
                echo "<td class=\"L_warKorSumTd1\">inkl.MwSt.</td>";
                echo "<td class=\"L_warKorSumTd2\"></td>";
            echo "</tr>";

        echo "</table>";


        echo "<div id=\"L_warKorSumButtCon\">";
            echo "<button id=\"L_warKorWeiterShopButton\">Weiter einkaufen</button>";
            echo "<button id=\"L_warKorZurKasseButton\">Zur Kasse</button>";
        echo "</div>";

    echo "</div>";

echo "</div>";
?>