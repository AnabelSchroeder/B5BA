<?php
    //Datenbank einbinden
    $host = "localhost";
    $user = "root";
    $pass = "root"; //----------!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-ÄNDERN?-//
    $dbase = "BA_webshop"; //----------!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-ÄNDERN?-//
    
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
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!
            echo "<form action=\"index.php\" method=\"get\">"; //---!!!!!!!!!!!!!!!!!!---GEÄNDERT---
            echo "<input name=\"L_shopArtButton\" type=\"hidden\" value=\"" . $art_id . "\">"; //---!!!!!!!!!!!!!!!!!!---GEÄNDERT---

            echo "<button name=\"Seiten_ID\"   type=\"submit\" value=\"artikelansicht\">"; //---!!!!!!!!!!!!!!!!!!---GEÄNDERT---

            echo "<img class=\"landing_artikel_bild\" src=\"img/".$zeile['art_bild']."\">";
            echo "<span class=\"landing_unterschrift\">".$zeile['art_name']."</span><br>";
             echo "<span>".$zeile['art_preis']." € </span>";
        echo "</button>";
        
        echo "</form>";//---!!!!!!!!!!!!!!!!!!---GEÄNDERT---
        
        echo "</div>";
    }
}

/******************************************************************************************************* */
/*Ausloggen*/   
if (isset($_POST['ausloggen']))
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

    //session variable auf false setzen
    $_SESSION['eingeloggt']=false;
    }
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


?>