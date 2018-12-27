<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ba_webshop";

/******************************************************************************* */
//Mein Konto
/****************************************************************************** */

//muss mit den anderen abgestimmt werden was im Login vorgang benutz werdenals mechanismen und variablen.
$a_eingeloggt = true;
$a_eingeloggterUser = 17;
if ($a_eingeloggt == true){
    $a_sqlEingeloggterUser = "SELECT * FROM nutzer WHERE n_id= ". $a_eingeloggterUser;
}

// Wenn auf der Seite Bearbeiten user gespeichert wird werden die daten in der Datenbank geseichert/überschrieben
if (isset($_POST['meinKontoBearbeiten'])){

    if($_POST['csrf'] !== $_SESSION['csrf_token']) {
        die("Ungültiger Token");
      }
    else{
    $a_nname =  htmlspecialchars($_POST["a_nachname"], ENT_QUOTES, 'UTF-8');
    $a_vname = htmlspecialchars($_POST["a_vorname"], ENT_QUOTES, 'UTF-8');
    $a_strasse = htmlspecialchars($_POST["a_strasse"], ENT_QUOTES, 'UTF-8');
    $a_ort = htmlspecialchars($_POST["a_ort"], ENT_QUOTES, 'UTF-8');
    $a_plz = htmlspecialchars($_POST["a_plz"], ENT_QUOTES, 'UTF-8');
    $a_email = htmlspecialchars($_POST["a_email"], ENT_QUOTES, 'UTF-8');
    $a_loginname = htmlspecialchars($_POST["a_loginname"], ENT_QUOTES, 'UTF-8');
    $a_zahlart = htmlspecialchars($_POST["a_zahlart"], ENT_QUOTES, 'UTF-8');
   
    
    //Speichern der Daten von Neu anlegen eines Users im admin bereich
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $absql = "UPDATE nutzer SET n_nname=?, n_vname=?, n_strasse=?, n_ort=?, n_plz=?, n_mail=?, n_login=?, n_zahlart=? WHERE n_id=?";
        $stmt = $conn->prepare($absql);
        $stmt->execute([ $a_nname, $a_vname, $a_strasse, $a_ort, $a_plz, $a_email, $a_loginname, $a_zahlart,  $a_eingeloggterUser]);
        
        //echo "Datensatz neu hinterlegt";
        }
    catch(PDOException $e)
        {
        echo $absql . "<br>" . $e->getMessage();
        }
    
   
    $_POST['meinKontoBearbeiten'] =  null;
    }
    
    }

//************************************************************************************************************** */    
//Passwort speichern nach eingabe eines neuen passwortes
if (isset($_POST['meinKontoPass'])){
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    $passmassage = "";



    //Überprüfen ob token stimmt
    if($_POST['csrf'] !== $_SESSION['csrf_token']) {
        die("Ungültiger Token");
      }
    else{
        //Altespasswort aus formular holen
        $a_altespass = htmlspecialchars($_POST["a_altesPasswort"], ENT_QUOTES, 'UTF-8');
        if ($a_eingeloggt == true){
            //Altes Paswort aus Datenbank holen
            $sqlhashAltesPass = "SELECT n_passwort FROM nutzer WHERE n_id= ". $a_eingeloggterUser;

            foreach ($conn->query($sqlhashAltesPass) as $row) {
                $hashAltesPass = $row['n_passwort'];    
            }
        } 
        if(isset($a_altespass)){
            if(password_verify($a_altespass, $hashAltesPass) ) {
                //Neues Passwort vorbereiten zum Speichern in die Datenbank
                $a_passvorhash = htmlspecialchars($_POST["a_neuesPasswort"], ENT_QUOTES, 'UTF-8');
                $a_passwort = password_hash($a_passvorhash, PASSWORD_DEFAULT);

                //Speichern in die Datenbank
                $passsql = "UPDATE nutzer SET n_passwort=? WHERE n_id=?";
                $stmtpass = $conn->prepare($passsql);
                $stmtpass->execute([ $a_passwort,  $a_eingeloggterUser]);

                //Massages
                $passmassage = "Passwort gespeichert";
            }
            else{
                $passmassage = "Passwort falsch!"; 
            }
        }   
    }

}


        


/******************************************************************************* */
//Nutzerkonten
/****************************************************************************** */

// Wenn auf der Seite Neu anlegen der submit button gedrückt wird, werden die Farmular inhalte in die datenbank geschickt
if (isset($_POST['userNeuAnlegen'])){

    if($_POST['csrf'] !== $_SESSION['csrf_token']) {
        die("Ungültiger Token");
      }
    else{

$a_rechte = htmlspecialchars($_POST["a_rechte"], ENT_QUOTES, 'UTF-8');
$a_nname =  htmlspecialchars($_POST["a_nachname"], ENT_QUOTES, 'UTF-8');
$a_vname = htmlspecialchars($_POST["a_vorname"], ENT_QUOTES, 'UTF-8');
$a_strasse = htmlspecialchars($_POST["a_strasse"], ENT_QUOTES, 'UTF-8');
$a_ort = htmlspecialchars($_POST["a_ort"], ENT_QUOTES, 'UTF-8');
$a_plz = htmlspecialchars($_POST["a_plz"], ENT_QUOTES, 'UTF-8');
$a_email = htmlspecialchars($_POST["a_email"], ENT_QUOTES, 'UTF-8');
$a_loginname = htmlspecialchars($_POST["a_loginname"], ENT_QUOTES, 'UTF-8');
$a_passvorhash = htmlspecialchars($_POST["a_passwort"], ENT_QUOTES, 'UTF-8');
$a_passwort = password_hash($a_passvorhash, PASSWORD_DEFAULT);
$a_sperrung = htmlspecialchars($_POST["a_sperrung"], ENT_QUOTES, 'UTF-8');
$a_zahlart = htmlspecialchars($_POST["a_zahlart"], ENT_QUOTES, 'UTF-8');

//Speichern der Daten von Neu anlegen eines Users im admin bereich
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $asql = "INSERT INTO nutzer (n_admin, n_nname, n_vname, n_strasse, n_ort, n_plz, n_mail, n_login, n_passwort, n_sperre, n_zahlart)
    VALUES ('$a_rechte', '$a_nname', '$a_vname', '$a_strasse', '$a_ort', '$a_plz', '$a_email', '$a_loginname', '$a_passwort', '$a_sperrung', '$a_zahlart' )";
    // use exec() because no results are returned
    $conn->exec($asql);
    //echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $asql . "<br>" . $e->getMessage();
    }

$conn = null;
$_POST['userNeuAnlegen'] =  null;

}
}

// Wenn auf der Seite Bearbeiten user gespeichert wird werden die daten in der Datenbank geseichert/überschrieben
if (isset($_POST['userBearbeiten'])){


    if($_POST['csrf'] !== $_SESSION['csrf_token']) {
        die("Ungültiger Token");
      }
    else{
    $a_rechte = htmlspecialchars($_POST["a_rechte"], ENT_QUOTES, 'UTF-8');
    $a_nname =  htmlspecialchars($_POST["a_nachname"], ENT_QUOTES, 'UTF-8');
    $a_vname = htmlspecialchars($_POST["a_vorname"], ENT_QUOTES, 'UTF-8');
    $a_strasse = htmlspecialchars($_POST["a_strasse"], ENT_QUOTES, 'UTF-8');
    $a_ort = htmlspecialchars($_POST["a_ort"], ENT_QUOTES, 'UTF-8');
    $a_plz = htmlspecialchars($_POST["a_plz"], ENT_QUOTES, 'UTF-8');
    $a_email = htmlspecialchars($_POST["a_email"], ENT_QUOTES, 'UTF-8');
    $a_loginname = htmlspecialchars($_POST["a_loginname"], ENT_QUOTES, 'UTF-8');
    $a_sperrung = htmlspecialchars($_POST["a_sperrung"], ENT_QUOTES, 'UTF-8');
    $a_zahlart = htmlspecialchars($_POST["a_zahlart"], ENT_QUOTES, 'UTF-8');
    
    //Speichern der Daten von Neu anlegen eines Users im admin bereich
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $absql = "UPDATE nutzer SET n_admin=?, n_nname=?, n_vname=?, n_strasse=?, n_ort=?, n_plz=?, n_mail=?, n_login=?, n_sperre=?, n_zahlart=?  WHERE n_id=?";
        $stmt = $conn->prepare($absql);
        $stmt->execute([$a_rechte, $a_nname, $a_vname, $a_strasse, $a_ort, $a_plz, $a_email, $a_loginname, $a_sperrung, $a_zahlart, $_SESSION['adminnutzerwahl']]);
        
        //echo "Datensatz neu hinterlegt";
        }
    catch(PDOException $e)
        {
        echo $absql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
    $_POST['userBearbeiten'] =  null;
    
    }

}

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    

    // Laden der Daten für die ansicht der Kundenliste
    $sqlkundenliste = "SELECT * FROM nutzer WHERE n_admin = 0";

    // Laden der Daten für die ansicht der Adminliste
    $sqladminliste = "SELECT * FROM nutzer WHERE n_admin = 1";

 
//Wenn der nutzer in der Kunden liste auf ansehen klickt wird die kunden id gespeichert zur weiteren verwendung für löschung und ansicht der Datensätze
    if (isset($_GET['adminnutzerwahl'])){

        $sqladminnutzerwahl = "SELECT * FROM nutzer WHERE n_id= ". $_GET['adminnutzerwahl'];
        //Speichern der Kunden Id in die Session variable
        $_SESSION['adminnutzerwahl'] = $_GET['adminnutzerwahl'];
   }
 
   
//Nutzer bearbeiten Füllen der Value in den Fomularfeldern beim bearbeiten
   if (isset($_SESSION['adminnutzerwahl'])){
    $sqladminnutzervaluebefuellen = "SELECT * FROM nutzer WHERE n_id= ". $_SESSION['adminnutzerwahl'];
   }


    //user Datensatz in Admin bereich löschen 
    if (isset($_POST ['nutzerLoeschen'])){


        if($_POST['csrf'] !== $_SESSION['csrf_token']) {
        die("Ungültiger Token");
      }
    else{
        $statement = $conn->prepare("DELETE FROM nutzer WHERE n_id = :id");
        $statement->execute(array('id'=>$_SESSION['adminnutzerwahl']));
        
        $_GET['nutzerLoeschen'] = null;
        }
    }

    //Anzahl der Bestellungen für den einzelenen Nutzer, für die ausgabe auf der Nutzeransichtsseite
    if (isset($_GET['adminnutzerwahl'])||isset($_SESSION['adminnutzerwahl'])){
    $statement1 = $conn->prepare("SELECT COUNT(*) AS anzahl FROM bestellung WHERE n_id = ?");
    $statement1->execute(array($_SESSION['adminnutzerwahl']));  
    $anzeigeBestellungsanzahl = $statement1->fetch();
    //echo "Es wurden ".$anzeigeBestellungsanzahl['anzahl']." Bestellungen gefunden";
    }   
    
    

    /**************************************************************************** */
    //Artikel
    /***************************************************************************** */


    // Laden der Daten für die ansicht der Artikelliste
    $aSqlArtikelListe = "SELECT * FROM artikel";
   


    // Wenn auf der Seite Neu anlegen der submit button gedrückt wird, werden die Farmular inhalte in die datenbank geschickt
    if (isset($_POST['a_button_ArtikelNeuAnlegen'])){

        if($_POST['csrf'] !== $_SESSION['csrf_token']) {
            die("Ungültiger Token");
          }
        else{

    $a_art_name = htmlspecialchars($_POST["a_art_name"], ENT_QUOTES, 'UTF-8');
    $a_kat_bez =  htmlspecialchars($_POST["a_kat_bez"], ENT_QUOTES, 'UTF-8');
    $a_art_preis = htmlspecialchars($_POST["a_art_preis"], ENT_QUOTES, 'UTF-8');
    $a_sale_status = htmlspecialchars($_POST["a_sale_status"], ENT_QUOTES, 'UTF-8');
    $a_sale_preis = htmlspecialchars($_POST["a_sale_preis"], ENT_QUOTES, 'UTF-8');
    $a_art_groesse = htmlspecialchars($_POST["a_art_groesse"], ENT_QUOTES, 'UTF-8');
    $a_art_ort = htmlspecialchars($_POST["a_art_ort"], ENT_QUOTES, 'UTF-8');
    $a_art_farbe = htmlspecialchars($_POST["a_art_farbe"], ENT_QUOTES, 'UTF-8');
    $a_art_pflege = htmlspecialchars($_POST["a_art_pflege"], ENT_QUOTES, 'UTF-8');
    $a_art_text = htmlspecialchars($_POST["a_art_text"], ENT_QUOTES, 'UTF-8');
    $a_art_bild = htmlspecialchars($_POST["a_art_bild"], ENT_QUOTES, 'UTF-8');
    $a_art_stueck = htmlspecialchars($_POST["a_art_stueck"], ENT_QUOTES, 'UTF-8');

    
    //Speichern der Daten von Neu anlegen eines Users im admin bereich
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $asql = "INSERT INTO artikel (art_name, kat_bez, art_preis, sale_status, sale_preis, art_ort, art_farbe, art_pflege, art_text, art_bild, art_groesse, art_stueckzahl)
        VALUES ('$a_art_name', '$a_kat_bez', '$a_art_preis', '$a_sale_status', '$a_sale_preis', '$a_art_ort', '$a_art_farbe', '$a_art_pflege', '$a_art_text', '$a_art_bild' , '$a_art_groesse', '$a_art_stueck')";
        // use exec() because no results are returned
        $conn->exec($asql);
        //echo "New record created successfully";
        }
    catch(PDOException $e)
        {
        echo $asql . "<br>" . $e->getMessage();
        }
    
    }    
   // $conn = null; Verursacht Bug im aufruf der Artikelliste nach neuanlegen von Artikel
    $_POST['a_button_ArtikelNeuAnlegen'] =  null;
    
    }

    // Wenn auf der Seite Bearbeiten Artikel gespeichert wird werden die daten in der Datenbank geseichert/überschrieben
    if (isset($_POST['a_button_ArtikelBearbeiten'])){

        if($_POST['csrf'] !== $_SESSION['csrf_token']) {
            die("Ungültiger Token");
          }
        else{

        $a_art_name = htmlspecialchars($_POST["a_art_name"], ENT_QUOTES, 'UTF-8');
        $a_kat_bez =  htmlspecialchars($_POST["a_kat_bez"], ENT_QUOTES, 'UTF-8');
        $a_art_preis = htmlspecialchars($_POST["a_art_preis"], ENT_QUOTES, 'UTF-8');
        $a_sale_status = htmlspecialchars($_POST["a_sale_status"], ENT_QUOTES, 'UTF-8');
        $a_sale_preis = htmlspecialchars($_POST["a_sale_preis"], ENT_QUOTES, 'UTF-8');
        $a_art_groesse = htmlspecialchars($_POST["a_art_groesse"], ENT_QUOTES, 'UTF-8');
        $a_art_ort = htmlspecialchars($_POST["a_art_ort"], ENT_QUOTES, 'UTF-8');
        $a_art_farbe = htmlspecialchars($_POST["a_art_farbe"], ENT_QUOTES, 'UTF-8');
        $a_art_pflege = htmlspecialchars($_POST["a_art_pflege"], ENT_QUOTES, 'UTF-8');
        $a_art_text = htmlspecialchars($_POST["a_art_text"], ENT_QUOTES, 'UTF-8');
        $a_art_bild = htmlspecialchars($_POST["a_art_bild"], ENT_QUOTES, 'UTF-8');
        $a_art_stueck = htmlspecialchars($_POST["a_art_stueck"], ENT_QUOTES, 'UTF-8');
    
        
        //Speichern der Daten von Bearbeiten eines Artikels im admin bereich
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $asqlbearbeiten = "UPDATE artikel SET art_name=?, kat_bez=?, art_preis=?, sale_status=?, sale_preis=?, art_ort=?, art_farbe=?, art_pflege=?, art_text=?, art_bild=?, art_groesse=?, art_stueckzahl=? WHERE art_id=?";
            $stmt1 = $conn->prepare($asqlbearbeiten);
            $stmt1->execute([$a_art_name, $a_kat_bez, $a_art_preis, $a_sale_status, $a_sale_preis, $a_art_ort, $a_art_farbe, $a_art_pflege, $a_art_text, $a_art_bild , $a_art_groesse, $a_art_stueck, $_SESSION['a_gewaehlterArtikel']]);

           
            //echo "New record created successfully";
            }
        catch(PDOException $e)
            {
            echo $asqlbearbeiten . "<br>" . $e->getMessage();
            }
        
       // $conn = null; Verursacht Bug im aufruf der Artikelliste nach neuanlegen von Artikel
        $_POST['a_button_ArtikelBearbeiten'] =  null;
        
        }
    }


    //Artikel bearbeiten, Füllen der Value in den Fomularfeldern beim bearbeiten
    if (isset($_SESSION['a_gewaehlterArtikel'])){
    $sqlAdminArtikelValueBefuellen = "SELECT * FROM artikel WHERE art_id= ". $_SESSION['a_gewaehlterArtikel'];
   }



    //Wenn Artikel liste auf ansehen klickt wird die Artikel id gespeichert zur weiteren verwendung für löschung und ansicht der Datensätze
    if (isset($_GET['a_gewaehlterArtikel'])){

        $asqlartikelwahl = "SELECT * FROM artikel WHERE art_id= ". $_GET['a_gewaehlterArtikel'];
        //Speichern der Artikel Id in die Session variable
        $_SESSION['a_gewaehlterArtikel'] = $_GET['a_gewaehlterArtikel'];
   }


   //Artikel Datensatz in Admin bereich löschen 
   if (isset($_POST ['artikelLoeschen'])){

    if($_POST['csrf'] !== $_SESSION['csrf_token']) {
        die("Ungültiger Token");
      }
    else{
        
    $statement2 = $conn->prepare("DELETE FROM artikel WHERE art_id = :id");
    $statement2->execute(array('id'=>$_SESSION['a_gewaehlterArtikel']));
    
    $_GET['artikelLoeschen'] = null;
    }
   }

    /*************************************************************************************** */
    //Bestellung
    /******************************************************************************** */

    // Laden der Daten für die ansicht der Bestellungen-liste
    if (isset($_SESSION['adminnutzerwahl'])){
    $asqlBestellungenListe = "SELECT * FROM bestellung WHERE n_id =". $_SESSION['adminnutzerwahl'];
    }

    //Nutzbarmachen der bestellid
    if(isset($_GET['abestellid'])){
        $_SESSION['abestellid'] = $_GET['abestellid'];
    }



    // Laden der Daten für die ansicht der Bestellungs Daten auf der bestellung seite
    if(isset($_SESSION['abestellid'])){
    $a_sqlBestellungAnzeige = "SELECT * FROM bestellung WHERE best_id =". $_SESSION['abestellid'];
    }

    // Laden der Items der Bestellung für die ansicht der Bestellungs Daten auf der bestellung seite
    if(isset($_SESSION['abestellid'])){
    $asqlBestellungsItems = "SELECT * FROM bestellte_artikel WHERE best_id =". $_SESSION['abestellid'];
    }


?>