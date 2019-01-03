/*********************************************************************************************************************** */
//Prüfen ob die felder in Kunden neuanlegen auch alle belegt sind
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

 /*********************************************************************************************************************** */
//Prüfen ob die felder in Kunden bearbeiten auch alle belegt sind
function aBearbeitenPruefe(){
    
     
    if(document.a_user_bearbeiten.a_vorname.value ==""){
        alert ("Bitte Vornamen eingeben!");
        document.a_user_bearbeiten.a_vorname.focus();
        return false;
    }

    if(document.a_user_bearbeiten.a_nachname.value ==""){
        alert ("Bitte Nachnamen eingeben!");
        document.a_user_bearbeiten.a_nachname.focus();
        return false;
    }

    if(document.a_user_bearbeiten.a_strasse.value ==""){
        alert ("Bitte Straße eingeben!");
        document.a_user_bearbeiten.a_strasse.focus();
        return false;
    }

    if(document.a_user_bearbeiten.a_plz.value ==""){
        alert ("Bitte PLZ eingeben!");
        document.a_user_bearbeiten.a_plz.focus();
        return false;
    }

    if(document.a_user_bearbeiten.a_ort.value ==""){
        alert ("Bitte Ort eingeben!");
        document.a_user_bearbeiten.a_ort.focus();
        return false;
    }

    if(document.a_user_bearbeiten.a_loginname.value ==""){
        alert ("Bitte Login Name eingeben!");
        document.a_user_bearbeiten.a_loginname.focus();
        return false;
    }

    if(document.a_user_bearbeiten.a_passwort.value ==""){
        alert ("Bitte Passwort eingeben!");
        document.a_user_bearbeiten.a_passwort.focus();
        return false;
    }

    if(document.a_user_bearbeiten.a_email.value ==""){
        alert ("Bitte Email Adresse eingeben!");
        document.a_user_bearbeiten.a_email.focus();
        return false;
    }

}


/*********************************************************************************************************************** */
//Prüfen ob die felder in Kunden konto bearbeiten auch alle belegt sind
function aBearbKundenkontoPruefe(){
    
     
    if(document.meinKontoBearbeiten.a_vorname.value ==""){
        alert ("Bitte Vornamen eingeben!");
        document.meinKontoBearbeiten.a_vorname.focus();
        return false;
    }

    if(document.meinKontoBearbeiten.a_nachname.value ==""){
        alert ("Bitte Nachnamen eingeben!");
        document.meinKontoBearbeiten.a_nachname.focus();
        return false;
    }

    if(document.meinKontoBearbeiten.a_strasse.value ==""){
        alert ("Bitte Straße eingeben!");
        document.meinKontoBearbeiten.a_strasse.focus();
        return false;
    }

    if(document.meinKontoBearbeiten.a_plz.value ==""){
        alert ("Bitte PLZ eingeben!");
        document.meinKontoBearbeiten.a_plz.focus();
        return false;
    }

    if(document.meinKontoBearbeiten.a_ort.value ==""){
        alert ("Bitte Ort eingeben!");
        document.meinKontoBearbeiten.a_ort.focus();
        return false;
    }

    if(document.meinKontoBearbeiten.a_loginname.value ==""){
        alert ("Bitte Login Name eingeben!");
        document.meinKontoBearbeiten.a_loginname.focus();
        return false;
    }

    if(document.meinKontoBearbeiten.a_email.value ==""){
        alert ("Bitte Email Adresse eingeben!");
        document.meinKontoBearbeiten.a_email.focus();
        return false;
    }

}

 /*********************************************************************************************************************** */
//Prüfen ob die felder in Artikel neu auch alle belegt sind
function aArtikelNeuPruefe(){

    if(document.a_artikel_neu_anlegen.a_art_name.value ==""){
        alert ("Bitte Artikelnamen eingeben!");
        document.a_artikel_neu_anlegen.a_art_name.focus();
        return false;
    }

    if(document.a_artikel_neu_anlegen.a_kat_bez.value =="nichts"){
        alert ("Bitte Kathegorie wählen!");
        document.a_artikel_neu_anlegen.a_kat_bez.focus();
        return false;
    }

    if(document.a_artikel_neu_anlegen.a_art_preis.value ==""){
        alert ("Bitte Preis eingeben!");
        document.a_artikel_neu_anlegen.a_art_preis.focus();
        return false;
    }

    if(document.a_artikel_neu_anlegen.a_art_stueck.value ==""){
        alert ("Bitte Stückzahl eingeben!");
        document.a_artikel_neu_anlegen.a_art_stueck.focus();
        return false;
    }

    if(document.a_artikel_neu_anlegen.a_sale_status.value ==1 && document.a_artikel_neu_anlegen.a_sale_preis.value ==""){
        alert ("Bitte Salepreis eingeben!");
        document.a_artikel_neu_anlegen.a_sale_preis.focus();
        return false;
    }

    if(document.a_artikel_neu_anlegen.a_art_groesse.value ==""){
        alert ("Bitte Größe eingeben!");
        document.a_artikel_neu_anlegen.a_art_groesse.focus();
        return false;
    }

    if(document.a_artikel_neu_anlegen.a_art_ort.value =="nichts"){
        alert ("Bitte Ort wählen!");
        document.a_artikel_neu_anlegen.a_art_ort.focus();
        return false;
    }

    if(document.a_artikel_neu_anlegen.a_art_farbe.value =="nichts"){
        alert ("Bitte die Farbe wählen!");
        document.a_artikel_neu_anlegen.a_art_farbe.focus();
        return false;
    }

    //funktioniert nicht, anderes finden, wird nicht überprüft 
    if(document.a_artikel_neu_anlegen.a_art_pflege.value ==""){
        alert ("Bitte Pflegehinweise hinzufügen!");
        document.a_artikel_neu_anlegen.a_art_pflege.focus();
        return false;
    }

    //funktioniert nicht, anderes finden, wird nicht überprüft
    if(document.a_artikel_neu_anlegen.a_art_text.value ==""){
        alert ("Bitte eine Beschreibung hinzufügen!");
        document.a_artikel_neu_anlegen.a_art_text.focus();
        return false;
    }

    if(document.a_artikel_neu_anlegen.a_art_bild.value ==""){
        alert ("Bitte ein Bildernamen mit Dateiendung hinzufügen!");
        document.a_artikel_neu_anlegen.a_art_bild.focus();
        return false;
    }

}
    /*********************************************************************************************************************** */
//Prüfen ob die felder in Artikel bearbeiten auch alle belegt sind
    function aArtikelBearbeitenPruefe(){
        if(document.a_artikel_bearbeiten.a_art_name.value ==""){
            alert ("Bitte Artikelnamen eingeben!");
            document.a_artikel_bearbeiten.a_art_name.focus();
            return false;
        }
    
        if(document.a_artikel_bearbeiten.a_kat_bez.value =="nichts"){
            alert ("Bitte Kathegorie wählen!");
            document.a_artikel_bearbeiten.a_kat_bez.focus();
            return false;
        }
    
        if(document.a_artikel_bearbeiten.a_art_preis.value ==""){
            alert ("Bitte Preis eingeben!");
            document.a_artikel_bearbeiten.a_art_preis.focus();
            return false;
        }
    
        if(document.a_artikel_bearbeiten.a_art_stueck.value ==""){
            alert ("Bitte Stückzahl eingeben!");
            document.a_artikel_bearbeiten.a_art_stueck.focus();
            return false;
        }
    
        if(document.a_artikel_bearbeiten.a_sale_status.value ==1 && document.a_artikel_bearbeiten.a_sale_preis.value ==""){
            alert ("Bitte Salepreis eingeben!");
            document.a_artikel_bearbeiten.a_sale_preis.focus();
            return false;
        }
    
        if(document.a_artikel_bearbeiten.a_art_groesse.value ==""){
            alert ("Bitte Größe eingeben!");
            document.a_artikel_bearbeiten.a_art_groesse.focus();
            return false;
        }
    
        if(document.a_artikel_bearbeiten.a_art_ort.value =="nichts"){
            alert ("Bitte Ort wählen!");
            document.a_artikel_bearbeiten.a_art_ort.focus();
            return false;
        }
    
        if(document.a_artikel_bearbeiten.a_art_farbe.value =="nichts"){
            alert ("Bitte die Farbe wählen!");
            document.a_artikel_bearbeiten.a_art_farbe.focus();
            return false;
        }
    
        //funktioniert nicht, anderes finden, wird nicht überprüft 
        if(document.a_artikel_bearbeiten.a_art_pflege.value ==""){
            alert ("Bitte Pflegehinweise hinzufügen!");
            document.a_artikel_bearbeiten.a_art_pflege.focus();
            return false;
        }
    
        //funktioniert nicht, anderes finden, wird nicht überprüft
        if(document.a_artikel_bearbeiten.a_art_text.value ==""){
            alert ("Bitte eine Beschreibung hinzufügen!");
            document.a_artikel_bearbeiten.a_art_text.focus();
            return false;
        }
    
        if(document.a_artikel_bearbeiten.a_art_bild.value ==""){
            alert ("Bitte ein Bildernamen mit Dateiendung hinzufügen!");
            document.a_artikel_bearbeiten.a_art_bild.focus();
            return false;
        }
    
    }


    /*********************************************************************************************************************** */
//Prüfen ob die felder in Passwort eingegeben ist
function apasswortPruefe(){
    
     
    if(document.a_userpasswort.a_altesPasswort.value ==""){
        alert ("Bitte altes Passwort eingeben!");
        document.a_userpasswort.a_altesPasswort.focus();
        return false;
    }

    if(document.a_userpasswort.a_neuesPasswort.value ==""){
        alert ("Bitte neues Passwort eingeben!");
        document.a_userpasswort.a_neuesPasswort.focus();
        return false;
    }

}
