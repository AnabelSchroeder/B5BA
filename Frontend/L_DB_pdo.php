<?php

///////////////////////////////////////
// DBanbindung des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////

$servername = "localhost";
$username = "root";
$passwort = "root";
$dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung


try{
$connpdo = new PDO("mysql:host= $servername;dbname= $dbname;charset=UTF8",$username, $passwort);

$connpdo->setAttribute(PDO::ATTRERRMODE, PDO::ERRMODE_EXCEPTION);
$L_suche = "SELECT * FROM artikel";
$stmt = $connpdo->prepare($L_suche);
$stmt->execute();


foreach ($connpdo->query($L_suche) as $L_erg) {
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
}
catch(PDOException $e){
    echo $L_suche . "<br>" . $e->getMessage();
}

?>