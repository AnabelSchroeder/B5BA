<?php
//Programmierungshilfe muss rausgelöscht werden im verlauf
$admin = true;


echo"<div id=\"admin-main\">";
    echo"<div id=\"admin-box\">";

        //Seitennavigations-Box
        echo"<div id=\"admin-nav\">";
            //Mein Konto bereich
            echo"<a class=\"admin-nav-ueberschrift\">Mein Konto</a><br>";

            if ($admin == true){
                //User bereich
                echo"<a class=\"admin-nav-ueberschrift\">User</a><br>"; 
                echo"<a class=\"admin-nav-listenpunkt\">Kunde</a><br>";
                echo"<a class=\"admin-nav-listenpunkt\">Admin</a><br>";
                echo"<a class=\"admin-nav-listenpunkt\">Neu anlegen</a><br>";
                
                //Artikelbereich
                echo"<a class=\"admin-nav-ueberschrift\">Artikel</a><br>";
                echo"<a class=\"admin-nav-listenpunkt\">Neu anlegen</a><br>";
            }

        echo"</div>";

        //Contentbereichs-Seiten
        echo"<div  id=\"admin-contentseiten\">";
        include "adminseiten.php";
        echo"</div>";

    echo"</div>";
echo"</div>";    
?>