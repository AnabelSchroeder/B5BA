<?php
    class a_view {

        /**************************************************************************************************************** */
        //admin-user-kundenliste
        /**************************************************************************************************************** */
        //Seiteninhalt der rechten Box von der Kundenliste
        public static function af_admin_user_kundenliste() {
            
                global $conn, $sqlkundenliste ;
                foreach ($conn->query($sqlkundenliste) as $row) {
                print"<div  class=\"admin-box-linie\"> 
                <div  class=\"admin-box-liste\"> 

                
                    <div  class=\"admin-box-liste-kdnr\"> 
                    Kd-Nr ".$row['n_id']."
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
            
            //erster block Name, Adresse
            /*************************************************************** */
                       print"<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Vorname
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                Anne
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Nachname
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                schmidt
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Straße
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                Musterstraße 12
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                PLZ, Ort
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                12345 Musterhausen
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
                                <div  class=\"admin-box-texfeld-rechts\">
                                3 Bestellungen + Bestelungsansehenbutton
                                </div>
                            </div>

                        </div>";

                        //dritter Block Nutzerart, email, Nutzername 
                        /*************************************************************** */
                        print "<div  class=\"admin-box-linie\">

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Nutzerart
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                was auch immer gewählt wurde
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Login Name
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                Supershoper84
                                </div>
                            </div>

                            <div  class=\"admin-box-textfelder\">
                                <div  class=\"admin-box-texfeld-links\">
                                Email
                                </div>
                                <div  class=\"admin-box-texfeld-rechts\">
                                Rote.Rose@gmx.de
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
                                Hier wird angezeigt ob man gesperrt ist.
                                </div>
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
                               <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-bearbeiten\">
                                <input type=\"submit\" id=\"a-userbearbeiten\" class=\"a-button\" value=\"Bearbeiten\">
                                </form>

                              <form method=\"POST\" action=\"http://localhost/b5ba/index.php\">
                                <input type=\"submit\" id=\"a-userloeschen\" class=\"a-button\" value=\"Löschen\">
                                </form>

                                <form method=\"POST\" action=\"http://localhost/b5ba/index.php\">
                                <input type=\"submit\" id=\"a-userlogaut\" class=\"a-button\" value=\"Logout\">
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

                //zweiter block Rechte, Login name, Passwort, Email
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

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

                        //Button Block(Muss angepasst werden)
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
                                <input type=\"submit\" name=\"nutzerLoeschen\" id=\"a-userloeschen\" class=\"a-button\" value=\"Löschen\">
                                </form>

                                </div>

                                </div>
                            </div>

                        </div>";

                            }
        }


    }

?>