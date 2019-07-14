<?php
require '../database.inc';
require '../Ville.inc';
if((isset($_GET["pays_id"]))&&(!empty($_GET["pays_id"]))){
  $database=new database();
  $result=$database->query("select ville_id,nom from ville where pays_id = ".$_GET["pays_id"]." and ville_id in (select ville_id from voyage where voyage_id in (select voyage_id from voyage_date where date_depart > '".date("Y-m-d")."'))");
  $list=array();
  while ($row=mysqli_fetch_assoc($result)) {
    $list[]=new Ville($row["ville_id"],$row["nom"],"-1","");
  }
  echo json_encode($list,JSON_UNESCAPED_UNICODE);
}

?>