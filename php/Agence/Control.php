<?php
function VilletoPays($idVille)
{
  $database=new database();
  $result=$database->query("select pays_id from ville where ville_id=".$idVille);
  $row=mysqli_fetch_assoc($result);
  return $row["pays_id"];
}

function LoadVille($ville,$pays)
{
  $database =new database();
  $result=$database->query("select ville_id as id,nom from ville where pays_id=".$pays) ;
  while ($row=mysqli_fetch_assoc($result)) {
    if($row['id']==$ville){
      echo "<option value='".$row['id']."' selected>".$row["nom"]."</option>";
    }else{
      echo "<option value='".$row['id']."'>".$row["nom"]."</option>";
    }
  }
}

function LoadPays($pays)
{
  $database =new database();
  $result=$database->query("select pays_id as id,nom from pays") ;
  while ($row=mysqli_fetch_assoc($result)) {
    if($row['id']==$pays){
      echo "<option value='".$row['id']."' selected>".$row["nom"]."</option>";
    }else{
      echo "<option value='".$row['id']."'>".$row["nom"]."</option>";
    }
  }
}
function LoadHotel($id_hotel,$ville)
{
  $database =new database();
  $result=$database->query("select hotel_id as id,nom from hotel where ville_id=".$ville);
  while ($row=mysqli_fetch_assoc($result)) {
    if($row['id']==$id_hotel){
      echo "<option value='".$row['id']."' selected>".$row["nom"]."</option>";
    }else{
      echo "<option value='".$row['id']."'>".$row["nom"]."</option>";
    }
  }
}
function LoadNationalite($nationalite)
{
  $database =new database();
  $result=$database->query("select pays_id as id,nationalite as nom from pays") ;
  while ($row=mysqli_fetch_assoc($result)) {
    if($row['id']==$nationalite){
      echo "<option value='".$row['id']."' selected>".$row["nom"]."</option>";
    }else{
      echo "<option value='".$row['id']."'>".$row["nom"]."</option>";
    }
  }
}

 ?>
