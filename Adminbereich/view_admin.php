<?php
    class a_view {

        /**************************************************************************************************************** */
        //admin-user-kundenliste
        /**************************************************************************************************************** */
        //Seiteninhalt der rechten Box von der Kundenliste
        public static function af_admin_user_kundenliste() {
            
                
                //View des Elementes ist in der Komponente
                a_pagination::paginationF();
              
                
        
            
        }

        /**************************************************************************************************************** */
        //admin-user-adminliste
        /**************************************************************************************************************** */
        //Seiteninhalt der rechten Box von der Kundenliste
        public static function af_admin_user_adminliste() {
            
            global $conn, $sqladminliste ;
            foreach ($conn->query($sqladminliste) as $row) {
            print"<div  class=\"admin-box-linie\"> 
            <div  class=\"admin-box-liste\"> 

            
                <div  class=\"admin-box-liste-kdnr\"> 
                N-Nr ".$row['n_id']."
                </div>
                <div  class=\"admin-box-liste-name\"> 
                ".$row['n_vname']." ".$row['n_nname']."
                </div>
                <div  class=\"admin-box-liste-gesperrt\">";

                if ($row['n_sperre'] == 1){
                   print "gesperrt";
                } 
               print" </div>
                <div  class=\"admin-box-liste-ansehen\">
                <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-anzeigen&adminnutzerwahl=".$row['n_id']."\">
                    <input type=\"submit\"  class=\"a-button\" value=\"ansehen\">
                    </form>
                </div>
            

            </div>
        </div>";
        }
    }

        /**************************************************************************************************************** */
        //Adminbereich
        /**************************************************************************************************************** */
        //Ansicht kunden oder nutzer konto im admin bereich
        public static function af_Adminbereich() {

            global $conn, $a_sqlEingeloggterUser, $anzeigeBestellungsanzahl;
                            foreach ($conn->query($a_sqlEingeloggterUser) as $row) {
            
            //erster block Name, Adresse
            /*************************************************************** */
                        print "<div  class=\"admin-box-linie\">

                        <div  class=\"admin-box-textfelder\">
                            <div  class=\"admin-box-texfeld-links\">
                            Vorname
                            </div>
                            <div  class=\"admin-box-texfeld-rechts\">
                            ".$row['n_vname']."
                            </div>
                        </div>

                        <div  class=\"admin-box-textfelder\">
                            <div  class=\"admin-box-texfeld-links\">
                            Nachname
                            </div>
                            <div  class=\"admin-box-texfeld-rechts\">
                            ".$row['n_nname']."
                            </div>
                        </div>

                        <div  class=\"admin-box-textfelder\">
                            <div  class=\"admin-box-texfeld-links\">
                            Straße
                            </div>
                            <div  class=\"admin-box-texfeld-rechts\">
                            ".$row['n_strasse']."
                            </div>
                        </div>

                        <div  class=\"admin-box-textfelder\">
                            <div  class=\"admin-box-texfeld-links\">
                            PLZ, Ort
                            </div>
                            <div  class=\"admin-box-texfeld-rechts\">
                            ".$row['n_plz']." ".$row['n_ort']."
                            </div>
                        </div>

                    </div>";


                       //zweiter Block Bestellungen 
                       /*************************************************************** */
                       print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Bestellungen
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">".
                                $anzeigeBestellungsanzahl['anzahl']." Bestellungen 
                                <a class=\"linkTexthervorgehobenFließtext\" href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-bestellungsliste\" class=\"admin-nav-ueberschrift\"> ansehen</a>
                                </div>
                            </div>

                        </div>";

                        //dritter Block Bezahlart, Nutzerart, email, Nutzername 
                        /*************************************************************** */
                        print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Zahlart
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_zahlart']."
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Nutzerart
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">";
                                if ($row['n_admin'] == 0){
                                    print "Kunde";
                                }
                                else{
                                    print "Admin";
                                }
                                print "</div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Login Name
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_login']."
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Email
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_mail']."
                                </div>
                            </div>

                        </div>";

                        //Vierter Block Sperre 
                        /*************************************************************** */
                        print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Sperre
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">";
                                if ($row['n_sperre'] == 0){
                                    print "nicht gesperrt";
                                }
                                else {
                                    print "gesperrt";
                                }
                                print "</div>
                            </div>

                        </div>";

                       //Button Block 
                       /*************************************************************** */
                       print " <div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">

                                <div class=\"button-box\">
                               <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=mein-konto-bearbeiten\">
                                <input type=\"submit\"  class=\"a-button\" value=\"Bearbeiten\">
                                </form>

                                <form action=\"http://localhost/b5ba/index.php?Seiten_ID=passwortBearbeiten\" method=\"POST\">
                                    <input type=\"submit\"   value=\"Passwort bearb.\" class=\"a-button\"> 

                              <form method=\"POST\" action=\"http://localhost/b5ba/index.php\">
                                <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">
                                <input type=\"submit\"  class=\"a-button\" value=\"Löschen\">
                                </form>

                                <form method=\"POST\" action=\"http://localhost/b5ba/index.php\">
                                <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">
                                <input type=\"submit\" id=\"a-userlogaut\" class=\"a-button\" value=\"Logout\">
                                </form>
                                </div>

                                </div>
                            </div>

                        </div>";
                    }
                }

         /**************************************************************************************************************** */
        //mein-Konto-bearbeiten
        /**************************************************************************************************************** */
        public static function af_mein_konto_bearbeiten() {
            global $conn, $a_sqlEingeloggterUser;
            
            print "<form name=\"meinKontoBearbeiten\" action=\"http://localhost/b5ba/index.php?Seiten_ID=Adminbereich\" method=\"POST\" onsubmit=\"return aBearbKundenkontoPruefe()\" >";
                //erster block Name, Adresse
                /*************************************************************** */
                foreach ($conn->query($a_sqlEingeloggterUser) as $row) {
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Vorname
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_vorname\" value=\"".$row['n_vname']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Nachname
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_nachname\" value=\"".$row['n_nname']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Straße
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_strasse\" value=\"".$row['n_strasse']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    PLZ
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_plz\" value=\"".$row['n_plz']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Ort
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_ort\" value=\"".$row['n_ort']."\">
                    </div>
                </div>

                </div>";

                //zweiter block zahlart, Rechte, Login name,  Email
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Zahlart</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">";
                    switch ($row['n_zahlart']){
                        case "":
                            print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\">Vorkasse</option>
                                <option value=\"Rechnung\">Rechnung</option>
                                <option value=\"Paypal\">Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                            </select>";
                            break;
                        case "Vorkasse":
                            print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" selected>Vorkasse</option>
                                <option value=\"Rechnung\">Rechnung</option>
                                <option value=\"Paypal\">Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                            </select>";
                            break;
                        case "Rechnung":
                        print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" >Vorkasse</option>
                                <option value=\"Rechnung\" selected>Rechnung</option>
                                <option value=\"Paypal\">Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                            </select>";
                            break;   
                        case "Paypal":
                                print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" >Vorkasse</option>
                                <option value=\"Rechnung\" >Rechnung</option>
                                <option value=\"Paypal\" selected>Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                            </select>";
                            break;  
                        case "Lastschrift":
                                print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" >Vorkasse</option>
                                <option value=\"Rechnung\" >Rechnung</option>
                                <option value=\"Paypal\" >Paypal</option>
                                <option value=\"Lastschrift\" selected>Lastschrift</option>
                            </select>";
                            break;    
                    }

                    print"</div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Rechte
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <p>Keine Änderungsrechte</p>
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Login Name
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_loginname\" value=\"".$row['n_login']."\">
                    </div>
                </div>

               
                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    E-mail
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_email\" value=\"".$row['n_mail']."\">
                    </div>
                </div>

                </div>";

                //Vierter Block Sperre
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        Sperre
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <p>Keine Änderungsrechte</p>
                        </div>
                    </div>

                </div>";

                //Button Block
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">

                        <div class=\"button-box\">
                        <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">
                        <input type=\"submit\" name=\"meinKontoBearbeiten\" id=\"a-userNeuAnlegen\" value=\"Speichern\" class=\"a-button\" >
                        </form>

                        <form action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-anzeigen\" method=\"POST\">
                        <input type=\"submit\"   value=\"Abbrechen\" class=\"a-button\">
                        </form>
                        </div>
                        </div>
                    </div>
                </div>";
                }    
        }


        /**************************************************************************************************************** */
        //mein-Konto- Passwort bearbeiten
        /**************************************************************************************************************** */
        public static function a_passbearbeitenMeinKonto() {
            global $conn, $a_sqlEingeloggterUser, $passmassage ;
                
            print"<form name=\"a_userpasswort\" action=\"http://localhost/b5ba/index.php?Seiten_ID=passwortBearbeiten\" method=\"POST\" onsubmit=\"return apasswortPruefe()\">

                    <div  class=\"admin-box-textfelder\">

                    <div  class=\"admin-box-texfeld-links\">
                    Altes Passwort
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_altesPasswort\" placeholder=\"altes Passwort\">
                    </div>
                    </div>

                    <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Neues Passwort
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_neuesPasswort\" placeholder=\"neues Passwort\">
                    </div>
                    </div>

                    <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">";
                    if (isset($_POST['meinKontoPass'])){
                        echo $passmassage;
                    }
                    print"</div>
                    </div>

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                    <div class=\"button-box\">
                    <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">
                        <input type=\"submit\" name=\"meinKontoPass\"  value=\"Speichern\" class=\"a-button\" >
                        </form>

                        <form action=\"http://localhost/b5ba/index.php?Seiten_ID=Adminbereich\" method=\"POST\">
                        <input type=\"submit\"   value=\"Abbrechen\" class=\"a-button\">
                        </form>
                    </div>  
                    </div>
                    </div>
                      
                </div>";
        }


        /**************************************************************************************************************** */
        //admin-user-neuanlegen
        /**************************************************************************************************************** */
        //Seite user neu anlegen
        //aNeuPruefe überprüft ob sachen in die felder eingegeben worden sind. Funktion ist in der JS Datei
        public static function af_admin_user_neuanlegen() {
            print "<form name=\"a_neu_anlegen\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" method=\"POST\" onsubmit=\"return aNeuPruefe()\" >";
                //erster block Name, Adresse
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Vorname
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_vorname\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Nachname
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_nachname\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Straße
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_strasse\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    PLZ
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_plz\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Ort
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_ort\">
                    </div>
                </div>

                </div>";

                //zweiter block Zahlart  Rechte, Login name, Passwort, Email
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Zahlart
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" >Vorkasse</option>
                                <option value=\"Rechnung\" >Rechnung</option>
                                <option value=\"Paypal\" >Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                    </select>
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Rechte
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    
                    <input type=\"radio\" name=\"a_rechte\" value=0 checked> Kunde
                        <input type=\"radio\" name=\"a_rechte\" value=1> Admin 
                        </div>
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Login Name
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_loginname\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Passwort
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_passwort\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    E-mail
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_email\">
                    </div>
                </div>

                </div>";

                //Vierter Block Sperre
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        Sperre
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <input type=\"radio\" name=\"a_sperrung\" value=0 checked> Nicht gesperrt
                        <input type=\"radio\" name=\"a_sperrung\" value=1> gesperrt 
                        </div>
                    </div>

                </div>";

                //Button Block
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">

                        <div class=\"button-box\">
                        <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">
                        <input type=\"submit\" name=\"userNeuAnlegen\" id=\"a-userNeuAnlegen\" value=\"Speichern\" class=\"a-button\" >
                        </form>

                        <form action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" method=\"POST\">
                        <input type=\"submit\"  id=\"a-userNeuAnlegenabbrechen\" value=\"Abbrechen\" class=\"a-button\">
                        </form>
                        </div>
                        </div>
                    </div>
                </div>";
        }


        /**************************************************************************************************************** */
        //admin-user-bearbeiten
        /**************************************************************************************************************** */
        //Seite user neu anlegen
        //aNeuPruefe überprüft ob sachen in die felder eingegeben worden sind. Funktion ist in der JS Datei
        public static function af_admin_user_bearbeiten() {
            global $conn, $sqladminnutzervaluebefuellen;
            
            print "<form name=\"a_user_bearbeiten\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" method=\"POST\" onsubmit=\"return aBearbeitenPruefe()\" >";
                //erster block Name, Adresse
                /*************************************************************** */
                foreach ($conn->query($sqladminnutzervaluebefuellen) as $row) {
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Vorname
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_vorname\" value=\"".$row['n_vname']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Nachname
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_nachname\" value=\"".$row['n_nname']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Straße
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_strasse\" value=\"".$row['n_strasse']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    PLZ
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_plz\" value=\"".$row['n_plz']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Ort
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_ort\" value=\"".$row['n_ort']."\">
                    </div>
                </div>

                </div>";

                //zweiter block Zahlart, Rechte, Login name, Passwort, Email
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Zahlart</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">";
                    switch ($row['n_zahlart']){
                        case "":
                            print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\">Vorkasse</option>
                                <option value=\"Rechnung\">Rechnung</option>
                                <option value=\"Paypal\">Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                            </select>";
                            break;
                        case "Vorkasse":
                            print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" selected>Vorkasse</option>
                                <option value=\"Rechnung\">Rechnung</option>
                                <option value=\"Paypal\">Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                            </select>";
                            break;
                        case "Rechnung":
                        print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" >Vorkasse</option>
                                <option value=\"Rechnung\" selected>Rechnung</option>
                                <option value=\"Paypal\">Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                            </select>";
                            break;   
                        case "Paypal":
                                print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" >Vorkasse</option>
                                <option value=\"Rechnung\" >Rechnung</option>
                                <option value=\"Paypal\" selected>Paypal</option>
                                <option value=\"Lastschrift\">Lastschrift</option>
                            </select>";
                            break;  
                        case "Lastschrift":
                                print"<select name=\"a_zahlart\">
                                <option value=\"Vorkasse\" >Vorkasse</option>
                                <option value=\"Rechnung\" >Rechnung</option>
                                <option value=\"Paypal\" >Paypal</option>
                                <option value=\"Lastschrift\" selected>Lastschrift</option>
                            </select>";
                            break;    
                    }

                    print"</div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Rechte
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">";

                    if ($row['n_admin'] == 0){
                        print "<input type=\"radio\" name=\"a_rechte\" value=0 checked> Kunde
                        <input type=\"radio\" name=\"a_rechte\" value=1> Admin"; 
                    }
                    
                    if ($row['n_admin'] == 1){
                        print "<input type=\"radio\" name=\"a_rechte\" value=0 > Kunde
                        <input type=\"radio\" name=\"a_rechte\" value=1 checked> Admin"; 
                    }

                    print "</div>
                    <!--div zuviel? -->
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    Login Name
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_loginname\" value=\"".$row['n_login']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    E-mail
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_email\" value=\"".$row['n_mail']."\">
                    </div>
                </div>

                </div>";

                //Vierter Block Sperre
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        Sperre
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">";

                        if ($row['n_sperre'] == 0){
                        print"<input type=\"radio\" name=\"a_sperrung\" value=0 checked> Nicht gesperrt
                        <input type=\"radio\" name=\"a_sperrung\" value=1> gesperrt ";
                        }
                        if ($row['n_sperre'] == 1){
                            print"<input type=\"radio\" name=\"a_sperrung\" value=0 > Nicht gesperrt
                            <input type=\"radio\" name=\"a_sperrung\" value=1 checked> gesperrt ";
                            }


                        print"</div>
                    </div>

                </div>";

                //Button Block
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">

                        <div class=\"button-box\">
                        <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">
                        <input type=\"submit\" name=\"userBearbeiten\" id=\"a-userNeuAnlegen\" value=\"Speichern\" class=\"a-button\" >
                        </form>

                        <form action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-anzeigen\" method=\"POST\">
                        <input type=\"submit\"   value=\"Abbrechen\" class=\"a-button\">
                        </form>
                        </div>
                        </div>
                    </div>
                </div>";
                }    
        }


        /**************************************************************************************************************** */
        //admin-user-anzeigen
        /**************************************************************************************************************** */
        //anzeigen der User in ihrem einzelseite
        public static function af_admin_user_anzeigen() {
            global $conn, $sqladminnutzerwahl, $anzeigeBestellungsanzahl;
                            foreach ($conn->query($sqladminnutzerwahl) as $row) {
                            

                           print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Vorname
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_vname']."
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Nachname
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_nname']."
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Straße
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_strasse']."
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                PLZ, Ort
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_plz']." ".$row['n_ort']."
                                </div>
                            </div>

                        </div>";


                       //zweiter Block Bestellungen (hinzufügen der funktionalität)
                       /*************************************************************** */
                        print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Bestellungen
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">".
                                $anzeigeBestellungsanzahl['anzahl']." Bestellungen 
                                <a class=\"linkTexthervorgehobenFließtext\" href=\"http://localhost/b5ba/index.php?Seiten_ID=admin-bestellungsliste\" class=\"admin-nav-ueberschrift\"> ansehen</a>
                                </div>
                            </div>

                        </div>";

                        //dritter Block Nutzerart, email, Nutzername
                        /*************************************************************** */
                        print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Zahlart
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_zahlart']."
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Nutzerart
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">";
                                if ($row['n_admin'] == 0){
                                    print "Kunde";
                                }
                                else{
                                    print "Admin";
                                }
                                print "</div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Login Name
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_login']."
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Email
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                ".$row['n_mail']."
                                </div>
                            </div>

                        </div>";

                        //Vierter Block Sperre
                        /*************************************************************** */
                        print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Sperre
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">";
                                if ($row['n_sperre'] == 0){
                                    print "nicht gesperrt";
                                }
                                else {
                                    print "gesperrt";
                                }
                                print "</div>
                            </div>

                        </div>";

                        //Button Block
                        /*************************************************************** */
                        Print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">

                                <div class=\"button-box\">
                                <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-bearbeiten\">
                                <input type=\"submit\" id=\"a-userbearbeiten\" class=\"a-button\" value=\"Bearbeiten\">
                                </form>

                                <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\">
                                <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">    
                                <input type=\"submit\" name=\"nutzerLoeschen\" id=\"a-userloeschen\" class=\"a-button\" value=\"Löschen\">
                                </form>

                                </div>

                                </div>
                            </div>

                        </div>";

                            }
        }


        /**************************************************************************************************************** */
        //admin-Artikel-neuanlegen
        /**************************************************************************************************************** */
        //Seite Artikel neu anlegen
        //aNeuArtikelPruefe überprüft ob sachen in die felder eingegeben worden sind. Funktion ist in der JS Datei
        public static function af_admin_artikel_neuanlegen() {
            print "<form name=\"a_artikel_neu_anlegen\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-liste\" method=\"POST\" onsubmit=\"return aArtikelNeuPruefe()\" >";
                //erster block Name, Kathegorie, Preis, stück
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Artikel-Name</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_art_name\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Kathegorie</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <select name=\"a_kat_bez\">
                        <option value=\"nichts\">Bitte Wählen</option>
                        <option value=\"baeumchen\">Bäumchen</option>
                        <option value=\"gruenpflanze\">Grünpflanze</option>
                        <option value=\"bluehend\">Blühend</option>
                    </select>
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Preis</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_art_preis\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Stück</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_art_stueck\">
                    </div>
                </div>

                </div>";

                //zweiter block Sale, Salepreis
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Sale</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    
                    <input type=\"radio\" name=\"a_sale_status\" value=0 checked> nein
                        <input type=\"radio\" name=\"a_sale_status\" value=1> ja 
                        </div>
                    </div>
                

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Salepreis</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_sale_preis\">
                    </div>
                </div>


                </div>";

                //Vierter Block Größe, Ort, Farbe, Pflege, Beschreibung, Bild
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Größe</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <input type=\"text\" name=\"a_art_groesse\"> 
                        </div>
                    </div>

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Ort</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <select name=\"a_art_ort\">
                        <option value=\"nichts\">Bitte Wählen</option>
                        <option value=\"licht\">Licht</option>
                        <option value=\"sonnig\">Sonnig</option>
                        <option value=\"halbschatten\">Halbschatten</option>
                        <option value=\"schatten\">Schatten</option>
                    </select>
                        </div>
                    </div>


                    <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Farbe</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <select name=\"a_art_farbe\">
                        <option value=\"nichts\">Bitte Wählen</option>
                        <option value=\"weiss\">Weiß</option>
                        <option value=\"rosa\">Rosa</option>
                        <option value=\"gelb\">gelb</option>
                        <option value=\"rot\">Rot</option>
                        <option value=\"gruen\">Grün</option>
                    </select>
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Pflege</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <textarea name=\"a_art_pflege\" cols=\"50\" rows=\"10\">
                        </textarea>
                        </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Beschreibung</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <textarea name=\"a_art_text\" cols=\"50\" rows=\"10\" >
                        </textarea>
                        </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Bildname (z.B. bild.jpg)</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <input type=\"text\" name=\"a_art_bild\">
                        </div>
                    </div>


                </div>";

                //Button Block
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">

                        <div class=\"button-box\">
                        <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">
                        <input type=\"submit\" name=\"a_button_ArtikelNeuAnlegen\"  value=\"Speichern\" class=\"a-button\" >
                        </form>

                        <form action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-liste\" method=\"POST\">
                        <input type=\"submit\"   value=\"Abbrechen\" class=\"a-button\">
                        </form>
                        </div>
                        </div>
                    </div>
                </div>";
        }

        /**************************************************************************************************************** */
        //admin-user-Artikelliste
        /**************************************************************************************************************** */
        //Seiteninhalt der rechten Box von der Kundenliste
        public static function af_admin_user_artikelliste() {
            
            global $conn, $aSqlArtikelListe ;
            foreach ($conn->query($aSqlArtikelListe) as $row) {
            print"<div  class=\"admin-box-linie\"> 
            <div  class=\"admin-box-liste\"> 

            
                <div class=\"admin-box-liste-artnummer\"> 
                Art-Nr ".$row['art_id']."
                </div>
                <div  class=\"admin-box-liste-artname\"> 
                ".$row['art_name']."
                </div>
                <div  class=\"admin-box-liste-artstueck\"> 
                ".$row['art_stueckzahl']." Stück
                </div>
                <div  class=\"admin-box-liste-artpreis\"> 
                ".$row['art_preis']." €
                </div>
                <div  class=\"admin-box-liste-salepreis\">";
                if($row['sale_status'] == "1"){
                    print"Salepreis ". $row['sale_preis']." €";
                }
                print" </div>

                <div  class=\"admin-box-liste-ansehen\">
                <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-anzeigen&a_gewaehlterArtikel=".$row['art_id']."\">
                    <input type=\"submit\"  class=\"a-button\" value=\"ansehen\">
                    </form>
                </div>
            

            </div>
        </div>";
        }
    }


    /**************************************************************************************************************** */
        //admin-Artikel-anzeigen
        /**************************************************************************************************************** */
        //Seite Artikel neu anlegen
        //aNeuArtikelPruefe überprüft ob sachen in die felder eingegeben worden sind. Funktion ist in der JS Datei
        public static function af_admin_artikel_anzeigen() {
                global $conn, $asqlartikelwahl;
                foreach ($conn->query($asqlartikelwahl) as $row) {
           
                //erster block Name, Kathegorie, Preis, stück
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Artikel-Name</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    ".$row['art_name']."
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Kathegorie</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    ".$row['kat_bez']."
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Preis</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    ".$row['art_preis']." €
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Stück</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    ".$row['art_stueckzahl']."
                    </div>
                </div>

                </div>";

                //zweiter block Sale, Salepreis
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Sale</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">";
                    if($row['sale_status'] == "0"){
                        print "nein";
                    }
                    else{
                        print "ja";
                    }
                    
                 print"</div>
                    </div>
                

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Salepreis</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    ".$row['sale_preis']." €
                    </div>
                </div>


                </div>";

                //Vierter Block Größe, Ort, Farbe, Pflege, Beschreibung, Bild
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Größe</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        ".$row['art_groesse']." cm
                        </div>
                    </div>

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Ort</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        ".$row['art_ort']."
                        </div>
                    </div>


                    <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Farbe</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    ".$row['art_farbe']."
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Pflege</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        ".$row['art_pflege']."
                        </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Beschreibung</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        ".$row['art_text']."
                        </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Bildname</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        ".$row['art_bild']." <br>
                        <img width=\"250\" class=\"adminBildArtikelAnsicht\" src=\"img/".$row['art_bild']."\" alt=\"".$row['art_bild']."\"> 
                        </div>
                    </div>


                </div>";

                //Button Block
                /*************************************************************** */
                Print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">

                                <div class=\"button-box\">
                                <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-bearbeiten\">
                                <input type=\"submit\" class=\"a-button\" value=\"Bearbeiten\">
                                </form>

                                <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-liste\">
                                <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">    
                                <input type=\"submit\" name=\"artikelLoeschen\"  class=\"a-button\" value=\"Löschen\">
                                </form>

                                </div>

                                </div>
                            </div>

                        </div>";
                      }
        }


         /**************************************************************************************************************** */
        //admin-Artikel-bearbeiten
        /**************************************************************************************************************** */
        //Seite Artikel bearbeiten
        //aArtikelBearbeitenPruefe überprüft ob sachen in die felder eingegeben worden sind. Funktion ist in der JS Datei
        public static function af_admin_artikel_bearbeiten() {
            global $conn, $sqlAdminArtikelValueBefuellen;
            print "<form name=\"a_artikel_bearbeiten\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-liste\" method=\"POST\" onsubmit=\"return aArtikelBearbeitenPruefe()\" >";
                //erster block Name, Kathegorie, Preis, stück
                /*************************************************************** */
                foreach ($conn->query($sqlAdminArtikelValueBefuellen) as $row) {
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Artikel-Name</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_art_name\" value=\"".$row['art_name']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Kathegorie</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">";
                    switch ($row['kat_bez']){
                        case "nichts":
                            print"<select name=\"a_kat_bez\">
                                <option value=\"nichts\">Bitte Wählen</option>
                                <option value=\"baeumchen\">Bäumchen</option>
                                <option value=\"gruenpflanze\">Grünpflanze</option>
                                <option value=\"bluehend\">Blühend</option>
                            </select>";
                            break;
                        case "baeumchen":
                            print"<select name=\"a_kat_bez\">
                                <option value=\"nichts\">Bitte Wählen</option>
                                <option value=\"baeumchen\" selected>Bäumchen</option>
                                <option value=\"gruenpflanze\">Grünpflanze</option>
                                <option value=\"bluehend\">Blühend</option>
                            </select>";
                            break;   
                        case "gruenpflanze":
                            print"<select name=\"a_kat_bez\">
                                <option value=\"nichts\">Bitte Wählen</option>
                                <option value=\"baeumchen\">Bäumchen</option>
                                <option value=\"gruenpflanze\" selected>Grünpflanze</option>
                                <option value=\"bluehend\">Blühend</option>
                            </select>";
                            break;  
                        case "bluehend":
                            print"<select name=\"a_kat_bez\">
                                <option value=\"nichts\">Bitte Wählen</option>
                                <option value=\"baeumchen\">Bäumchen</option>
                                <option value=\"gruenpflanze\">Grünpflanze</option>
                                <option value=\"bluehend\" selected>Blühend</option>
                            </select>";
                            break;    
                    }

                    print"</div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Preis</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_art_preis\" value=\"".$row['art_preis']."\">
                    </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Stück</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_art_stueck\" value=\"".$row['art_stueckzahl']."\">
                    </div>
                </div>

                </div>";

                //zweiter block Sale, Salepreis
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Sale</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">";
                    if ($row['sale_status'] == "0"){
                        print"<input type=\"radio\" name=\"a_sale_status\" value=0 checked> nein
                        <input type=\"radio\" name=\"a_sale_status\" value=1> ja";
                    }
                    else{
                        print"<input type=\"radio\" name=\"a_sale_status\" value=0 > nein
                        <input type=\"radio\" name=\"a_sale_status\" value=1 checked> ja";
                    }
                    print"</div>
                    </div>
                

                <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Salepreis</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_sale_preis\" value=\"".$row['sale_preis']."\">
                    </div>
                </div>


                </div>";

                //Vierter Block Größe, Ort, Farbe, Pflege, Beschreibung, Bild
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Größe</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <input type=\"text\" name=\"a_art_groesse\" value=\"".$row['art_groesse']."\"> 
                        </div>
                    </div>

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Ort</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">";
                        switch ($row['art_ort']){
                            case "nichts":
                                print"<select name=\"a_art_ort\">
                                    <option value=\"nichts\">Bitte Wählen</option>
                                    <option value=\"licht\">Licht</option>
                                    <option value=\"sonnig\">Sonnig</option>
                                    <option value=\"halbschatten\">Halbschatten</option>
                                    <option value=\"schatten\">Schatten</option>
                                </select>";
                                break;
                            case "licht":
                                print"<select name=\"a_art_ort\">
                                    <option value=\"nichts\">Bitte Wählen</option>
                                    <option value=\"licht\" selected>Licht</option>
                                    <option value=\"sonnig\">Sonnig</option>
                                    <option value=\"halbschatten\">Halbschatten</option>
                                    <option value=\"schatten\">Schatten</option>
                                </select>";
                                break; 
                            case "sonnig":
                                print"<select name=\"a_art_ort\">
                                    <option value=\"nichts\">Bitte Wählen</option>
                                    <option value=\"licht\">Licht</option>
                                    <option value=\"sonnig\" selected>Sonnig</option>
                                    <option value=\"halbschatten\">Halbschatten</option>
                                    <option value=\"schatten\">Schatten</option>
                                </select>";
                                break; 
                            case "halbschatten":
                                print"<select name=\"a_art_ort\">
                                    <option value=\"nichts\">Bitte Wählen</option>
                                    <option value=\"licht\">Licht</option>
                                    <option value=\"sonnig\">Sonnig</option>
                                    <option value=\"halbschatten\" selected>Halbschatten</option>
                                    <option value=\"schatten\">Schatten</option>
                                </select>";
                                break;  
                            case "schatten":
                                print"<select name=\"a_art_ort\">
                                    <option value=\"nichts\">Bitte Wählen</option>
                                    <option value=\"licht\">Licht</option>
                                    <option value=\"sonnig\">Sonnig</option>
                                    <option value=\"halbschatten\">Halbschatten</option>
                                    <option value=\"schatten\" selected>Schatten</option>
                                </select>";
                                break;         
                        }



                        print"</div>
                    </div>


                    <div  class=\"admin-box-textfelder\">
                    <div  class=\"admin-box-texfeld-links\">
                    <p>Farbe</p>
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">";
                    switch ($row['art_farbe']){
                        case "nichts":
                        print"<select name=\"a_art_farbe\">
                            <option value=\"nichts\">Bitte Wählen</option>
                            <option value=\"weiss\">Weiß</option>
                            <option value=\"rosa\">Rosa</option>
                            <option value=\"gelb\">gelb</option>
                            <option value=\"rot\">Rot</option>
                            <option value=\"gruen\">Grün</option>
                        </select>";
                        break;
                    case "weiss":
                        print"<select name=\"a_art_farbe\">
                            <option value=\"nichts\">Bitte Wählen</option>
                            <option value=\"weiss\" selected>Weiß</option>
                            <option value=\"rosa\">Rosa</option>
                            <option value=\"gelb\">gelb</option>
                            <option value=\"rot\">Rot</option>
                            <option value=\"gruen\">Grün</option>
                        </select>";
                        break;
                    case "rosa":
                        print"<select name=\"a_art_farbe\">
                            <option value=\"nichts\">Bitte Wählen</option>
                            <option value=\"weiss\">Weiß</option>
                            <option value=\"rosa\" selected>Rosa</option>
                            <option value=\"gelb\">gelb</option>
                            <option value=\"rot\">Rot</option>
                            <option value=\"gruen\">Grün</option>
                        </select>";
                        break;
                    case "gelb":
                        print"<select name=\"a_art_farbe\">
                            <option value=\"nichts\">Bitte Wählen</option>
                            <option value=\"weiss\">Weiß</option>
                            <option value=\"rosa\">Rosa</option>
                            <option value=\"gelb\" selected>gelb</option>
                            <option value=\"rot\">Rot</option>
                            <option value=\"gruen\">Grün</option>
                        </select>";
                        break;
                    case "rot":
                        print"<select name=\"a_art_farbe\">
                            <option value=\"nichts\">Bitte Wählen</option>
                            <option value=\"weiss\">Weiß</option>
                            <option value=\"rosa\">Rosa</option>
                            <option value=\"gelb\">gelb</option>
                            <option value=\"rot\" selected>Rot</option>
                            <option value=\"gruen\">Grün</option>
                        </select>";
                        break;
                    case "gruen":
                        print"<select name=\"a_art_farbe\">
                            <option value=\"nichts\">Bitte Wählen</option>
                            <option value=\"weiss\">Weiß</option>
                            <option value=\"rosa\">Rosa</option>
                            <option value=\"gelb\">gelb</option>
                            <option value=\"rot\">Rot</option>
                            <option value=\"gruen\" selected>Grün</option>
                        </select>";
                        break;
                    }
                    
                    print"</div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Pflege</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <textarea name=\"a_art_pflege\" cols=\"50\" rows=\"10\"> ".$row['art_pflege']."
                        </textarea>
                        </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Beschreibung</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <textarea name=\"a_art_text\" cols=\"50\" rows=\"10\">
                        ".$row['art_text']."
                        </textarea>
                        </div>
                </div>

                <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        <p>Bildname (z.B. bild.jpg)</p>
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        <input type=\"text\" name=\"a_art_bild\" value=\"".$row['art_bild']."\"> 
                        </div>
                    </div>


                </div>";

                //Button Block
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">

                        <div class=\"button-box\">
                        <input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION['csrf_token']."\">
                        <input type=\"submit\" name=\"a_button_ArtikelBearbeiten\"  value=\"Speichern\" class=\"a-button\" >
                        </form>

                        <form action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-liste\" method=\"POST\">
                        <input type=\"submit\"   value=\"Abbrechen\" class=\"a-button\">
                        </form>
                        </div>
                        </div>
                    </div>
                </div>";
                    }
        }

    /**************************************************************************************************************** */
        //Bestellungsliste User
        /**************************************************************************************************************** */
        
        public static function af_admin_bestellungsliste() {
            
            global $conn, $asqlBestellungenListe ;
            foreach ($conn->query($asqlBestellungenListe) as $row) {
            print"<div  class=\"admin-box-linie\"> 
            <div  class=\"admin-box-liste\"> 

            
                <div  class=\"admin-box-liste-kdnr\"> 
                Best-Nr ".$row['best_id']."
                </div>
                <div  class=\"admin-box-liste-name\"> 
                ".$row['best_datum']." 
                </div>
                <div  class=\"admin-box-liste-gesperrt\">";

                 
               print" </div>
                <div  class=\"admin-box-liste-ansehen\">
                <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-bestellung&abestellid=".$row['best_id']."\">
                    <input type=\"submit\"  class=\"a-button\" value=\"ansehen\">
                    </form>
                </div>
            

            </div>
        </div>";
        }
    }

    /**************************************************************************************************************** */
        //Bestellung anzeige
        /**************************************************************************************************************** */
        //Ansicht kunden oder nutzer konto im admin bereich
        public static function af_admin_bestellung() {

            global $conn, $a_sqlBestellungAnzeige;
                            foreach ($conn->query($a_sqlBestellungAnzeige) as $row) {
            
            //erster block Name, Adresse
            /*************************************************************** */
                    //Druckdiv anfang
                    print"<div id=\"a_ausdruckenBestellung\">";

                        print "<div  class=\"admin-box-linie\">

                        <div  class=\"admin-box-textfelder\">
                            <div  class=\"admin-box-texfeld-links\">
                            Vorname
                            </div>
                            <div  class=\"admin-box-texfeld-rechts\">
                            ".$row['best_n_vname']."
                            </div>
                        </div>

                        <div  class=\"admin-box-textfelder\">
                            <div  class=\"admin-box-texfeld-links\">
                            Nachname
                            </div>
                            <div  class=\"admin-box-texfeld-rechts\">
                            ".$row['best_n_name']."
                            </div>
                        </div>

                        <div  class=\"admin-box-textfelder\">
                            <div  class=\"admin-box-texfeld-links\">
                            Straße
                            </div>
                            <div  class=\"admin-box-texfeld-rechts\">
                            ".$row['lieferstrasse']."
                            </div>
                        </div>

                        <div  class=\"admin-box-textfelder\">
                            <div  class=\"admin-box-texfeld-links\">
                            PLZ, Ort
                            </div>
                            <div  class=\"admin-box-texfeld-rechts\">
                            ".$row['lieferplz']." ".$row['lieferort']."
                            </div>
                        </div>

                    </div>";


                    //zeiter block Zahlart, bestell nummer, Besterlldatum
                    /*************************************************************** */
                    print "<div  class=\"admin-box-linie\">

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        Zahlungsart
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        ".$row['best_bezahlart']."
                        </div>
                    </div>

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        Bestell-Nr
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        ".$row['best_id']."
                        </div>
                    </div>

                    <div  class=\"admin-box-textfelder\">
                        <div  class=\"admin-box-texfeld-links\">
                        Bestell-Datum
                        </div>
                        <div  class=\"admin-box-texfeld-rechts\">
                        ".$row['best_datum']."
                        </div>
                    </div>

                </div>";

                            }

                            //Block auflistung der Bestellungsitems
                            global $conn, $asqlBestellungsItems, $a_gesamtbetrag;
                            $a_gesamtbetrag = 0 ;
                            foreach ($conn->query($asqlBestellungsItems) as $row) {
                            
                            print"<div  class=\"admin-box-linie\"> 
                            <div  class=\"admin-box-liste\"> 
                            
                            
                                <div class=\"admin-box-liste-bbild\"> 
                                <img width=\"100\" src=\"img/".$row['best_art_bild']."\" alt=\"".$row['best_art_bild']."\">
                                </div>


                                <div  class=\"admin-box-liste-bname\"> 
                                ".$row['best_art_name']." 
                                <div  class=\"admin-box-liste-bartnummer\"> 
                                Art-Nr. ".$row['art_id']." 
                                </div>
                                </div>


                                <div  class=\"admin-box-liste-bstueck\">
                                ".$row['best_anzahl']." Stück
                                <div  class=\"admin-box-liste-bstueckpreis\"> 
                                je ".$row['best_art_preis']." € 
                                </div>
                                </div>";
                                
                                $aitemgesamtpreis =  $row['best_anzahl'] * $row['best_art_preis'];

                                $a_gesamtbetrag += $aitemgesamtpreis;

                                print"<div  class=\"admin-box-liste-bitemgesamtpreis\">
                                ".$aitemgesamtpreis." €
                                </div>
                                </div>
                            </div>";
                        
                            }

                            $a_gesamtbetrag += 4.95;

                            print"<div class=\"sumganzebox\">
                                <div class=\"sumganzeboxlinks\">
                                </div>
                                <div class=\"sumganzeboxrechts\">
                                    <div class=\"sumganzeboxrechtslinks\">
                                        <p class=\"aboxversandkosten\">Versandkosten </p>
                                        <p class=\"aboxgesamtsumme\">Gesamtsumme </p>
                                        <p class=\"aboxmehrwertsteuer\">incl. MwSt.</p>
                                    </div>
                                    <div class=\"sumganzeboxrechtsrechts\">
                                        <p class=\"aboxversandkosten\">4.95 €</p>
                                        <p class=\"aboxgesamtsumme\">".$a_gesamtbetrag." €</p>
                                    </div>
                                </div>
                            </div>";

                            //druck div schluss 
                            print"</div>

                            <div class=\"sumbutton\">
                            <form>
                                <input type=\"submit\" value=\"Ausdrucken\" class=\"a-button\" onclick=\"printElem()\">
                            </form>
                            </div>";

                        }                

        /**************************************************************************************************************** */
        //Bild upload seite
        /**************************************************************************************************************** */
        //Seiteninhalt der rechten Box für den Seiteninhalt
        public static function af_bilderupload() {

            print"
            <div class=\"upload-box\">
            <form action=\"http://localhost/b5ba/index.php?Seiten_ID=bilderupload\" method=\"post\" enctype=\"multipart/form-data\">
                Bild auswählen zum upload:
                <input  type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
                <input class=\"a-button\" type=\"submit\" value=\"Bild hochladen\" name=\"submit\">
            </form><br>
            ";
                        uploader::uploaderfunktion();
            echo"</div>";
        }
    //Klammer für die klasse 
    }

?>