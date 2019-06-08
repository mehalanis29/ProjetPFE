var x=1;
function Calcul(v) {
  var valeur=parseInt(v);
  var ch=valeur;
  var m=parseInt((parseFloat(v)-valeur)*1000);
  if(valeur>10){
    ch=valeur+",";
  }
  document.getElementById('prix').innerHTML=ch+m+" DA";
}
$(document).ready(function(){
  $("#AjouterVoyage").click(function(){
    window.x++;
    var x= (document.getElementById("row_voyage").innerHTML).replace("$id_voyage$",window.x)
    x=x.replace("$id_voyage$",window.x)
    x=x.replace("$id_voyage$",window.x)
    $("#list_voyage").append(x)
  });
  $(document).on('click','.remove_list', function(){
    $("#row_"+$(this).attr('id')+'').remove();
    window.x--;
  });
});

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
      btn_ajouter.type="submit";
      break;
    }
  }
}