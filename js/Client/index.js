function change(item) {
  var btn=document.getElementsByClassName("nav_bar_from_titre_choix");
  var form=document.getElementsByClassName("nav_bar_div_form");
  for (var i = 0; i < btn.length; i++) {
    btn[i].className="nav_bar_from_titre_choix";
  }
  for (var i = 0; i < btn.length; i++) {
    form[i].className="nav_bar_div_form";
  }
  document.getElementById(item+"_btn").className+=" nav_bar_from_titre_choix_active";
  document.getElementById(item+"_form").className+=" nav_bar_div_form_activ";
}
