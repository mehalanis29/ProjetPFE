<!DOCTYPE html>
<?php
require "php/database.inc";
require 'php/Client.inc';
if(isset($_GET["idclient"])){
$etat="Modifie";
$database=new database();
$result=$database->query("select * from client where client_id=".$_GET["idclient"]);
$row=mysqli_fetch_assoc($result);
$client = new Client($row["client_id"],$row["nom"],$row["prenom"],$row["date_naissance"]);
}else{
  $etat="Ajoute";
  $client = new Client("","","","");
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/css.php';?>
  </head>
  <body>
    <?php include 'html/navbar.html'; ?>
    <div class="page">
      <?php include 'html/sidebar.html'; ?>
      <div class="detail">
        <div class="titrepage">
          <?php echo $etat; ?>  Client
        </div>
        <div class="table">
          <form class="" action="" method="post">
             <table class="controltable">
               <tr>
                 <th width="140">
                   <label class="controllabel" for="" >Nom</label>
                 </th>
                 <td><input type="text" class="controlinput" name="Nom" value="<?php echo $client->nom; ?>"></td>
               </tr>
               <tr>
                 <th>
                   <label class="controllabel" for="">Prenom</label>
                 </th>
                 <td>
                   <input type="text" class="controlinput" name="Prenom" value="<?php echo $client->prenom; ?>">
                 </td>
               </tr>
               <tr>
                 <th>
                   <label class="controllabel" for="">Date Naissance</label>
                 </th>
                 <td>
                   <input type="date" class="controlinput" name="date_naissance" value="<?php echo $client->date_naissance; ?>">
                 </td>
               </tr>
             </table>
             <hr color="#34495e">
             <div class="control_div_btn">
               <button type="submit" class="control_btn" name="control<?php echo $etat; ?>btn"><?php echo $etat; ?></button>
             </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
