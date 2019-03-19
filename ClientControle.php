<!DOCTYPE html>
<?php
require "php/database.inc";
require 'php/Client.inc';
include 'php/ClientFunction.php';
if(isset($_POST)){
  if(issetClient($_POST))
  {
    echo "Insert";
    //insert
  }
}
if(isset($_GET["idclient"])){
$etat="Modifier";
$client = LoadClient($_GET["idclient"]);
}else{
  $etat="Ajouter";
  $client = LoadClient(-1);
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
        <div class="titre_bar">
          <label for="" class="titre_bar_label">
            <a href="Client.php"><img src="img/back_bleu_40px.png" alt=""></a>
            <?php echo $etat; ?> Client
          </label>
        </div>
        <div class="table">
          <form class="" action="ClientControle.php" method="post">
             <table class="controltable">
               <tr>
                 <th width="140">
                   <label class="controllabel" for="" >Nom</label>
                 </th>
                 <td>
                   <input type="text" class="controlinput
                         <?php if((isset($_POST["Nom"]))&&(empty($_POST["Nom"])))echo "control_input_erreur";?>" name="Nom"
                         value="<?php if(isset($_POST["Nom"])){ echo $_POST["Nom"];  }else{ echo $client->nom; }?>">
                 </td>
                 <th>
                   <label class="controllabel" for="">  Prenom</label>
                 </th>
                 <td>
                   <input type="text" class="controlinput
                          <?php if((isset($_POST["Prenom"]))&&(empty($_POST["Prenom"])))echo "control_input_erreur";?>" name="Prenom"
                         value="<?php if(isset($_POST["Prenom"])){ echo $_POST["Prenom"];  }else{ echo $client->prenom; }?>">
                 </td>
               </tr>
               <tr>
                 <th>
                   <label class="controllabel" for="">Date Naissance</label>
                 </th>
                 <td>
                   <input type="date" class="controlinput" name="date_naissance" value="<?php echo $client->date_naissance; ?>">
                 </td>
                 <th><label for="" class="controllabel">  Email</label></th>
                 <td><input type="email" class="controlinput"></td>
               </tr>
               <tr>
                 <th><label for="" class="controllabel">Phone</label></th>
                 <td><input type="number" class="controlinput"></td>
                 <th><label for="" class="controllabel">  Passport ID</label></th>
                 <td><input type="number" class="controlinput"></td>
               </tr>
               <tr>
                 <th><label for="" class="controllabel">Adresse</label></th>
                 <td><input type="text" class="controlinput"></td>
                 <th><label for="" class="controllabel">  Cite</label></th>
                 <td><input type="number" class="controlinput"></td>
               </tr>
               <tr>
                 <th><label for="" class="controllabel">Pays</label></th>
                 <td><input type="text" class="controlinput"></td>
                 <th><label for="" class="controllabel">Emission du Passport</label></th>
                 <td><input type="date" class="controlinput"></td>
               </tr>
               <tr>
                 <th><label for="" class="controllabel">Exp Du Passport</label></th>
                 <td><input type="date" class="controlinput"></td>
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
