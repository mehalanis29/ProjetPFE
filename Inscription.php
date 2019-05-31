<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION["email"])){
  header("location: index.php");
}
include 'php/Client/standard.php';
require 'php/Admin/Control.php';
require 'php/database.inc';
require 'php/Client.inc';
$database=new database();

if(isset($_POST["creer_compte"])){
  $client=new Client("",$_POST["num_passeport"],$_POST["nom"],$_POST["prenom"],$_POST["date_naissance"],$_POST["email"]
  ,$_POST["mot_de_passe"],$_POST["phone"],$_POST["nationalite"],$_POST['emission_passeport'],$_POST['expiration_passport']);
  $client->InsertClient();
  header("location: index.php");
}
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
      <div class="nav_bar_cover_index">
        <div class="nav_bar_cover_index_img">
          <img src="img/Client/Cover/formulaire.jpeg" alt="">
        </div>
        <div class="nav_bar_titre">
          Inscription
        </div>
      </div>
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
              <label>Inscription</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="Inscription_page">
      <div class="Inscription_formulaire">
        <form class="formulaire_form" action="Inscription.php" method="post">
          <label for="" class="formulaire_titre">Informations Personnelles</label>
          <hr class="formulaire_ligne"/>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Nom*</label>
              <input type="text" name="nom" value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Prenom*</label>
              <input type="text" name="prenom" value="" class="formulaire_row_item_input">
            </div>
          </div>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Date Naissance</label>
              <input type="date" name="date_naissance" value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Phone</label>
              <input type="text" name="phone" value="" class="formulaire_row_item_input">
            </div>
          </div>
          <label for="" class="formulaire_titre">Information Passeport </label>
          <hr class="formulaire_ligne"/>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">N*Passeport</label>
              <input type="text" name="num_passeport" value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Nationalite</label>
              <select class="formulaire_row_item_input" name="nationalite">
                <?php LoadNationalite("0"); ?>
              </select>
            </div>
          </div>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Emission du Passport</label>
              <input type="date" name="emission_passeport" value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Expiration Du Passport</label>
              <input type="date" name="expiration_passport" value="" class="formulaire_row_item_input">
            </div>
          </div>
          <label for="" class="formulaire_titre">Inscription</label>
          <hr class="formulaire_ligne"/>
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Email*</label>
              <input type="text" name="email" value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Mot de Passe*</label>
              <input type="password" name="mot_de_passe" value="" class="formulaire_row_item_input">
            </div>
          </div>
          <div class="formulaire_btn">
            <button type="submit" name="creer_compte" class="index_offre_top_voyage_btn_more_titre btn_envoyee">
              <label for="">Creer Compte</label>
              <img src="img/Client/icon/suivant18px.png" alt="">
            </button>
          </div>
        </form>
      </div>
      <div class="page_cover"></div>
    </div>
  </body>
</html>
