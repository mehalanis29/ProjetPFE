function Calcul(v) {
  var valeur=parseInt(v);
  var ch=valeur;
  var m=parseInt((parseFloat(v)-valeur)*1000);
  if(valeur>10){
    ch=valeur+",";
  }
  document.getElementById('prix').innerHTML=ch+m+" DA";
}
