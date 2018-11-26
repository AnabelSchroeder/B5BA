<?php
/*******************************************************************************************************
 * Loginseite
 **********************************************************************************************/
 if ($seitenid == "login")
{


// login

   
echo "header";

//linker container (login)
echo "<div class=\"user_login_bg\">";
    echo "<div class=\"user_login_container\">";
    echo "<form action=\"index.php\"  name=\"Login\" onsubmit=\"return user_login_pruefe()\" method=\"POST\">";
    echo "<div class=\"user_login_div\">";
        echo "<div class=\"user_login_div_headleiste_l\"> Login </div>";
    
        echo "<div class=\"user_login_div_links\">";
        
        echo "Benutzer <input class=\"user_login_form\" type=\"text\" name=\"login_name\" placeholder=\"Nutzername\"> <br>";
        echo "Passwort <input class=\"user_login_form\" type=\"text\" name=\"login_pass\" placeholder=\"Passwort\"> <br>";
        echo "<input class=\"button1\" name=\"user_login\"  type=\"submit\" value=\"Login\" \">";
    echo "</form>";
        echo "</div>";
    echo "</div>";

//rechter container (registrieren)
 echo "<div class=\"user_login_div\">";
echo "<div class=\"user_login_div_headleiste_r\"> Konto erstellen </div>";
    echo"<form action=\"index.php?Seiten_ID=login\"  name=\"Login\" method=\"GET\">";
        echo "<div class=\"user_login_div_rechts\">";
        
        echo "Du hast noch kein Konto bei uns? <br> <br>";
        echo "Dann Melde dich einfach an!";
        echo "<button name=\"Seiten_ID\" class=\"button1\"  type=\"submit\" value=\"user_registration\"> Jetzt registrieren </button> <br>";
           
        echo "</div>";
        echo "<div class=\"clear\"> </div>";
    echo "</form>";
echo "</div>";
echo "<div>";
    
}

?>