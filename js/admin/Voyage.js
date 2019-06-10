$(document).ready(function(){
  $("#AjouterVoyage").click(function(){
    $("#list_voyage").append(document.getElementById("row_voyage").innerHTML)
    initrow();
  });
  $(document).on('click','.remove_list', function(){
      $("#row_"+$(this).attr('id')+'').remove();
      initrow();
  });
});

function Calcul(v) {
  var valeur=parseInt(v);
  var ch=valeur;
  var m=parseInt((parseFloat(v)-valeur)*1000);
  if(valeur>10){
    ch=valeur+",";
  }
  document.getElementById('prix').innerHTML=ch+m+" DA";
}

function initrow(){
  var list_div=document.getElementsByClassName("control_table_9item");
  var list_btn=document.getElementsByClassName("remove_list");
  for(var i=0;i<list_div.length;i++){
    list_div[i+1].id="row_"+i;
    list_btn[i].id=i;
  }
}
function suivant(etat){
  var btn_ajouter=document.getElementById("Ajouter");
  switch(etat){
    case "debut" :{
      Tab('Information');
      btn_ajouter.onclick=function(){suivant('Information');};
      btn_ajouter.innerHTML="Suivant";
      btn_ajouter.type="button";
      break;
    }
    case "Information" :{
      Tab('list_date');
      btn_ajouter.innerHTML="Ajouter";
      setTimeout(function(){btn_ajouter.type="submit";}, 1500);
      break;
    }
  }
}