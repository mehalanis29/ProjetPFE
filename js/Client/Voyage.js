var list;
function LoadDate(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      window.list =JSON.parse(this.responseText);
       AfficheDate();
       AffichePrix(window.list[0]["voyage_date_id"]);
    }
  };
  xhttp.open("GET", "php/Client/VoyageJSON.php?voyage_id="+id, false);
  xhttp.send();
}

function AfficheDate(){
  var select_prix =document.getElementById("table_date_prix");
  var select_recerve =document.getElementById("text_reserve");
  var text_prix="";
  var text_reserve="";
  for(var i=0;i<list.length;i++){
    text_prix+="<option value=\""+window.list[i]["voyage_date_id"]+"\">"+window.list[i]["date_depart"]+"</option>";
    text_reserve+="<option value=\""+window.list[i]["voyage_date_id"]+"\">Du "+window.list[i]["date_depart"]+" Au "+
    window.list[i]["date_retour"]+"</option>";
  }
  select_prix.innerHTML=text_prix;
  select_recerve.innerHTML=text_reserve;
}
function AffichePrix(id){
  var list_prix=document.getElementsByClassName('prix');
  var id_s=-1;
  for(var i=0;i<list.length;i++){
    if(window.list[i]["voyage_date_id"]==id){id_s=i;}
  }
  list_prix[0].innerHTML=window.list[id_s]["prix_A_S"]+" DA"
  list_prix[1].innerHTML=window.list[id_s]["prix_A_D"]+" DA"
  list_prix[2].innerHTML=window.list[id_s]["prix_A_T"]+" DA"
  list_prix[3].innerHTML=window.list[id_s]["prix_E"]+" DA"
  list_prix[4].innerHTML=window.list[id_s]["prix_B"]+" DA"
}
function lengthListImage() {
  return document.getElementsByClassName('photo_de_voyage').length;
}
function plusphoto() {
  window.i=(window.i+1) % lengthListImage();
  AfficheImage();
}
function moinsphoto() {
  window.i=(window.i-1) % lengthListImage();
  if(window.i<0){window.i=lengthListImage()-1;}
  AfficheImage();
}
function AfficheImage() {
  var listimage=document.getElementsByClassName('photo_de_voyage');
  for(var i=0;i<listimage.length;i++){
    listimage[i].style.display="none";
  }
  listimage[window.i].style.display="block";
}
function RemoveChambre(x) {
  window.x--;
  document.getElementById("remove_"+x).innerHTML="";
  document.getElementById("remove_"+x).className ="";
  document.getElementById("remove_"+x).id="";
}
function InitNumChambre(){
  var list_div=document.getElementsByClassName("list_div");
  var list_btn=document.getElementsByClassName("btn_remove");
  var list_nom=document.getElementsByClassName("Nom_chambre");
  for(var i=0;i<list_div.length;i++){
    list_div[i].id="remove_"+parseInt(i+2);
    list_btn[i].id=i+2;
    list_nom[i].innerHTML="Chambre "+parseInt(i+2);
  }
}

$(document).ready(function(){
  $("#AjouterChambre").click(function(){
    $("#list_chambre").append(document.getElementById("chambre").innerHTML);
    InitNumChambre();
  });
  $(document).on('click','.btn_remove', function(){
    $("#remove_"+$(this).attr('id')+'').remove();
    InitNumChambre();
  });
});
