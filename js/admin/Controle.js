function VerifieNom() {
  var nom=document.getElementById("nom");
  if(nom.value==""){
    return false;
  }
  return true;
}
function LoadVille(id) {
  var xhttp = new XMLHttpRequest();
  document.getElementById("ville").innerHTML="";
  document.getElementById("hotel").innerHTML="";
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var list =JSON.parse(this.responseText);
        Affiche(list,"ville")
    }
  };
  xhttp.open("GET", "../php/Admin/VilleJSON.php?idVille="+id, false);
  xhttp.send();
}
function LoadHotel(id) {
  var xhttp = new XMLHttpRequest();
  document.getElementById("hotel").innerHTML="";
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var list =JSON.parse(this.responseText);
        Affiche(list,"hotel");
    }
  };
  xhttp.open("GET", "../php/Admin/HotelJSON.php?idHotel="+id, false);
  xhttp.send();
}
function  Affiche(list,nom) {
  var s="<option value=''>Ville</option>";
  for(var i=0;i<list.List.length;i++){
    s+="<option value=\""+list.List[i].id+"\" >"+list.List[i].nom+"</option>";
  }
  if(list.List.length>0){
    document.getElementById(nom).innerHTML=s;
    document.getElementById(nom).options[0].defaultSelected=true;
  }
}
function SelecteAll() {
  var list=document.getElementsByClassName('remove_list');
  var bool=document.getElementById("checkbox_all").checked;
  for(var i=0; i<list.length;i++){
    list[i].checked=bool;
  }
}
function Tab(nom) {
  var list_label=document.getElementsByClassName("nav_tab_item");
  var list_div=document.getElementsByClassName("nav_tab_div");
  for (var i = 0; i < list_label.length; i++) {
  list_label[i].className="nav_tab_item ";
}
for (var i = 0; i < list_div.length; i++) {
  list_div[i].className="nav_tab_div ";
}
document.getElementById(nom+"_label").className+="nav_tab_item_active";
document.getElementById(nom+"_div").className+="nav_tab_div_active";
}
