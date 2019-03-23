<?php
require 'database.inc';
require 'Hotel.inc';
if((isset($_GET["idHotel"]))&&(!empty($_GET["idHotel"]))){
  $database=new database();
  $result=$database->query("select * from hotel where ville_id=".$_GET["idHotel"]);
  $list=array();
  while ($row=mysqli_fetch_assoc($result)) {
    $list[]=new hotel($row["hotel_id"],$row["nom"],$row["telephone"],$row["ville_id"],$row["address"],$row["class"],$row["img"]);
  }
  echo "{ \"List\":".json_encode($list,JSON_UNESCAPED_UNICODE)."}";
}

?>
