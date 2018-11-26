<?php
if ($seitenid== "index") {

//landing page

  
    
    echo "header";
    echo "<br>";

//bilder mosaik
echo "<div class=\"landing_container\">";
// form zum übergeben der seiten id    
    echo "<form action=\"index.php?Seiten_ID=login\" method=\"GET\">";
    echo "<div class=\"landing_mosaik_1\">";
    
        echo "<span class=\"landing_mosaik_weiß\"> Bonsai </span> <br>";

        echo "<button name=\"Seiten_ID\" class=\"button1\" type=\"submit\" value=\"login\"> Jetzt kaufen </button>";
    echo "</div>";
    
    
    
      echo "<div class=\"landing_mosaik_2\">";
    
            echo "<span class=\"landing_mosaik_weiß\"> Blume </span> <br>";

            echo "<button name=\"Seiten_ID\" class=\"button1\"> Jetzt kaufen </button>";
      echo "</div>";
    
    
     echo "<div class=\"landing_mosaik_3\">";
  
        echo "<span class=\"landing_mosaik_weiß\"> Kaktus </span> <br>";

        echo "<button name=\"Seiten_ID\" class=\"button1\"> Jetzt kaufen </button>";
     echo "</div>";
    
    
    
    
     echo "<div class=\"landing_mosaik_4\">";

        echo "<span class=\"landing_mosaik_weiß\"> Gr&uuml;npflanze </span> <br>";

        echo "<button name=\"Seiten_ID\" class=\"button1\"> Jetzt kaufen </button>";
     echo "</div>";
    
    
 
    
    echo "<div class=\"landing_mosaik_5\">";
    
        echo "<span class=\"landing_mosaik_weiß\"> Schenken </span> <br>";

        echo "<button name=\"Seiten_ID\" class=\"button1\"> Jetzt kaufen </button>";
    echo "</div>";
 
echo "</form>";
echo "</div> <br><br>";

// slogan

echo "<div class=\"landing_slogan_container\"> <span class=\"landing_slogan_schrift\"> SLOGAN </span> </div>";

//neuheiten anzeigen
echo "<div class=\"landing_neuheiten_container\">";
echo "Unsere Neuheiten <br> <br>";
    
echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\"> Schwertfarn </span><br>";
    echo "<span> 29,99€ </span>";
echo "</div>";
 
echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\"> Schwertfarn </span><br>";
    echo "<span> 29,99€ </span>";
echo "</div>";
    
echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\"> Schwertfarn </span><br>";
    echo "<span> 29,99€ </span>";
echo "</div>";
    
echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\"> Schwertfarn </span><br>";
    echo "<span> 29,99€ </span>";
echo "</div>";
    
echo "</div>";
}

?>