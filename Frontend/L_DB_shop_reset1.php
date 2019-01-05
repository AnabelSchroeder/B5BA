<?php

///////////////////////////////////////
// DBanbindung des Webshops (BA WS 18/19) //
// Ersteller: Lisa Peters //
///////////////////////////////////////
/*
global $servername, $username, $passwort, $dbname;

$servername = "localhost";
$username = "root";
$passwort = "root";
$dbname = "BA_webshop"; //in ba_webshop ändern bei zusammenführung

//$port = 8889;

//$link = mysqli_init();
//$success = mysqli_real_connect($link, $servername, $username, $passwort, $dbname, $port);

$verbinde = mysqli_connect($servername, $username, $passwort);
$connmysql = mysqli_select_db($verbinde, $dbname);
*/
if (isset ($_POST["L_resetFilter"])){
   /*
    $_POST["L_FilterPreis"] = NULL;
    $_POST["L_FilterFarbe"] = NULL;
    $_POST["L_FilterKategorie"] = NULL;
    $_POST["L_FilterPflege"] = NULL;
    $_POST["L_FilterHoehe"] = NULL;
    $_POST["L_FilterStandort"] = NULL;
    */

    unset($_POST["L_FilterPreis"]);
    unset($_POST["L_FilterFarbe"]);
    unset($_POST["L_FilterKategorie"]);
    unset($_POST["L_FilterPflege"]);
   // unset($_POST["L_FilterHoehe"]);
    //unset($_POST["L_FilterStandort"]);

    $_SESSION["L_filterFarbe"] = null;
    $_SESSION["L_filterKategorie"] = null;
    $_SESSION["L_filterPflege"] = null;
    $_SESSION["L_filterStandort"] = null;
   // $_SESSION["L_filterPreis"] = null;
    //$_SESSION['L_filterHoehe'] = null;

    unset($_POST["L_resetFilter"]);
}
//???????????????????????????????????????????????

?>