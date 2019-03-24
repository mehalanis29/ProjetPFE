<?php
require 'database.inc';
require 'Ville.inc';
if((isset($_GET["idVille"]))&&(!empty($_GET["idVille"]))){
  $database=new database();
  $result=$database->query("select * from ville where pays_id=".$_GET["idVille"]);
  $list=array();
  while ($row=mysqli_fetch_assoc($result)) {
    $list[]=new ville($row["ville_id"],$row['nom_ville'],$row['pays_id'],$row['img']);
  }
  echo "{ \"List\":".json_encode($list,JSON_UNESCAPED_UNICODE)."}";
}
 ?>
