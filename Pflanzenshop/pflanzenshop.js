//user login eingabe prüfen
function user_login_pruefe()
{
    if (document.Login.login_name.value == "" || document.Login.login_pass.value == "" )
        {
            alert ("Bitte Passwort und Nutzername eingeben!")
            document.Login.login_name.value.focus();
            return false;
        }
}


//user registrierungs formular eingaben überprüfen
function user_registration_pruefe()
{
    if (document.Registration.user_registrieren_vname.value == "")
        {
            alert ("Bitte Namen eingeben!")
            document.Registration.user_registrieren_vname.focus();
            return false;
        }
    
    if (document.Registration.user_registrieren_nname.value == "")
        {
            alert ("Bitte Namen eingeben!")
            document.Registration.user_registrieren_nname.focus();
            return false;
        }
    
    if (document.Registration.user_registrieren_straße.value == "")
        {
            alert ("Bitte Adresse eingeben!")
            document.Registration.user_registrieren_straße.focus();
            return false;
        }
    
       if (document.Registration.user_registrieren_plz.value == "")
        {
            alert ("Bitte Postleitzahl eingeben!")
            document.Registration.user_registrieren_plz.focus();
            return false;
        }
    
       if (document.Registration.user_registrieren_ort.value == "")
        {
            alert ("Bitte Ort eingeben!")
            document.Registration.user_registrieren_ort.focus();
            return false;
        }
    
    
    if (document.Registration.user_registrieren_login_name.value == "")
        {
            alert ("Bitte geben Sie einen Login Namen an!")
            document.Registration.user_registrieren_login_name.focus();
            return false;
        }
    
    if (document.Registration.user_registrieren_passwort.value == "")
        {
            alert ("Bitte Passwort eingeben!")
            document.Registration.user_registrieren_passwort.focus();
            return false;
        }

   if (document.Registration.user_registrieren_passwort.value.length < 8)


        {
            alert("Das Passwort muss mindestens 8 Zeichen umfassen!")
            document.Registration.user_registrieren_passwort.focus();
            return false;

        
        }
    

        if (document.Registration.user_registrieren_passwort2.value == "")
        {
            alert ("Bitte Passwort wiederholen!")
            document.Registration.user_registrieren_passwort2.focus();
            return false;
        }
    

     if (document.Registration.user_registrieren_passwort2.value !=  document.Registration.user_registrieren_passwort.value)
        {
           /* $pass2 = document.Registration.user_registrieren_passwort2.value;
            
            if ($pass != $pass2) */
            
                alert ("Passwörter stimmen nicht überein!")
            document.Registration.user_registrieren_passwort2.focus();
            return false;
            
        }
        

    
        if (document.Registration.user_registrieren_email.value == "")
            {
            alert ("Bitte  E-Mail-Adresse eingeben!")
            document.Registration.user_registrieren_email.focus();
            return false;
            }
    
        if (document.Registration.user_registrieren_email.value.indexOf("@") == -1)
            {
            alert ("Bitte  gültige E-Mail-Adresse eingeben!")
            document.Registration.user_registrieren_email.focus();
            return false;
            }
    
    else
    {
        return true;
    }
}