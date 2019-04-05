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
