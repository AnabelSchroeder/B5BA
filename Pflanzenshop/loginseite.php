<?php
/*******************************************************************************************************
 * Loginseite
 **********************************************************************************************/
 if ($seitenid == "login")
{
    //sql controller inkludieren
    include ("login_controller.php");



//linker container (login)///////////////////////////////////////////////////////////////////////
echo "<div class=\"user_login_bg\">";
    echo "<div class=\"user_login_container\">";

//Formular//////////////////////////////////////////////////////////////////////////////////////
// seitenweiterleitung:
//zum user-konto
/*if(isset($POST['zu_user_seite']))
{
    echo "<form action=\"index.php?Seiten_ID=Adminbereich\" method=\"POST\">";
}

//zur kasse
else
{*/
    echo "<form  name=\"Login\"  method=\"POST\">";
//}
   
    echo "<div class=\"user_login_div\">";
        echo "<div class=\"user_login_div_headleiste_l\"> Login </div>";
    
        echo "<div class=\"user_login_div_links\">";
//eventuelle fehlermeldungen zum Loginversuch////////////////////////////////////////////////////
       if(isset($B_Fehler))
        {
            echo "<span class=\"fehler\">$B_Fehler</span>";
            echo"<br>";
        } 

        if(isset($B_Fehler2))
        {
            echo "<span class=\"fehler\">$B_Fehler2</span>";
            echo "<br>";
        }

    
//Eingabefelder//////////////////////////////////////////////////////////////////////////////////////////////        
        echo "Benutzer <input class=\"user_login_form\" type=\"text\" name=\"login_name\" placeholder=\"Nutzername\"> <br>";
        echo "Passwort <input class=\"user_login_form\" type=\"password\" name=\"login_pass\" placeholder=\"Passwort\"> <br>";
 
        
//button zum Absenden und Seitenweiterleitung

        echo "<button class=\"button1\" id=\"user_login\" name=\"user_login\"  type=\"submit\"  onclick=\"return user_login_pruefe()\" value=\"Login\"> Login </button>";

      
        //recaptcha/////////////////////////////////////////////////////////////////////////////////
        if(isset ($captcha))
        {
        echo "<div class=\"g-recaptcha\" data-sitekey=\"6LdQDIYUAAAAAB6fzeSQAOSCKlwajln6d_B6dI4L\"></div>";
        }
    echo "</form>";
        echo "</div>";
    echo "</div>";



/******************************************************************************************** */
// Login: registrieren
/********************************************************************************************* */

//rechter container (registrieren)/////////////////////////////////////////////////////////////////////////////////
 echo "<div class=\"user_login_div\">";
echo "<div class=\"user_login_div_headleiste_r\"> Konto erstellen </div>";
    echo"<form action=\"index.php?Seiten_ID=login\"  name=\"Login\" method=\"GET\">";
        echo "<div class=\"user_login_div_rechts\">";
        
        echo "Du hast noch kein Konto bei uns? <br> <br>";
        echo "Dann Melde dich einfach an!";

//button zum registrieren (Seitenweiterleitung)////////////////////////////////////////////////////////////
        echo "<button name=\"Seiten_ID\" class=\"button1\"  type=\"submit\" value=\"user_registration\"> Jetzt registrieren </button> <br>";
           
        echo "</div>";
        echo "<div class=\"clear\"> </div>";
    echo "</form>";
echo "</div>";
echo "<div>";
    
}

?>