function aNeuPruefe(){
    
    if(document.a_neu_anlegen.a_vorname.value ==""){
        alert ("Bitte Vornamen eingeben!");
        document.a_neu_anlegen.a_vorname.focus();
        return false;
    }

    if(document.a_neu_anlegen.a_nachname.value ==""){
        alert ("Bitte Nachnamen eingeben!");
        document.a_neu_anlegen.a_nachname.focus();
        return false;
    }

    if(document.a_neu_anlegen.a_strasse.value ==""){
        alert ("Bitte Straße eingeben!");
        document.a_neu_anlegen.a_strasse.focus();
        return false;
    }

    if(document.a_neu_anlegen.a_plz.value ==""){
        alert ("Bitte PLZ eingeben!");
        document.a_neu_anlegen.a_plz.focus();
        return false;
    }

    if(document.a_neu_anlegen.a_ort.value ==""){
        alert ("Bitte Ort eingeben!");
        document.a_neu_anlegen.a_ort.focus();
        return false;
    }

    if(document.a_neu_anlegen.a_loginname.value ==""){
        alert ("Bitte Login Name eingeben!");
        document.a_neu_anlegen.a_loginname.focus();
        return false;
    }

    if(document.a_neu_anlegen.a_passwort.value ==""){
        alert ("Bitte Passwort eingeben!");
        document.a_neu_anlegen.a_passwort.focus();
        return false;
    }

    if(document.a_neu_anlegen.a_email.value ==""){
        alert ("Bitte Email Adresse eingeben!");
        document.a_neu_anlegen.a_email.focus();
        return false;
    }

}