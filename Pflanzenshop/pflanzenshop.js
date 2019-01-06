//KASSE

//////////////////////////////////////////
//kasse 1: sperren bei sperre
function kasse_sperren()
{
    alert("Achtung: Sie sind gesperrt. Derzeit ist keine Bestellung möglich.");
   document.getElementById('kasse_1_weiter').className='kasse_button_weiter_disabled';
   document.getElementById('kasse_1_weiter').disabled=true;
} 
///////////////////////////////////////////////////////////////////////////
//kasse 3: bestell-button enablen, wenn AGB akzeptiert
function clickbar()
    {
        if (document.getElementById('AGB_check').checked==true)
        {
        document.getElementById('kasse3_bestellen').className='kasse_button_weiter';
        document.getElementById('kasse3_bestellen').disabled=false;
        }
        else 
        {
            document.getElementById('kasse3_bestellen').className='kasse_button_weiter_disabled';
            document.getElementById('kasse3_bestellen').disabled=true;
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////

//LOGIN
////////////////////////////////////////////////////////////////////////////////////////////
//login button disablen, wenn loginversuche verbraucht
function login_sperren()
{
    document.getElementById('user_login').className='kasse_button_weiter_disabled';
    document.getElementById('user_login').disabled=true;
    
}
//REGISTRIERUNG

/////////////////////////////////////////////////////////////////////////////////////////////////
//user registrierungs formular eingaben überprüfen
function user_registration_pruefe()
{
    //Name
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
    //Adresse
    if (document.Registration.user_registrieren_strasse.value == "")
        {
            alert ("Bitte Adresse eingeben!")
            document.Registration.user_registrieren_strasse.focus();
            return false;
        }
    
      if (document.Registration.user_registrieren_plz.value == "" || 
      document.Registration.user_registrieren_plz.value <10000 ||
       document.Registration.user_registrieren_plz.value> 99999)
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
    
    //logindaten
    if (document.Registration.user_registrieren_login_name.value == "")
        {
            alert ("Bitte geben Sie einen Login Namen an!")
            document.Registration.user_registrieren_login_name.focus();
            return false;
        }
    //Passwort
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
    
        // Passwort Wiederholung
        if (document.Registration.user_registrieren_passwort2.value == "")
        {
            alert ("Bitte Passwort wiederholen!")
            document.Registration.user_registrieren_passwort2.focus();
            return false;
        }
    

     if (document.Registration.user_registrieren_passwort2.value !=  document.Registration.user_registrieren_passwort.value)
        {
        alert ("Passwörter stimmen nicht überein!")
            document.Registration.user_registrieren_passwort2.focus();
            return false;
            
        }
        

    //Mail
       if (document.Registration.user_registrieren_mail.value == "")
            {
            alert ("Bitte  E-Mail-Adresse eingeben!")
            document.Registration.user_registrieren_mail.focus();
            return false;
            }
    
       if (document.Registration.user_registrieren_mail.value.indexOf("@") == -1)
            {
            alert ("Bitte  gültige E-Mail-Adresse eingeben!")
            document.Registration.user_registrieren_mail.focus();
            return false;
            }
    
    else
    {
        return true;
    }
}



//////////////////////////////////////////////////////////////////////

//bei bereits vergebenem loginnamen das feld clearen
/*function clear_loginname ()
{
    document.Registration.user_registrieren_login_name.value == "");
        
            alert ("Dieser Loginname ist bereits vergeben!")
            document.Registration.user_registrieren_login_name.focus();
            return false;
        
}
*/

