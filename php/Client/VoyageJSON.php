<?php 
require '../database.inc';
require '../VoyageDate.inc';
if((isset($_GET["voyage_id"]))&&(!empty($_GET["voyage_id"]))){
  $database=new database();
  $result=$database->query("select voyage_date_id,DATE_FORMAT(date_depart,'%d/%m/%Y') as date_depart,DATE_FORMAT(date_retour,'%d/%m/%Y') as date_retour,prix_A_S,prix_A_D,prix_A_T,prix_E,prix_B from voyage_date where  voyage_id=".$_GET["voyage_id"]);
  $list=array();
  while ($row=mysqli_fetch_assoc($result)) {
    $list[]=new VoyageDate($row["voyage_date_id"],$row["date_depart"],$row["date_retour"],number_format($row["prix_A_S"]*10000),number_format($row["prix_A_D"]*10000),number_format($row["prix_A_T"]*10000),number_format($row["prix_E"]*10000),number_format($row["prix_B"]*10000));
  }
  echo json_encode($list,JSON_UNESCAPED_UNICODE);
}

 ?>