<?php
$adminBoxRechtsOben;
$adminBoxRechtsUnten;

//Programmierungshilfe muss rausgelöscht werden im verlauf
$admin = true;

        //Stellt die Navbox in den Adminbereich-unterseiten dar
        function AdminNavbox(){
        //Programmierungshilfe muss rausgelöscht werden im verlauf
        global $admin;    

        //Seitennavigations-Box
        echo"<div class=\"admin-nav\">";
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
        
        //Startseite Des Adminbereichs Mein Konto
        if ($seitenid == "Adminbereich"||$seitenid == "user-kundenliste"){
        global $adminBoxRechtsOben, $adminBoxRechtsUnten;    
        boxRechtsBefuellen();    
        echo"<div class=\"admin-main\">";
            echo"<div class=\"admin-box\">";    
                AdminNavbox();

                echo"<div  class=\"admin-rechtebox\">";

                    echo"<div  class=\"admin-rechtebox-oben\">"; 
                    echo $adminBoxRechtsOben;
                    echo"</div>";

                    echo"<div  class=\"admin-rechtebox-unten\">"; 
                    boxRechtsUntenBefuellen();
                    echo"</div>";

                echo"</div>";

            echo"</div>";
        echo"</div>";  
        }

        //Befüllen der Rechten Box im Admin bereich diese werden dan in die Seitenstrucktur gelegt.
        function boxRechtsBefuellen(){
            global $adminBoxRechtsOben, $adminBoxRechtsUnten, $seitenid;     
            switch ($seitenid){
                case "Adminbereich":
                    $adminBoxRechtsOben = "oben aus funktion";
                    function boxRechtsUntenBefuellen(){
                        echo " aus der unterfunktion befüllt";
                    }
                    break;
            }
        }

    /*    if ($admin == true){
        //Seite User-Kundenliste
        if ($seitenid == "user-kundenliste"){
            echo"<div class=\"admin-main\">";
                echo"<div class=\"admin-box\">";    
                    AdminNavbox();
                    echo"<div  class=\"admin-rechtebox\">";
            
                    echo "Kundenliste";
                    echo"</div>";
                echo"</div>";
            echo"</div>";  
            }




            
        //Seite User-Adminliste

        //Seite User-Neuanlegen

        //Seite User-Bearbeiten

        //Seite Artikel-Liste

        //Seite Artikel-neuanlegen

        //Seite Artikel-Bearbeiten

    }
    else{
        //auf index.php verweisen, funktiniert warscheinlich so nicht in verbindung zu den anderen seiten und muss überarbeitet werden
        echo"du darfst hier nicht rein"; 
    }*/
?>