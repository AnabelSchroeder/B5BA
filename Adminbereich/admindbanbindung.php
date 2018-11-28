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
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $asql . "<br>" . $e->getMessage();
    }

$conn = null;
$_POST['userNeuAnlegen'] =  null;

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
   

    //user Datensatz in Admin bereich löschen 
    if (isset($_POST ['nutzerLoeschen'])){
        
        $statement = $conn->prepare("DELETE FROM nutzer WHERE n_id = :id");
        $statement->execute(array('id'=>$_SESSION['adminnutzerwahl']));
        
        $_GET['nutzerLoeschen'] = null;
        }


    //Anzahl der Bestellungen für den einzelenen Nutzer, für die ausgabe auf der Nutzeransichtsseite
    if (isset($_GET['adminnutzerwahl'])){
    $statement1 = $conn->prepare("SELECT COUNT(*) AS anzahl FROM bestellung WHERE n_id = ?");
    $statement1->execute(array($_SESSION['adminnutzerwahl']));  
    $anzeigeBestellungsanzahl = $statement1->fetch();
    //echo "Es wurden ".$anzeigeBestellungsanzahl['anzahl']." Bestellungen gefunden";
    }       

?>