<?php

include ("admindbanbindung.php");
include ("view_admin.php");

$adminBoxRechtsOben;
$adminBoxRechtsUnten;

//Programmierungshilfe muss rausgelöscht werden im verlauf
$admin = true;

/************************************************************************************ */
//Stellt die Navbox in den Adminbereich-unterseiten dar
/************************************************************************************* */
        function AdminNavbox(){
        //Programmierungshilfe muss rausgelöscht werden im verlauf
        global $admin;    

        //Seitennavigations-Box
        echo"<div class=\"admin-nav\">";
            //Mein Konto bereich
            echo"<a href=\"http://localhost/b5ba/index.php?Seiten_ID=Adminbereich\" class=\"admin-nav-ueberschrift\">Mein Konto</a><br><br>";

            if ($admin == true){
                //User bereich
                echo"<a href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" class=\"admin-nav-ueberschrift\">User</a><br>"; 
                echo"<a href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" class=\"admin-nav-listenpunkt\">Kunde</a><br>";
                echo"<a href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-adminliste\" class=\"admin-nav-listenpunkt\">Admin</a><br>";
                echo"<a href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-neuanlegen\" class=\"admin-nav-listenpunkt\">Neu anlegen</a><br><br>";
                
                //Artikelbereich
                echo"<a href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-liste\" class=\"admin-nav-ueberschrift\">Artikel</a><br>";
                echo"<a href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-neuanlegen\" class=\"admin-nav-listenpunkt\">Neu anlegen</a><br>";
            }

        echo"</div>";
        }

/*********************************************************************************************/
//Darstellung der Rechten Box im Adminbereich, hier wird automatisch Befüllt aus der boxrechtsBefüllen funktion. 
/********************************************************************************************/

        if ($seitenid == "Adminbereich"||$seitenid == "admin-user-kundenliste"||$seitenid == "admin-user-adminliste"||$seitenid == "admin-user-neuanlegen"||$seitenid == "admin-user-bearbeiten"||$seitenid == "admin-user-anzeigen"||$seitenid == "admin-artikel-liste"||$seitenid == "admin-artikel-neuanlegen"||$seitenid == "admin-artikel-bearbeiten"||$seitenid == "admin-artikel-anzeigen"||$seitenid == "admin-bestellungsliste"||$seitenid == "admin-bestellung"){
        global $adminBoxRechtsOben, $adminBoxRechtsUnten; 
        //aufruf der Funktion damit der Code ausgeführt werden kann   
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


/******************************************************************************************* */        
//Befüllen der Rechten Box im Admin bereich diese werden dann in die Seitenstrucktur gelegt.
/********************************************************************************************** */

        function boxRechtsBefuellen(){
            global $adminBoxRechtsOben, $adminBoxRechtsUnten, $seitenid, $admin;     
            switch ($seitenid){
                //Seite Mein Konto
                /*************************************************************** */
                case "Adminbereich":
                    $adminBoxRechtsOben = "Mein Konto";
                    function boxRechtsUntenBefuellen(){
                        a_view::af_Adminbereich();
                        
                    }
                    break;


                //Seite User Kundenliste   
                /****************************************************************** */ 
                case "admin-user-kundenliste":
                    if($admin == true){
                        $adminBoxRechtsOben = "Kunden Liste";
                        function boxRechtsUntenBefuellen(){
                        a_view::af_admin_user_kundenliste();
                        }
                    }
                    else {
                        umleitungAufStartseite();
                    }
                    break;


                //Seite User-Adminliste
                /****************************************************************** */ 
                case "admin-user-adminliste":
                    if($admin == true){
                        $adminBoxRechtsOben = "Admin Liste";
                        function boxRechtsUntenBefuellen(){
                            a_view::af_admin_user_adminliste();
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;  

                
                //Seite User-Neuanlegen
                /****************************************************************** */ 
                case "admin-user-neuanlegen":
                    if($admin == true){
                        $adminBoxRechtsOben = "User neu anlegen";
                        function boxRechtsUntenBefuellen(){
                            a_view::af_admin_user_neuanlegen();
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;

                //Seite User-Anzeigen
                /****************************************************************** */ 
                case "admin-user-anzeigen":
                    if($admin == true){
                        $adminBoxRechtsOben = "User";
                        function boxRechtsUntenBefuellen(){
                            a_view::af_admin_user_anzeigen();
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;


                //Seite User-Bearbeiten
                /****************************************************************** */ 
                case "admin-user-bearbeiten":
                    if($admin == true){
                        $adminBoxRechtsOben = "User bearbeiten";
                        function boxRechtsUntenBefuellen(){
                            echo "bearbeiten";
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;


                //Seite Artikel-Liste
                /****************************************************************** */ 
                case "admin-artikel-liste":
                    if($admin == true){
                        $adminBoxRechtsOben = "Artikel Liste";
                        function boxRechtsUntenBefuellen(){
                            echo "artikel liste";
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;


                //Seite Artikel-neuanlegen
                /****************************************************************** */ 
                case "admin-artikel-neuanlegen":
                    if($admin == true){
                        $adminBoxRechtsOben = "Artikel neu anlegen";
                        function boxRechtsUntenBefuellen(){
                            echo "artikel neu";
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;


                //Seite Artikel-Bearbeiten
                /****************************************************************** */ 
                case "admin-artikel-bearbeiten":
                    if($admin == true){
                        $adminBoxRechtsOben = "Artikel X(Variable) bearbeiten";
                        function boxRechtsUntenBefuellen(){
                            echo "artikel bearbeiten felder";
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;


                //Seite Artikel-Anzeigen
                /****************************************************************** */ 
                case "admin-artikel-anzeigen":
                    if($admin == true){
                        $adminBoxRechtsOben = "Artikel X(Variable) anzeigen";
                        function boxRechtsUntenBefuellen(){
                            echo "artikel felder";
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;


                //Seite Bestellungs-liste-user
                /****************************************************************** */ 
                case "admin-bestellungsliste":
                    if($admin == true){
                        $adminBoxRechtsOben = "bestellungen von user x";
                        function boxRechtsUntenBefuellen(){
                            echo "bestellungsliste";
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;

                //Seite Bestellung-user
                /****************************************************************** */ 
                case "admin-bestellung":
                    if($admin == true){
                        $adminBoxRechtsOben = "bestellungen x von user x";
                        function boxRechtsUntenBefuellen(){
                            echo "bestellungs details";
                        }
                    }
                else {
                    umleitungAufStartseite();
                }
                break;


            }
        }

/************************************************************************************** */
//Sonstige Functionen
/*************************************************************************************** */

        //Umleiten auf die Startseite
        function umleitungAufStartseite (){
            echo "<meta http-equiv=\"refresh\" content=\"0; URL=http://localhost/b5ba/index.php\">";
        }

?>

<script src="adminbereich/admin.js"></script>