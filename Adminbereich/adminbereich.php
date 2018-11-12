<?php
        //Stellt die Navbox in den Adminbereich-unterseiten dar
        function AdminNavbox(){
        //Programmierungshilfe muss rausgelöscht werden im verlauf
        $admin = true;    

        //Seitennavigations-Box
        echo"<div id=\"admin-nav\">";
            //Mein Konto bereich
            echo"<a class=\"admin-nav-ueberschrift\">Mein Konto</a><br><br>";

            if ($admin == true){
                //User bereich
                echo"<a class=\"admin-nav-ueberschrift\">User</a><br>"; 
                echo"<a class=\"admin-nav-listenpunkt\">Kunde</a><br>";
                echo"<a class=\"admin-nav-listenpunkt\">Admin</a><br>";
                echo"<a class=\"admin-nav-listenpunkt\">Neu anlegen</a><br><br>";
                
                //Artikelbereich
                echo"<a class=\"admin-nav-ueberschrift\">Artikel</a><br>";
                echo"<a class=\"admin-nav-listenpunkt\">Neu anlegen</a><br>";
            }

        echo"</div>";
        }




        //Contentbereichs-Seiten

        //Startseite Des Adminbereichs
        if ($seitenid == "Adminbereich"){
        echo"<div id=\"admin-main\">";
            echo"<div id=\"admin-box\">";    
                AdminNavbox();
                echo"<div  id=\"admin-contentseiten\">";
        

                echo"</div>";
            echo"</div>";
        echo"</div>";  
        }



  
?>