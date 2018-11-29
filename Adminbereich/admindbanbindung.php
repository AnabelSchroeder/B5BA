<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ba_webshop";


// Wenn auf der Seite Neu anlegen der submit button gedrückt wird, werden die Farmular inhalte in die datenbank geschickt
if (isset($_POST['userNeuAnlegen'])){

$a_rechte = $_POST["a_rechte"];
$a_nname =  $_POST["a_nachname"];
$a_vname = $_POST["a_vorname"];
$a_strasse = $_POST["a_strasse"];
$a_ort = $_POST["a_ort"];
$a_plz = $_POST["a_plz"];
$a_email = $_POST["a_email"];
$a_loginname = $_POST["a_loginname"];
$a_passwort = $_POST["a_passwort"];
$a_sperrung = $_POST["a_sperrung"];

//Speichern der Daten von Neu anlegen eines Users im admin bereich
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $asql = "INSERT INTO nutzer (n_admin, n_nname, n_vname, n_strasse, n_ort, n_plz, n_mail, n_login, n_passwort, n_sperre)
    VALUES ('$a_rechte', '$a_nname', '$a_vname', '$a_strasse', '$a_ort', '$a_plz', '$a_email', '$a_loginname', '$a_passwort', '$a_sperrung' )";
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

// Wenn auf der Seite Bearbeiten user gespeichert wird werden die daten in der Datenbank geseichert/überschrieben
if (isset($_POST['userBearbeiten'])){

    $a_rechte = $_POST["a_rechte"];
    $a_nname =  $_POST["a_nachname"];
    $a_vname = $_POST["a_vorname"];
    $a_strasse = $_POST["a_strasse"];
    $a_ort = $_POST["a_ort"];
    $a_plz = $_POST["a_plz"];
    $a_email = $_POST["a_email"];
    $a_loginname = $_POST["a_loginname"];
    $a_passwort = $_POST["a_passwort"];
    $a_sperrung = $_POST["a_sperrung"];
    
    //Speichern der Daten von Neu anlegen eines Users im admin bereich
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $absql = "UPDATE nutzer SET n_admin=?, n_nname=?, n_vname=?, n_strasse=?, n_ort=?, n_plz=?, n_mail=?, n_login=?, n_passwort=?, n_sperre=? WHERE n_id=?";
        $stmt = $conn->prepare($absql);
        $stmt->execute([$a_rechte, $a_nname, $a_vname, $a_strasse, $a_ort, $a_plz, $a_email, $a_loginname, $a_passwort, $a_sperrung, $_SESSION['adminnutzerwahl']]);
        
        //echo "Datensatz neu hinterlegt";
        }
    catch(PDOException $e)
        {
        echo $absql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
    $_POST['userBearbeiten'] =  null;
    
    }



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    

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
        
        $statement = $conn->prepare("DELETE FROM nutzer WHERE n_id = :id");
        $statement->execute(array('id'=>$_SESSION['adminnutzerwahl']));
        
        $_GET['nutzerLoeschen'] = null;
        }


    //Anzahl der Bestellungen für den einzelenen Nutzer, für die ausgabe auf der Nutzeransichtsseite
    if (isset($_GET['adminnutzerwahl'])||isset($_SESSION['adminnutzerwahl'])){
    $statement1 = $conn->prepare("SELECT COUNT(*) AS anzahl FROM bestellung WHERE n_id = ?");
    $statement1->execute(array($_SESSION['adminnutzerwahl']));  
    $anzeigeBestellungsanzahl = $statement1->fetch();
    //echo "Es wurden ".$anzeigeBestellungsanzahl['anzahl']." Bestellungen gefunden";
    }   
    
    

    /******************************************************************************************************************************************************* */
    //Artikel

    // Laden der Daten für die ansicht der Artikelliste
    $aSqlArtikelListe = "SELECT * FROM artikel";
   


    // Wenn auf der Seite Neu anlegen der submit button gedrückt wird, werden die Farmular inhalte in die datenbank geschickt
    if (isset($_POST['a_button_ArtikelNeuAnlegen'])){

    $a_art_name = $_POST["a_art_name"];
    $a_kat_bez =  $_POST["a_kat_bez"];
    $a_art_preis = $_POST["a_art_preis"];
    $a_sale_status = $_POST["a_sale_status"];
    $a_sale_preis = $_POST["a_sale_preis"];
    $a_art_groesse = $_POST["a_art_groesse"];
    $a_art_ort = $_POST["a_art_ort"];
    $a_art_farbe = $_POST["a_art_farbe"];
    $a_art_pflege = $_POST["a_art_pflege"];
    $a_art_text = $_POST["a_art_text"];
    $a_art_bild = $_POST["a_art_bild"];
    $a_art_stueck = $_POST["a_art_stueck"];

    
    //Speichern der Daten von Neu anlegen eines Users im admin bereich
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
    
   // $conn = null; Verursacht Bug im aufruf der Artikelliste nach neuanlegen von Artikel
    $_POST['a_button_ArtikelNeuAnlegen'] =  null;
    
    }

    // Wenn auf der Seite Bearbeiten Artikel gespeichert wird werden die daten in der Datenbank geseichert/überschrieben
    if (isset($_POST['a_button_ArtikelBearbeiten'])){

        $a_art_name = $_POST["a_art_name"];
        $a_kat_bez =  $_POST["a_kat_bez"];
        $a_art_preis = $_POST["a_art_preis"];
        $a_sale_status = $_POST["a_sale_status"];
        $a_sale_preis = $_POST["a_sale_preis"];
        $a_art_groesse = $_POST["a_art_groesse"];
        $a_art_ort = $_POST["a_art_ort"];
        $a_art_farbe = $_POST["a_art_farbe"];
        $a_art_pflege = $_POST["a_art_pflege"];
        $a_art_text = $_POST["a_art_text"];
        $a_art_bild = $_POST["a_art_bild"];
        $a_art_stueck = $_POST["a_art_stueck"];
    
        
        //Speichern der Daten von Bearbeiten eines Artikels im admin bereich
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
        
    $statement2 = $conn->prepare("DELETE FROM artikel WHERE art_id = :id");
    $statement2->execute(array('id'=>$_SESSION['a_gewaehlterArtikel']));
    
    $_GET['artikelLoeschen'] = null;
    }


?>