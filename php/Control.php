<?php
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
function LoadNationalite($nationalite)
{
  $database =new database();
  $result=$database->query("select pays_id as id,nationalite as nom from pays") ;
  while ($row=mysqli_fetch_assoc($result)) {
    if($row['id']==$pays){
      echo "<option value='".$row['id']."' selected>".$row["nom"]."</option>";
    }else{
      echo "<option value='".$row['id']."'>".$row["nom"]."</option>";
    }
  }
}

 ?>
