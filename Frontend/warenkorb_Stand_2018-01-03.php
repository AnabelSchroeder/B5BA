<?php
///////////////////////////////////////
// warenkorb des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////


if ($seitenid == "warenkorb") {

    while ($L_gespDaten = mysqli_fetch_assoc($L_abfrGespDaten)){
        echo $L_gespDaten['korb_id']." ".$L_gespDaten['cookie_id']." ".$L_gespDaten['art_id']." ".$L_gespDaten['anzahl_art'];
    }

//_Content________________________________________________________
echo "<div id=\"L_artikelAnsicht\" class=\"L_contentbereich\">";


    echo "<h1 id=\"L_warKorH1\" class=\"L_h1\">Warenkorb</h1>";

        //--------------------------------------------------
    echo "<div id=\"L_warKorCon\">";

            //--------------------------------------------------
            if (warenkorbAnzahl()>0)
            {
                $servername = "localhost";
                $username = "root";
                $passwort = "root";
                $dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung
                
                //$port = 8889;
                
                //$link = mysqli_init();
                //$success = mysqli_real_connect($link, $servername, $username, $passwort, $dbname, $port);
                
                $verbinde = mysqli_connect($servername, $username, $passwort);
                $connmysql = mysqli_select_db($verbinde, $dbname);

                $L_cookie = $_COOKIE['sid']; //!!!!!!!!!

                $L_sqlCookieId = "SELECT cookie_id FROM cookie WHERE cookie_wert='$L_cookie';"; 
                $L_cookieId = mysqli_query($verbinde, $L_sqlCookieId);

                $L_sql = "SELECT * FROM warenkorb WHERE cookie_id='$L_cookieId';";
                $L_basket = mysqli_query($verbinde, $L_sql);

                $L_sqlartBasketJoin = "SELECT warenkorb.korb_id, warenkorb.anzahl_art, 
                                        artikel.art_id, artikel.art_name, artikel.art_preis, 
                                        artikel.sale_status, artikel.sale_preis, artikel.art_bestand 
                                        FROM warenkorb INNER JOIN artikel 
                                        ON warenkorb.art_id=artikel.art_id;";
                $L_artBasketJoin = mysqli_query($verbinde, $L_sqlartBasketJoin);

                



                while ($L_erg = mysqli_fetch_assoc($L_artBasketJoin))
                {
                    if ($L_erg['sale_status']==false){
                        $L_preis = $L_erg['art_preis'];
                    }else{
                        $L_preis = $L_erg['sale_preis'];
                    }
                    
                    echo "<div class=\"L_warKorArt\">";
                        echo "<div class=\"L_warKorArtImgDiv\">";
                            echo "<img class=\"L_warKorArtImg\" src=\"assets/img/\"".$L_erg['art_bild']."\">";
                        echo "</div>";
                        echo "<div class=\"L_warKorArtInfosCon\">";
                            echo "<table class=\"L_warKorTable\">";
                                echo "<tr class=\"L_warKorTr\">";
                                    echo "<td class=\"L_warKorArtName\" class=\"L_warKorSpalte1\">";
                                        echo $L_erg['art_name'];
                                    echo "</td>";
                                    echo "<td class=\"L_warKorSpalte2\">"; /*class=\"L_warKorArtMenge\" */
                                    if ($L_erg['art_bestand']>0){
                                        echo "<form action=\"index.php\" method=\"post\">";
                                        echo "<select name=\"Menge\">";
                                        for ($i=1; $i<=$L_erg['art_bestand']; $i++){
                                            if ($i = $L_erg['anzahl_art']){
                                            echo "<option value=\"".$i."\" selected>".$i."</option>";
                                            }else{
                                            echo "<option value=\"".$i."\">".$i."</option>";
                                            }
                                        }
                                        echo "</select>";
                                        echo "<button id=\"L_artInBasket\" name=\"".$L_erg['art_id']."\" type=\"submit\">In den Warenkorb</button>";
                                        echo "</form>";
                                    } else {
                                        echo "NOPE";
                                    }                                          
                                    echo "</td>";
                                    echo "<td class=\"L_warKorArtSum\" class=\"L_warKorSpalte3\">";
                                        echo warenlorbArtSumme($L_erg['anzahl_art'], $L_preis)." €";
                                        if ($warenkorbSummeTotalCalc == null){
                                            $warenkorbSummeTotalCalc = warenlorbArtSumme($L_erg['anzahl_art'], $L_preis);
                                        }else{
                                            $warenkorbSummeTotalCalc = $warenkorbSummeTotalCalc + warenlorbArtSumme($L_erg['anzahl_art'], $L_preis);
                                        }
                                        
                                    echo "</td>";
                                echo "</tr>";
                                echo "<tr class=\"L_warKorTr\">";
                                    echo "<td class=\"L_warKorSpalte1\">";
                                        echo "<form action=\"index.php\" method=\"post\">";
                                            echo "<button class=\"L_warKorArtLöButt\" name=\"basketArtDel\" value=\"".$L_erg['korb_id']."\">";
                                                echo "<img src=\"assets/PH.jpg\">Artikel l&ouml;schen";
                                            echo "</button>";
                                        echo "</form>";
                                    echo "</td>";
                                    echo "<td class=\"L_warKorArtStckPreis\" class=\"L_warKorSpalte2\">";
                                        echo "je ".$L_preis." €";
                                    echo "</td>";
                                    echo "<td class=\"L_warKorSpalte3\">";
                                        echo "";
                                    echo "</td>";
                                echo "</tr>";                            
                            echo "</table>";
                        echo "</div>";
                    echo "</div>";
                }
            //}
            //--------------------------------------------------


                    //--------------------------------------------------
                echo "</div>";   


                echo "<div id=\"L_warKorRUCon\">";

                    echo "<table id=\"L_warKorSumTable\">";

                        echo "<tr id=\"L_warKorSumTr1\">";
                            echo "<td class=\"L_warKorSumTd1\">Versandkosten</td>";
                            echo "<td id=\"L_warKorSumVersand\" class=\"L_warKorSumTd2\">";
                                $L_versandkosten = 3.45;
                                echo $L_versandkosten." €";
                            echo "</td>";
                        echo "</tr>";

                        echo "<tr id=\"L_warKorSumTr2\">";
                            echo "<td class=\"L_warKorSumTd1\">Gesamtsumme</td>";
                            echo "<td id=\"L_warKorSumTotal\" class=\"L_warKorSumTd2\">";
                                $warenkorbSummeTotal = $warenkorbSummeTotalCalc + $L_versandkosten;
                                echo $warenkorbSummeTotal." €";
                            echo "</td>";
                        echo "</tr>";

                        echo "<tr id=\"L_warKorSumTr3\">";
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


}
include "Frontend/L_DB_Warenkorbanzahl.php";
function warenlorbArtSumme($a, $b){
    $res = $a*$b;
    return $res;
}
function warenkorbSummeTotal(){
    $servername = "localhost";
    $username = "root";
    $passwort = "root";
    $dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung
    
    //$port = 8889;
    
    //$link = mysqli_init();
    //$success = mysqli_real_connect($link, $servername, $username, $passwort, $dbname, $port);
    
    $verbinde = mysqli_connect($servername, $username, $passwort);
    $connmysql = mysqli_select_db($verbinde, $dbname);


}
}
?>