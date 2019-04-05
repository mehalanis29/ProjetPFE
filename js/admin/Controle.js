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
  var s="<option value=''>---list--</option>";
  for(var i=0;i<list.List.length;i++){
    s+="<option value=\""+list.List[i].id+"\" >"+list.List[i].nom+"</option>";
  }
  if(list.List.length>0){
    document.getElementById(nom).innerHTML=s;
    document.getElementById(nom).options[0].defaultSelected=true;
  }
}
