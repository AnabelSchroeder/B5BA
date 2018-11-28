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
            print "<form name=\"a_neu_anlegen\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" method=\"POST\" onsubmit=\"return aNeuPruefe(a_neu_anlegen)\" >";
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
        //admin-user-bearbeiten
        /**************************************************************************************************************** */
        //Seite user neu anlegen
        //aNeuPruefe überprüft ob sachen in die felder eingegeben worden sind. Funktion ist in der JS Datei
        public static function af_admin_user_bearbeiten() {
            global $conn, $sqladminnutzervaluebefuellen;
            
            print "<form name=\"a_user_bearbeiten\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste\" method=\"POST\" onsubmit=\"return aNeuPruefe(a_user_bearbeiten)\" >";
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

                //zweiter block Rechte, Login name, Passwort, Email
                /*************************************************************** */
                print "<div  class=\"admin-box-linie\">

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
                    Passwort
                    </div>
                    <div  class=\"admin-box-texfeld-rechts\">
                    <input type=\"text\" name=\"a_passwort\" value=\"".$row['n_passwort']."\">
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


        /**************************************************************************************************************** */
        //admin-Artikel-neuanlegen
        /**************************************************************************************************************** */
        //Seite Artikel neu anlegen
        //aNeuArtikelPruefe überprüft ob sachen in die felder eingegeben worden sind. Funktion ist in der JS Datei
        public static function af_admin_artikel_neuanlegen() {
            print "<form name=\"a_artikel_neu_anlegen\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-artikel-liste\" method=\"POST\" onsubmit=\"return aArtikelNeuPruefe()\" >";
                //erster block Name, Kathegorie, Preis
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
                        <p>Bildname (z.B. bild.img)</p>
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
                stückzahl verfügbar machen
                </div>
                <div  class=\"admin-box-liste-artpreis\"> 
                ".$row['art_preis']." €
                </div>
                <div  class=\"admin-box-liste-salepreis\">";
                if($row['sale_status'] == "1"){
                    print $row['sale_preis']." €";
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






    //Klammer für die klasse 
    }

?>