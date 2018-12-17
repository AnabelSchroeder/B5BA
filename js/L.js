// Variablen im ganzen Script zur Verfügung stellen
var L_FilterID, L_filterArt, L_filterLabelArray, text, i /*, j*/;

//---------------------------------------------------------------------------ADMINBUTTON---//
/** Adminbutton im Header: sichtbar machen */
function L_showAdminButton() {
  document.getElementById("L_AdminButton").style.visibility = "visible";
}

/** Adminbutton im Header: unsichtbar machen */
function L_hideAdminButton() {
  document.getElementById("L_AdminButton").style.visibility = "hidden";
}
//----------------------------------------------------------------------------------------//

//-----------------------------------------------------------------------------SUCHFELD---//
/**Platzhalter im Suchfeld in Suchbegriff ändern */
function L_suchfeldplatzhalterAendern() {
  var L_suche = document.getElementById("L_ContSuchfeld").value;
  document.getElementById("L_ContSuchfeld").placeholder.value = L_suche;
}

/* Event Keyup Entertaste
document.getElementById("form").addEventListener("keyup", function(event) {
  if (event.which == 13) {
    event.preventDefault();
    let field = event.target;
    if (field.getAttribute("data-index")) {
      let next = document.getElementById(field.getAttribute("data-index"));
      next.focus();
    }
  }
});
*/

//----------------------------------------------------------------------------------------//

//---------------------------------------------------------------FILTER-MENU-FUNKTIONEN---//
/**Blaupause für's Aufklappen der Filterauswahlmenus */
function L_showFilterMenu() {
  text =
    "<span>" +
    L_filterArt +
    "</span>" +
    "<button onClick='L_hide" +
    L_filterArt +
    "FilterMenu()'>" +
    "<img class='L_FilterButtonIcon' src='assets/PH.jpg'>" +
    "</button>" +
    "<div id='L_" +
    L_filterArt +
    "filtermenuanzeige' class='L_FilterMenu'>" +
    "<form action='index.php' method='post' class='L_Filteroption'>";

  //j = i + 1;

  for (i = 0; i < L_filterLabelArray.length; i++) {
    text +=
      "<input type='radio' name='L_Filter" +
      L_filterArt +
      "Auswahl' value='" +
      /*j*/ L_filterLabelArray[i] +
      "'>" +
      "<label>" +
      L_filterLabelArray[i] +
      "</label><br>";
  }
  text +=
    "<button class='L_FilterMenubutton' type='submit' name='" +
    L_filterArt +
    '">Filter anwenden</button>' +
    "</form>" +
    "</div>";

  document.getElementById(L_FilterID).innerHTML = text;
}

/**Blaupause für's zuklappen des Filterauswahlmenus  */
function L_hideFilterMenu() {
  text =
    "<span>" +
    L_filterArt +
    "</span>" +
    "<button onClick='L_show" +
    L_filterArt +
    "FilterMenu()'>" +
    "<img class='L_FilterButtonIcon' src='assets/PH.jpg'>" +
    "</button>";

  document.getElementById(L_FilterID).innerHTML = text;
}

/**Aufklappen des Preis-Filterauswahlmenus */
function L_showPreisFilterMenu() {
  L_FilterID = "L_FilterPreis";
  L_filterArt = "Preis";
  L_filterLabelArray = [
    "bis 10 €",
    "10 bis 20 €",
    "20 bis 30 €",
    "20 bis 30 €",
    "ab 40 €"
  ];

  L_showFilterMenu();
}

/**Zuklappen des Preis-Filterauswahlmenus */
function L_hidePreisFilterMenu() {
  L_FilterID = "L_FilterPreis";
  L_filterArt = "Preis";

  L_hideFilterMenu();
}

/**Aufklappen des Farb-Filterauswahlmenus */
function L_showFarbeFilterMenu() {
  L_FilterID = "L_FilterFarbe";
  L_filterArt = "Farbe";
  L_filterLabelArray = ["gr&uuml;n", "gelb", "weiss"];

  L_showFilterMenu();
}

/**Zuklappen des Farb-Filterauswahlmenus */
function L_hideFarbeFilterMenu() {
  L_FilterID = "L_FilterFarbe";
  L_filterArt = "Farbe";

  L_hideFilterMenu();
}

/**Aufklappen des Kategorie-Filterauswahlmenus */
function L_showKategorieFilterMenu() {
  L_FilterID = "L_FilterKategorie";
  L_filterArt = "Kategorie";
  L_filterLabelArray = ["B&auml;umchen", "Gr&uuml;npflanze", "Blume"];

  L_showFilterMenu();
}

/**Zuklappen des Kategorie-Filterauswahlmenus */
function L_hideKategorieFilterMenu() {
  L_FilterID = "L_FilterKategorie";
  L_filterArt = "Kategorie";

  L_hideFilterMenu();
}

/**Aufklappen des Pflege-Filterauswahlmenus */
function L_showPflegeFilterMenu() {
  L_FilterID = "L_FilterPflege";
  L_filterArt = "Pflege";
  L_filterLabelArray = ["leicht", "mittel", "anspruchsvoll"];

  L_showFilterMenu();
}

/**Zuklappen des Pflege-Filterauswahlmenus */
function L_hidePflegeFilterMenu() {
  L_FilterID = "L_FilterPflege";
  L_filterArt = "Pflege";

  L_hideFilterMenu();
}

/**Aufklappen des Hoehe-Filterauswahlmenus */
function L_showHoeheFilterMenu() {
  L_FilterID = "L_FilterHoehe";
  L_filterArt = "Hoehe";
  L_filterLabelArray = [
    "1 bis 30 cm",
    "30 bis 50 cm",
    "50 bis 80",
    "&uuml;ber 80 cm"
  ];

  L_showFilterMenu();
}

/**Zuklappen des Hoehe-Filterauswahlmenus */
function L_hideHoeheFilterMenu() {
  L_FilterID = "L_FilterHoehe";
  L_filterArt = "Hoehe";

  L_hideFilterMenu();
}

/**Aufklappen des Standort-Filterauswahlmenus */
function L_showStandortFilterMenu() {
  L_FilterID = "L_FilterStandort";
  L_filterArt = "Standort";
  L_filterLabelArray = ["Licht", "Halbschatten", "Schatten"];

  L_showFilterMenu();
}

/**Zuklappen des Standort-Filterauswahlmenus */
function L_hideStandortFilterMenu() {
  L_FilterID = "L_FilterStandort";
  L_filterArt = "Standort";

  L_hideFilterMenu();
}

//----------------------------------------------------------------------------------------//

//----------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------//
console.log(L_FilterID);
