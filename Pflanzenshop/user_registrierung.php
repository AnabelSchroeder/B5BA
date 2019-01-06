<?php
/******************************************************************************************** */
// User Registrierung
/********************************************************************************************* */
 if ($seitenid == "user_registration")
{
    //Datenbank einbinden
$host = "localhost";
$user = "root";
$pass = "";
$dbase = "ba_webshop";

$verbinde = mysqli_connect($host,$user,$pass);
$con = mysqli_select_db($verbinde,$dbase);

//registrieren///////////////////////////////////////////////////////////////////////////
//controller für sql includieren
include "registrierung_controller.php";

//Seitenaufbau
//div container gerüst
echo "<div class=\"user_login_bg\">";
    echo "<div class=\"user_registration_div\">";
     echo "<div class=\"user_registration_headleiste\"> </div>";

// formular///////////////////////////////////////////////////////////////////////
    echo "<div class=\"user_registration_form\">";
        echo "<form method=\"POST\"  action=\"#\" name=\"Registration\">";
    
        echo "<table>";

/******************************************************************************************** */
// Fehler: nutzername vergeben: Formularfelder wieder befüllen und loginname clearen
/********************************************************************************************* */

if(isset($R_Fehler))
{
    //Namensfelder /////////////////////////////////////////////////////////////////////////
    echo "<tr>";
    echo "<td>Vorname</td>";
    echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_vname\" value=\"".$_POST['user_registrieren_vname']."\"> </td>";
echo "</tr>";

echo "<tr>";
     echo "<td> Nachname </td>";
     echo "<td><input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_nname\" value=\"".$_POST['user_registrieren_nname']."\"> </td>";
echo "</td>";
//Adresse///////////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
    echo "<td>Straße </td>";
    echo "<td><input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_strasse\" value=\"".$_POST['user_registrieren_strasse']."\"> </td>";
echo "</tr>";

echo "<tr>";
    echo "<td>PLZ, Ort </td>";
    echo "<td> <input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_plz\" value=\"".$_POST['user_registrieren_plz']."\" pattern=\"[0-9]{5}\"> 
    <input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_ort\" value=\"".$_POST['user_registrieren_ort']."\"></td>";
echo "</tr>";
//zahlart////////////////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
    echo "<td>Zahlungsart </td>";
    echo "<td><select class=\"user_login_form\"name=\"user_registrieren_zahlart\">";


//Vorbelegung der gewählten Zahlungsart///////////////////////////////////////////////////////////////
    //Vorkasse
    if ($_POST['user_registrieren_zahlart']== "Vorkasse")
    {
      echo"<option selected> Vorkasse </option>
        <option> Rechnung </option>
        <option> Pay Pal</option>
        <option> Lastschrift </option>";
    }
    //Rechnung
    else if ($_POST['user_registrieren_zahlart']=="Rechnung")
    {
      echo"<option > Vorkasse </option>
        <option selected> Rechnung </option>
        <option> Pay Pal</option>
        <option> Lastschrift </option>";
    }

       //Pay Pal
       else if ($_POST['user_registrieren_zahlart']=="Pay Pal")
       {
         echo"<option > Vorkasse </option>
           <option > Rechnung </option>
           <option selected> Pay Pal</option>
           <option> Lastschrift </option>";
       }

        //Lastschrift
        else if ($_POST['user_registrieren_zahlart']=="Lastschrift")
        {
          echo"<option > Vorkasse </option>
            <option > Rechnung </option>
            <option > Pay Pal</option>
            <option selected> Lastschrift </option>";
        }
  echo"</select> </td>";
echo "</tr>";

echo "<tr> <td></td></tr>";

//logindaten//////////////////////////////////////////////////////////////////////////////////////////////
//fehlerausgabe
     echo "<span class=\"fehler\">$R_Fehler</span>";
    echo"<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////
    echo "<tr>";
    echo "<td>Login Name</td>";
    echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_login_name\"> </td>";
echo "</tr>";

echo "<tr>";
    echo "<td> Passwort</td>";
    echo "<td><input class=\"user_login_form\" type=\"password\" name=\"user_registrieren_passwort\" min-length=\"8\" value=\"".$_POST['user_registrieren_passwort']."\" pattern=\"(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}\"> </td>";
echo "</tr>";

echo "<tr>";
    echo "<td>Passwort wiederholen</td>";
    echo "<td><input class=\"user_login_form\" type=\"password\" name=\"user_registrieren_passwort2\" min-length=\"8\" value=\"".$_POST['user_registrieren_passwort2']."\"> </td>";
echo "</tr>";
//mail//////////////////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
    echo "<td> E-Mail </td>";
    echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_mail\" value=\"".$_POST['user_registrieren_mail']."\" pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$\"> </td>";
echo "</tr>";

    
} 

/******************************************************************************************** */
// Registrierung: normaler seitenaufruf
/********************************************************************************************* */
else{
     //Namensfelder //////////////////////////////////////////////////////////////////// 
            echo "<tr>";
                echo "<td>Vorname</td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_vname\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                 echo "<td> Nachname </td>";
                 echo "<td><input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_nname\"> </td>";
            echo "</td>";
    //Adresse/////////////////////////////////////////////////////////////////////////////
            echo "<tr>";
                echo "<td>Straße </td>";
                echo "<td><input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_strasse\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                echo "<td>PLZ, Ort </td>";
                echo "<td> <input class=\"user_login_form\"type=\"text\" name=\"user_registrieren_plz\" pattern=\"[0-9]{5}\"> 
                <input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_ort\"></td>";
            echo "</tr>";
    //zahlart///////////////////////////////////////////////////////////////////////////////
            echo "<tr>";
                echo "<td>Zahlungsart </td>";
                echo "<td><select class=\"user_login_form\"name=\"user_registrieren_zahlart\">
                <option> Vorkasse </option>
                <option> Rechnung </option>
                <option> Pay Pal</option>
                <option> Lastschrift </option>
                </select> </td>";
            echo "</tr>";
          
            echo "<tr> <td></td></tr>";
            
    //logindaten
///////////////////////////////////////////////////////////////////////////////////////////////////

            echo "<tr>";
                echo "<td>Login Name</td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_login_name\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                echo "<td> Passwort <br><span class=\"kasse_rechts_klein\"> mind. 8 Zeichen, 1 Ziffer, 1 Gro&szlig;- u. 1 Kleinbuchstabe </span> </td>";
                echo "<td><input class=\"user_login_form\" type=\"password\" name=\"user_registrieren_passwort\" min-length=\"8\" pattern=\"(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}\"> </td>";
            echo "</tr>";
    
            echo "<tr>";
                echo "<td>Passwort wiederholen</td>";
                echo "<td><input class=\"user_login_form\" type=\"password\" name=\"user_registrieren_passwort2\" min-length=\"8\"> </td>";
            echo "</tr>";
    //mail////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<tr>";
                echo "<td> E-Mail </td>";
                echo "<td><input class=\"user_login_form\" type=\"text\" name=\"user_registrieren_mail\" pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$\"> </td>";
            echo "</tr>";
}
            echo "</table>";
 // Button zum Formular senden /////////////////////////////////////////////////////////////////////////////          
            echo"<input class=\"button1\" onclick=\"return user_registration_pruefe()\" type=\"submit\" name=\"user_registration_speichern\" value=\"Speichern\">";
            echo "</form>";

            // Button abbrechen
            echo "<form method=\"GET\" action=\"index.php?Seiten_ID=login\">";
            echo "<button type=\"submit\" name=\"Seiten_ID\" value=\"login\" class=\"button2\"> Abbrechen </button>";
            echo "</form>";


            echo"</div>";
echo "</div>";
echo "</div>";

}
?>