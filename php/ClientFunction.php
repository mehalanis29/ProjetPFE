<?php
function LoadClient($id_Client)
{
  $database=new database();
  $result=$database->query("select * from client where client_id=".$id_Client);
  if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    $Client= new Client($row["client_id"],$row["num_passport"],$row["nom"],$row["prenom"],$row["date_naissance"],
                        $row["email"],$row["password"],$row["phone"],$row["address"],$row["city"]
                        ,$row["country"],$row["date_emission_passport"],$row["date_expiration_passport"]);
    return $Client;
  }else{
    return new Client("","","","","","","","","","","","","");
  }
}
function issetClient($post){
  return ((!empty($post['Nom']))&&(!empty($post['Prenom']))&&(!empty($post['date_naissance'])));
}
?>
