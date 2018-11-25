/** Suchfeld im Header: Prüfen, ob un-/sichtbar -> sicht-/unsichtbar machen */
function L_showSearchField() {
  var h_suche_sichtbarkeit = document.getElementById("headerSuchfeld").style
    .visibility;

  if (h_suche_sichtbarkeit == "hidden") {
    document.getElementById("headerSuchfeld").style.visibility = "visible";
  } else {
    document.getElementById("headerSuchfeld").style.visibility = "hidden";
  }
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
