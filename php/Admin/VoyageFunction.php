<?php
function LoadVoyage($voyage_id)
{
  $database=new database();
  $result=$database->query("select * from voyage where voyage_id=".$voyage_id);
  if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    $voyage_id= new Voyage($row["voyage_id"],$row["nom"],$row["ville_id"],$row["nbr_jour"],$row['hotel_id']
                            , $row["description"],$row["cover"]);

    return $voyage_id;
  }else{
    return new Voyage("","","-1","","","","","","","","","","");
  }
}

function issetVoyage($post){
  return ((!empty($post['nom']))&&(!empty($post['lieu_depart']))&&(!empty($post['nbr_jour']))&&(!empty($post['hotel_id'])));
}

function removeVoyage($list) {
  $database=new database();
  foreach ($list as $k  => $voyage_id) {
    $database->query("DELETE from voyage where voyage_id=".$voyage_id);
  }
}

?>
