<?php
session_start();
$_SESSION['seiten_zurück']= $seitenid;



if ($seitenid== "index") {
//Datenbank einbinden
$host = "localhost";
$user = "root";
$pass = "";
$dbase = "ba_webshop";

$verbinde = mysqli_connect($host,$user,$pass);
$con = mysqli_select_db($verbinde,$dbase);

/////////////////////////////////////////////////////////////////////////////////



if (isset($_COOKIE['sid'])) {
    echo "cookie vorhanden ";
   // in der Datenbank nachschauen, ob Cookie vorhanden
   $sql ="SELECT cookie_id FROM cookie WHERE cookie_wert =\"".$_COOKIE['sid']."\";";
   $result = mysqli_query($verbinde, $sql);
   $zeile = mysqli_fetch_assoc($result);
   echo "Cookie: ".$zeile['cookie_id'];
 
// evtl. Cookie verlängern 
    $sid =$_COOKIE['sid'];
    setcookie("sid", $sid, time()+3600*48);

}
    


else {
    // cookie id zufällig generieren
    $sid = md5(openssl_random_pseudo_bytes(32));
    // cookie setzen
setcookie("sid", $sid, time()+3600*48);

    // In DB speichern
    $sql = "INSERT INTO cookie
    ( 
        cookie_wert
    )
    VALUES
    (
        \"".$sid."\"
    );";
    $sql = mysqli_query($verbinde, $sql);
    echo "neues cookie gesetzt";

}


//landing page

//vorläufiger arbeitsbutton zur loginseite///////////////////////////////////////////////

echo "<form action=\"index.php?Seiten_ID=login\" method=\"GET\">";
echo "<button name=\"Seiten_ID\" type=\"submit\" value=\"login\"> Login </button>";
//übergabe der seitenid für das zurückkehren nach zb login --> Post??
//echo "<input type=\"hidden\" name=\"seiten_zrück\" value=\"".$seitenid."\">";
echo "</form>";




//vorläufiger auslog button
echo "<form action=\"#\" method=\"POST\">";
echo "<button name=\"ausloggen\"> logout </button>";
echo "</form>";
//////////////////////////////////////////////////////////////////////

//vorläufiger arbeitsbutton zur kassenseite///////////////////////////////////////////////
echo "<form action=\"index.php?Seiten_ID=kasse_1\" method=\"GET\">";
echo "<button name=\"Seiten_ID\"  type=\"submit\" value=\"kasse_1\"> kasse </button>";
echo "</form>";
//////////////////////////////////////////////////////////////////////

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

include "Landing_controller.php";
/*
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
 */   
echo "</div>";
}

?>