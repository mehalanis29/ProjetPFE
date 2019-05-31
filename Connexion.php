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
if(isset($_POST["Connecter"])){
  $result=$database->query("select * from client where email='".$_POST["email"]."' and password='".md5($_POST["password"])."'");
  $i=0;
  while ($row=mysqli_fetch_assoc($result)) {
    $i++; $user=$row;
  }
  if($i==1){
    $_SESSION["nom"]=$user["nom"];
    $_SESSION["prenom"]=$user["prenom"];
    $_SESSION["email"]=$user["email"];
    $_SESSION["password"]=$user["password"];
    header("location: index.php");
  }
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
          Connexion
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
              <label>Connexion</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="Inscription_page">
      <div class="Connexion_formulaire">
        <div class="Inscription_formulaire">
          <form class="formulaire_form" action="Connexion.php" method="post">
            <label for="" class="formulaire_titre">Se connecter</label>
            <hr class="formulaire_ligne"/>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Email</label>
              <input type="text" name="email" required value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Mot de Passe</label>
              <input type="password" name="password" required value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_btn">
              <button type="submit" name="Connecter" class="index_offre_top_voyage_btn_more_titre btn_envoyee">
                <label for="">Connecter</label>
                <img src="img/Client/icon/suivant18px.png" alt="">
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="page_cover"></div>
    </div>
  </body>
</html>
