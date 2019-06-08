var x=1;
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
$(document).ready(function(){
  $("#AjouterChambre").click(function(){
    window.x++;
    var x= (document.getElementById("chambre").innerHTML).replace("$NBR$",window.x)
    x=x.replace("$NBR$",window.x)
    x=x.replace("$NBR$",window.x)
    $("#list_chambre").append(x)
  });
  $(document).on('click','.btn_remove', function(){
    $("#remove_"+$(this).attr('id')+'').remove();
    window.x--;
  });
});
/* mise a jour num chambre*/