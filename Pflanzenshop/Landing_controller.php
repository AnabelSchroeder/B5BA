<?php
    //Datenbank einbinden
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbase = "ba_webshop";
    
    $verbinde = mysqli_connect($host,$user,$pass);
    $con = mysqli_select_db($verbinde,$dbase);



/***************************************************************************************** */
/*landing_page*/
/********************************************************************************************* */


//informationen zu den Artikeln aus Datenbank ziehen///////////////////////////////////////////////////////////////
$sql = "SELECT art_id, art_name, art_preis, art_bild FROM artikel ORDER BY art_id DESC LIMIT 0,4;";
$result = mysqli_query($verbinde, $sql);

if (mysqli_num_rows ($result) > 0)
{
    while ($zeile = mysqli_fetch_assoc($result))
    {
       
//für jeden der 4 artikel einen div container mit bild, titel und preis ausgeben
        echo "<div class=\"landing_neuheiten_artikel\">";
            $art_id = $zeile['art_id'];
            echo "<button name=\"Seiten_ID\"   type=\"submit\" value=\"shop\">
            <img class=\"landing_artikel_bild\" src=\"img/".$zeile['art_bild']."\">";
            echo "<span class=\"landing_unterschrift\">".$zeile['art_name']."</span><br>";
             echo "<span>".$zeile['art_preis']." € </span>";
        echo "</button></div>";
    }
}

/******************************************************************************************************* */
/*Ausloggen*/   
if (isset($_POST['ausloggen']))
// if(isset($_POST['angemeldetenUserLogout']))
{
    //csrf prüfen////////////////////////////////////////////////////////////////////
   /* if ($_POST['csrf'] !== $_SESSION['csrf_token'])
    {
        die ("ungültiger Token");
    }
    //csrf gültig
    else {*/

    $sql="UPDATE cookie
        SET logged_in = \"false\", expire=0, Versuche=\"3\"
        WHERE cookie_wert =\"".$_COOKIE['sid']."\";";
    $result = mysqli_query($verbinde, $sql);

    //session variable auf false setzen
    $_SESSION['eingeloggt']=false;
   // }
}


///////////////////////////////////////////////////////////////////////////////////////////////////
//nutzer löschen und ausloggen
if (isset($_POST['angemeldetenUserLoeschen']))
// if(isset($_POST['angemeldetenUserLogout']))
{
    //csrf prüfen////////////////////////////////////////////////////////////////////
    if ($_POST['csrf'] !== $_SESSION['csrf_token'])
    {
        die ("ungültiger Token");
    }
    //csrf gültig
    else {

    $sql="UPDATE cookie
        SET logged_in = \"false\", expire=0, Versuche=\"3\"
        WHERE cookie_wert =\"".$_COOKIE['sid']."\";";
    $result = mysqli_query($verbinde, $sql);

    $sql ="DELETE FROM nutzer
        WHERE n_id =\"".$nutzer."\";";
    $result = mysqli_query($verbinde, $sql);  
    }
}

















//////////////////////////////////////////////////////////////
//bestellung speichern
if (isset ($POST['bestellung']))
{  
    ////////////////////////////////////////////////////////////////////////////////////////////////////
// aktuelles datum
$best_date= date("Y-m-d H:i:s");  
/******************************************************************************************** */
// KASSE 3: Bestellung speichern
/********************************************************************************************* */



// bestellung in datenbank : tabelle bestellung
$sql="INSERT INTO bestellung
(best_datum,
n_id,
best_n_vname,
best_n_name,
lieferstrasse,
lieferplz,
lieferort,
best_bezahlart)

VALUES
(
\"".$best_date."\",
\"". $kasse_n_id."\",
\"".$_SESSION['kasse_vname']."\",
\"".$_SESSION['kasse_nname']."\",
\"".$_SESSION['kasse_strasse']."\",
\"".$_SESSION['kasse_plz']."\",
\"".$_SESSION['kasse_ort']."\",
\"".$_SESSION['kasse_zahlart']."\"
)";
$result = mysqli_query($verbinde, $sql);
}
?>