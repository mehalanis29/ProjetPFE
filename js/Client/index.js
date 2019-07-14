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
function LoadVille(id) {
  var xhttp = new XMLHttpRequest();
  document.getElementById("ville").innerHTML="";
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var list =JSON.parse(this.responseText);
        var s="<option value=\"\">ALL Ville</option>";
        for(var i=0;i<list.length;i++){
          s+="<option value=\""+list[i].id+"\" >"+list[i].nom+"</option>";
        }
        if(list.length>0){
          document.getElementById("ville").innerHTML=s;
          document.getElementById("ville").options[0].defaultSelected=true;
        }
    }
  };
  xhttp.open("GET", "php/Client/VilleJson.php?pays_id="+id, false);
  xhttp.send();
}