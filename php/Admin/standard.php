<?php
function CSS() {
  include '../php/Admin/css.php';
}
function NavBar()
{
  include '../html/navbar.html';
}
function SideBar()
{
  include '../html/sidebar.html';
}

function CalculDebut($GET)
{
  return (issetPage($GET)*10-10);
}
function issetPage($GET)
{
  if(isset($GET['page'])){ $page=$GET['page'];}else{$page=1;}
  return $page;
}
function printitem($id,$page,$style,$get)
{
   echo "<li class='$style'><a href='$page?".$get."page=$id'>$id</a></li>";
}
function IssetRech($GET)
{
  if(isset($GET["rech"])){ $k="rech=".$GET["rech"];}else{$k ="";}
  return $k;
}
function bar($GET,$rech,$nom){
  echo "<li class='suivprec'>";
  if(issetPage($GET)>1){
        $precedant=$page-1;
        echo "<a href='$this->page?".$this->GET."page=$precedant'><img src='../img/Admin/icon/precedant.png'/></a></li>";
        $this->printitem($precedant,"listitem",$this->GET);
        $this->printitem($_GET['page'],"itemactiv",$this->GET);
  }else{
      echo "<a href='".issetPage($GET)."?page=1'><img src='../img/Admin/icon/precedant.png'/></a></li>";
      printitem(1,issetPage($GET),"itemactiv",IssetRech($GET));
  }
  //$suivant=$page*10;
  /*
  $database=new database();
  $result=$database->query($this->sql." limit $suivant ,2");
  */
  //if($page>1){$suivant=$page;}else{$suivant=1;}
  /*
  if(mysqli_num_rows($result)>0){
  $suivant++;
  $this->printitem($suivant,"listitem",$this->GET,$nom);
  }
  */
    echo "<li class='suivprec'><a href='$nom?page=".issetPage($GET)."&".$rech."'><img src='../img/Admin/icon/suivant.png'/></a></li>";
}
?>
