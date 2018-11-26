<?php
    //Datenbank einbinden
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbase = "ba_webshop";
    
    $verbinde = mysqli_connect($host,$user,$pass);
    $con = mysqli_select_db($verbinde,$dbase);




//landing_page
//artikel neuheiten anzeigen

$sql = "SELECT art_id, art_name, art_preis, art_bild FROM artikel WHERE art_id =1;";
$sql= mysqli_query($verbinde, $sql);

if (mysqli_num_rows ($sql) > 0)
{
    while ($zeile = mysqli_fetch_assoc($sql))
    {
        echo $zeile['art_name'];
        echo "<br>";
        echo $zeile['art_preis'];
    }
}

else{
    echo "nope";
}


/*
$neueste_artikel = "SELECT art_id, art_name, art_preis FROM artikel LIMIT".$anzahl." -4, 4; ";
for ($i=0; $i<=4; $i++)
{
    echo "<div class=\"landing_neuheiten_artikel\">";
    echo "<img class=\"landing_artikel_bild\" src=\"img/schwertfarn.jpg\">";
    echo "<span class=\"landing_unterschrift\">".$neueste_artikel['art_name']." </span><br>";
    echo "<span>".$_neueste_artikel['art_preis']."€ </span>";
echo "</div>";
}




/*
$landing_artikel_1_titel

$landing_artikel_1_preis





$landing_artikel_1_titel

$landing_artikel_1_preis





$landing_artikel_1_titel

$landing_artikel_1_preis




$landing_artikel_1_titel

$landing_artikel_1_preis


if (isset ($_POST['User_Registration_Speichern']))
{
    
}
*/
?>