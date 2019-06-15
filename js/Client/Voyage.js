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
  var num_chambre=document.getElementsByClassName("num_chambre");
  var list_div=document.getElementsByClassName("list_div");
  var list_btn=document.getElementsByClassName("btn_remove");
  var list_nom=document.getElementsByClassName("Nom_chambre");
  var list_select=document.getElementsByClassName("list_select");
  var list_minus=document.getElementsByClassName("list_minus");
  var list_plus=document.getElementsByClassName("list_plus");
  var list_input=document.getElementsByClassName("list_input");
  var j=-1;
  var list=["adulte","enfant","bebe"];
  for(var i=0;i<list_div.length;i++){
    num_chambre[i].value=parseInt(i+2);
    list_div[i].id="remove_"+parseInt(i+2);
    list_btn[i].id=parseInt(i+2)
    list_nom[i].innerHTML="Chambre "+parseInt(i+2)
    list_select[i].id="select_row_"+parseInt(i+2)
    list_select[i].onchange=function(){InitChambre(i);}
      j++;
    list_input[j].className="list_input nbr_personne_row_"+parseInt(i+2);
    list_input[j].id="btn_"+list[0]+"_row_"+parseInt(i+2);
    list_minus[j].onclick=function(){BtnMoinsChambre(i,list[0])}
    list_plus[j].onclick=function(){BtnPlusChambre(i,list[0])}
      j++;
    list_input[j].className="list_input nbr_personne_row_"+parseInt(i+2);
    list_input[j].id="btn_"+list[1]+"_row_"+parseInt(i+2);
    list_minus[j].onclick=function(){BtnMoinsChambre(i,list[1])}
    list_plus[j].onclick=function(){BtnPlusChambre(i,list[1])}
    j++;
    list_input[j].className="list_input nbr_personne_row_"+parseInt(i+2);
    list_input[j].id="btn_"+list[2]+"_row_"+parseInt(i+2);
    list_minus[j].onclick=function(){BtnMoinsChambre(i,list[2])}
    list_plus[j].onclick=function(){BtnPlusChambre(i,list[2])}
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

function BtnPlusChambre(row_id,type_nom) {
  var input=document.getElementById("btn_"+type_nom+"_row_"+row_id);
  var value_input=parseInt(input.value);
  var list_input_chambre=document.getElementsByClassName("nbr_personne_row_"+row_id);
  var select=document.getElementById("select_row_"+row_id);
  var nbr_personne=0;
  for(var i=0;i<list_input_chambre.length;i++){
    nbr_personne+=parseInt(list_input_chambre[i].value)
  }
  if(parseInt(select.value) >=(nbr_personne+1)){
    input.value=value_input+1;
  }
}
function BtnMoinsChambre(row_id,type_nom) {
  var input=document.getElementById("btn_"+type_nom+"_row_"+row_id);
  var value_input=parseInt(input.value);
  value_input=value_input-1
  if(value_input>=0)input.value=value_input;
}
function InitChambre(row_id) {
  var list_input_chambre=document.getElementsByClassName("nbr_personne_row_"+row_id);
  var v= parseInt(document.getElementById("select_row_"+row_id).value);
  for(var i=0;i<list_input_chambre.length;i++){
    list_input_chambre[i].value=0
  }
  list_input_chambre[0].value=v;
}

function ButtonReserver(v){
  if(v!="ok"){
    document.getElementById('my_form').action="Connexion.php"
  }
  document.getElementById('my_form').submit();
}