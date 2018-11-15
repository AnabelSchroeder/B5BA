<?php

include ("admindbanbindung.php");

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
                        //erster block Name, Adresse
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Vorname";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"Anne";
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Nachname";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"schmidt";
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Straße";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"Musterstraße 12";
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"PLZ, Ort";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"12345 Musterhausen";
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";


                       //zweiter Block Bestellungen 
                       echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Bestellungen";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"3 Bestellungen + Bestelungsansehenbutton";
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";

                        //dritter Block Nutzerart, email, Nutzername
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Nutzerart";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"was auch immer gewählt wurde";
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Login Name";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"Supershoper84";
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Email";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"Rote.Rose@gmx.de";
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";

                        //Vierter Block Sperre
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Sperre";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"Hier wird angezeigt ob man gesperrt ist.";
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";

                        //Button Block
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";

                                echo "<div class=\"button-box\">";
                                echo "<form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-bearbeiten\">";
                                echo "<input type=\"submit\" id=\"a-userbearbeiten\" class=\"a-button\" value=\"Bearbeiten\">";
                                echo "</form>";

                                echo "<form method=\"POST\" action=\"http://localhost/b5ba/index.php\">";
                                echo "<input type=\"submit\" id=\"a-userloeschen\" class=\"a-button\" value=\"Löschen\">";
                                echo "</form>";

                                echo "<form method=\"POST\" action=\"http://localhost/b5ba/index.php\">";
                                echo "<input type=\"submit\" id=\"a-userlogaut\" class=\"a-button\" value=\"Logout\">";
                                echo "</form>";
                                echo"</div>";

                                echo"</div>";
                            echo"</div>";

                        echo"</div>";
                    }
                    break;


                //Seite User Kundenliste   
                /****************************************************************** */ 
                case "admin-user-kundenliste":
                    if($admin == true){
                        $adminBoxRechtsOben = "Kunden Liste";
                        function boxRechtsUntenBefuellen(){
                            global $conn, $sqlkundenliste ;
                            foreach ($conn->query($sqlkundenliste) as $row) {
                            echo"<div  class=\"admin-box-linie\">"; 
                            echo"<div  class=\"admin-box-liste\">"; 

                            
                                echo"<div  class=\"admin-box-liste-kdnr\">"; 
                                echo "Kd-Nr. ".$row['n_id'];
                                echo"</div>";
                                echo"<div  class=\"admin-box-liste-name\">"; 
                                echo $row['n_vname']." ".$row['n_nname'];
                                echo"</div>";
                                echo"<div  class=\"admin-box-liste-gesperrt\">";
                                if ($row['n_sperre'] == 1){
                                   echo "gesperrt"; 
                                } 
                                echo"</div>";
                                echo"<div  class=\"admin-box-liste-ansehen\">"; 
                                echo "<form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-anzeigen&adminnutzerwahl=".$row['n_id']."\">";
                                    echo "<input type=\"submit\"  class=\"a-button\" value=\"ansehen\">";
                                    echo "</form>";
                                echo"</div>";
                            

                            echo"</div>";
                        echo"</div>";
                        }
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
                            echo "Liste der Admins.";
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
                        
                        echo "<form action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-anzeigen\" method=\"POST\"  >";
                        //erster block Name, Adresse
                        echo"<div  class=\"admin-box-linie\">";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"Vorname";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            echo"<input type=\"text\" name=\"a-vorname\">";
                            echo"</div>";
                        echo"</div>";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"Nachname";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            echo"<input type=\"text\" name=\"a-nachname\">";
                            echo"</div>";
                        echo"</div>";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"Straße";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            echo"<input type=\"text\" name=\"a-strasse\">";
                            echo"</div>";
                        echo"</div>";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"PLZ";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            echo"<input type=\"text\" name=\"a-plz\">";
                            echo"</div>";
                        echo"</div>";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"Ort";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            echo"<input type=\"text\" name=\"a-ort\">";
                            echo"</div>";
                        echo"</div>";

                        echo"</div>";

                        //zweiter block Rechte, Lagin name, Passwort, Email
                        echo"<div  class=\"admin-box-linie\">";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"Rechte";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            
                            echo"<input type=\"radio\" name=\"a-rechte\" value=0 checked> Kunde";
                                echo"<input type=\"radio\" name=\"a-rechte\" value=1> Admin"; 
                                echo"</div>";
                            echo"</div>";
                        echo"</div>";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"Login Name";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            echo"<input type=\"text\" name=\"a-loginname\">";
                            echo"</div>";
                        echo"</div>";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"Passwort";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            echo"<input type=\"text\" name=\"a-passwort\">";
                            echo"</div>";
                        echo"</div>";

                        echo"<div  class=\"admin-box-textfelder\">";
                            echo"<div  class=\"admin-box-texfeld-links\">";
                            echo"E-mail";
                            echo"</div>";
                            echo"<div  class=\"admin-box-texfeld-rechts\">";
                            echo"<input type=\"text\" name=\"a-email\">";
                            echo"</div>";
                        echo"</div>";

                        echo"</div>";

                        //Vierter Block Sperre
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Sperre";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"<input type=\"radio\" name=\"a-sperrung\" value=0 checked> Nicht gesperrt";
                                echo"<input type=\"radio\" name=\"a-sperrung\" value=1> gesperrt"; 
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";

                        //Button Block
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";

                                echo "<div class=\"button-box\">";

                                /*echo"<a href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" id=\"abbrechenUserNeuAnlegen\" class=\"button\">Abbrechen</a>";*/
                              
                                echo"<input type=\"submit\" name=\"userNeuAnlegen\" id=\"a-userNeuAnlegen\" value=\"Speichern\" class=\"a-button\" >";
                                echo "</form>";

                                echo "<form action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" method=\"POST\">";
                                echo "<input type=\"submit\"  id=\"a-userNeuAnlegenabbrechen\" value=\"Abbrechen\" class=\"a-button\">";
                                echo "</form>";
                                echo"</div>";
                                echo"</div>";
                            echo"</div>";
                        echo"</div>";


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
                        $adminBoxRechtsOben = "User Name Variable";
                        function boxRechtsUntenBefuellen(){
                            global $conn, $adminnutzerwahl;
                            foreach ($conn->query($adminnutzerwahl) as $row) {
                            echo $row['n_vname'];

                            echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Vorname";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo $row['n_vname'];
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Nachname";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo $row['n_nname'];
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Straße";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo $row['n_strasse'];
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"PLZ, Ort";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo $row['n_plz']." ".$row['n_ort'];
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";


                       //zweiter Block Bestellungen (hinzufügen der funktionalität)
                       echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Bestellungen";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo"3 Bestellungen + Bestelungsansehenbutton";
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";

                        //dritter Block Nutzerart, email, Nutzername
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Nutzerart";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                if ($row['n_admin'] == 0){
                                    echo "Kunde";
                                }
                                else{
                                    echo"Admin";
                                }
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Login Name";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo $row['n_login'];
                                echo"</div>";
                            echo"</div>";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Email";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                echo $row['n_mail'];
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";

                        //Vierter Block Sperre
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"Sperre";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";
                                if ($row['n_sperre'] == 0){
                                    echo "nicht gesperrt";
                                }
                                else {
                                    echo "gesperrt";
                                }
                                echo"</div>";
                            echo"</div>";

                        echo"</div>";

                        //Button Block(Muss angepasst werden)
                        echo"<div  class=\"admin-box-linie\">";

                            echo"<div  class=\"admin-box-textfelder\">";
                                echo"<div  class=\"admin-box-texfeld-links\">";
                                echo"";
                                echo"</div>";
                                echo"<div  class=\"admin-box-texfeld-rechts\">";

                                echo "<div class=\"button-box\">";
                                echo "<form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-bearbeiten\">";
                                echo "<input type=\"submit\" id=\"a-userbearbeiten\" class=\"a-button\" value=\"Bearbeiten\">";
                                echo "</form>";

                                echo "<form method=\"POST\" action=\"http://localhost/b5ba/index.php\">";
                                echo "<input type=\"submit\" id=\"a-userloeschen\" class=\"a-button\" value=\"Löschen\">";
                                echo "</form>";

                                echo "<form method=\"POST\" action=\"http://localhost/b5ba/index.php\">";
                                echo "<input type=\"submit\" id=\"a-userlogaut\" class=\"a-button\" value=\"Logout\">";
                                echo "</form>";
                                echo"</div>";

                                echo"</div>";
                            echo"</div>";

                        echo"</div>";





                            }
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