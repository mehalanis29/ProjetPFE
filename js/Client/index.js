function change(x) {
  var btn=document.getElementsByClassName("nav_bar_from_titre_choix");
  var form=document.getElementsByClassName("nav_bar_div_form");
  for (var i = 0; i < btn.length; i++) {
    btn[i].className="nav_bar_from_titre_choix";
  }
  for (var i = 0; i < btn.length; i++) {
    form[i].className="nav_bar_div_form";
  }
  document.getElementById(x+"_btn").className="nav_bar_from_titre_choix nav_bar_from_titre_choix_active";
  document.getElementById(x+"_form").className="nav_bar_div_form nav_bar_div_form_activ";
}
