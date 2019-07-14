<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION["email"])){
  header("location: index.php");
}
include 'php/Client/standard.php';
require 'php/Admin/Control.php';
require 'php/database.inc';
require 'php/Client.inc';
$database=new database();
if(isset($_POST["Modifier"])){
  $user_update=new Client($_SESSION["client_id"], $_POST["num_passeport"],$_POST["nom"],$_POST["prenom"],$_POST["date_naissance"],$_POST["email"]
  ,$_POST["mot_de_passe"],$_POST["phone"],$_POST["nationalite"],$_POST["emission_passeport"],$_POST["expiration_passport"]);
  $user_update->UpdateClient();
}
$user=mysqli_fetch_assoc($database->query("select * from client where client_id=".$_SESSION["client_id"]));

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/Client/css.php'; ?>
    <script type="text/javascript" src="js/Client/index.js">

    </script>
  </head>
  <body>
    <div class="nav_bar">
      <?php NabBar(); ?>
      <div class="nav_bar_titre_bar">
        <div class="nav_bar_titre_bar_url">
          <div class="nav_bar_titre_bar_url_icon">
            <div class="nav_bar_titre_bar_url_icon_btn">
              <a href="index.php" >
                <img src="img\Client\icon\home18pxgris.png" alt="">
              </a>
              <a href="#">
                <img src="img\Client\icon\suivant18pxlemon.png" class="nav_bar_titre_bar_url_icon_suivant">
              </a>
              <label>Parametre</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="Inscription_page">
      <div class="Inscription_formulaire">
        <form class="formulaire_form" action="Parametre.php" method="post">
          <label for="" class="formulaire_titre">Informations Personnelles</label>
          <hr class="formulaire_ligne"/>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Nom*</label>
              <input type="text" name="nom" value="<?php echo $user['nom']?>" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Prenom*</label>
              <input type="text" name="prenom" value="<?php echo $user['prenom']?>" class="formulaire_row_item_input">
            </div>
          </div>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Date Naissance</label>
              <input type="date" name="date_naissance" value="<?php echo $user['date_naissance']?>" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Phone</label>
              <input type="text" name="phone" value="<?php echo $user['phone']?>" class="formulaire_row_item_input">
            </div>
          </div>
          <label for="" class="formulaire_titre">Information Passeport </label>
          <hr class="formulaire_ligne"/>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">N*Passeport</label>
              <input type="text" name="num_passeport" value="<?php echo $user['num_passport']?>" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Nationalite</label>
              <select class="formulaire_row_item_input" name="nationalite">
                <?php LoadNationalite($user["nationalite"]); ?>
              </select>
            </div>
          </div>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Emission du Passport</label>
              <input type="date" name="emission_passeport" value="<?php echo $user['date_emission_passport']?>" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Expiration Du Passport</label>
              <input type="date" name="expiration_passport" value="<?php echo $user['date_expiration_passport']?>" class="formulaire_row_item_input">
            </div>
          </div>
          <label for="" class="formulaire_titre">Information sur le comple</label>
          <hr class="formulaire_ligne"/>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Email*</label>
              <input type="text" name="email" value="<?php echo $user['email']?>" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Mot de Passe*</label>
              <input type="password" name="mot_de_passe" value="" class="formulaire_row_item_input">
            </div>
          </div>
          <div class="formulaire_btn">
            <button type="submit" name="Modifier" class="index_offre_top_voyage_btn_more_titre btn_envoyee">
              <label for="">Modifier</label>
              <img src="img/Client/icon/suivant18px.png" alt="">
            </button>
          </div>
        </form>
      </div>
      <div class="page_cover"></div>
    </div>
    <?php  Footer(); ?>
  </body>
</html>
