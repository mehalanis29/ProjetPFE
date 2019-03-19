function SelecteAll() {
  var list=document.getElementsByClassName('remove_list');
  var bool=document.getElementById("checkbox_all").checked;
  for(var i=0; i<list.length;i++){
    list[i].checked=bool;
  }
}
