var L_FilterID,
  L_filterArt,
  /*L_filterLabel1,
  L_filterLabel2,
  L_filterLabel3,
  L_filterLabel4,
  L_filterLabel5,*/
  L_filterLabelArray,
  text,
  i,
  j;

/** Suchfeld im Header: Prüfen, ob un-/sichtbar -> sicht-/unsichtbar machen */
function L_showSearchField() {
  /*var h_suche_sichtbarkeit = document.getElementById("headerSuchfeld").style
    .visibility;

  if (h_suche_sichtbarkeit == "hidden") {
    document.getElementById("headerSuchfeld").style.visibility = "visible";
  } else {
    document.getElementById("headerSuchfeld").style.visibility = "hidden";
  }*/
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

/** Adminbutton im Header: sichtbar machen */
function L_showAdminButton() {
  document.getElementById("L_AdminButton").style.visibility = "visible";
}

/** Adminbutton im Header: unsichtbar machen */
function L_hideAdminButton() {
  document.getElementById("L_AdminButton").style.visibility = "hidden";
}

function L_suchfeldplatzhalterAendern() {
  var L_suche = document.getElementById("L_ContSuchfeld").value;
  document.getElementById("L_ContSuchfeld").placeholder.value = L_suche;
}

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

  j = i + 1;

  for (i = 0; i < L_filterLabelArray.length; i++) {
    text +=
      "<input type='radio' name='L_Filter" +
      L_filterArt +
      "Auswahl' value='" +
      j +
      "'>" +
      "<label>" +
      L_filterLabelArray[i] +
      "</label><br>";
  }
  text +=
    "<button class='L_FilterMenubutton' type='submit'>Filter anwenden</button>" +
    "</form>" +
    "</div>";

  document.getElementById(L_FilterID).innerHTML = text;
}

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

function L_hidePreisFilterMenu() {
  L_FilterID = "L_FilterPreis";
  L_filterArt = "Preis";

  L_hideFilterMenu();
}

function L_showFarbeFilterMenu() {
  L_FilterID = "L_FilterFarbe";
  L_filterArt = "Farbe";
  L_filterLabelArray = ["grün", "gelb", "weiss"];

  L_showFilterMenu();
}

function L_hideFarbeFilterMenu() {
  L_FilterID = "L_FilterFarbe";
  L_filterArt = "Farbe";

  L_hideFilterMenu();
}

function L_showKategorieFilterMenu() {
  L_FilterID = "L_FilterKategorie";
  L_filterArt = "Kategorie";
  L_filterLabelArray = ["B&auml;umchen", "Gr&uuml;npflanze", "Blume"];

  L_showFilterMenu();
}

function L_hideKategorieFilterMenu() {
  L_FilterID = "L_FilterKategorie";
  L_filterArt = "Kategorie";

  L_hideFilterMenu();
}

function L_showPflegeFilterMenu() {
  L_FilterID = "L_FilterPflege";
  L_filterArt = "Pflege";
  L_filterLabelArray = ["leicht", "mittel", "anspruchsvoll"];

  L_showFilterMenu();
}

function L_hidePflegeFilterMenu() {
  L_FilterID = "L_FilterPflege";
  L_filterArt = "Pflege";

  L_hideFilterMenu();
}

function L_showHoeheFilterMenu() {
  L_FilterID = "L_FilterHoehe";
  L_filterArt = "Hoehe";
  L_filterLabelArray = [
    "1 bis 30 cm",
    "30 bis 50 cm",
    "50 bis 80",
    "u&uuml;ber 80 cm"
  ];

  L_showFilterMenu();
}

function L_hideHoeheFilterMenu() {
  L_FilterID = "L_FilterHoehe";
  L_filterArt = "Hoehe";

  L_hideFilterMenu();
}

function L_showStandortFilterMenu() {
  L_FilterID = "L_FilterStandort";
  L_filterArt = "Standort";
  L_filterLabelArray = ["Licht", "Halbschatten", "Schatten"];

  L_showFilterMenu();
}

function L_hideStandortFilterMenu() {
  L_FilterID = "L_FilterStandort";
  L_filterArt = "Standort";

  L_hideFilterMenu();
}

console.log(L_FilterID);
