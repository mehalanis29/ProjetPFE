<!DOCTYPE html>
<?php
include 'php/Client/standard.php';

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/Client/standard.css">
    <link rel="stylesheet" href="css/Client/navbar.css">
    <link rel="stylesheet" href="css/Client/index.css">
    <link rel="stylesheet" href="css/Client/formulaire.css">
    <link rel="stylesheet" href="css\Client\Inscription.css">
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
              <a href="indexclient.php" >
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
        <label for="" class="formulaire_titre">Inscription</label>
        <hr class="formulaire_ligne">
        <form class="formulaire_form" action="Inscription.php" method="post">
          <div class="formulaire_row_2item">
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Nom*</label>
              <input type="text" name="" value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Prenom*</label>
              <input type="text" name="" value="" class="formulaire_row_item_input">
            </div>
          </div>
          <div class="formulaire_row_item">
            <label for="" class="formulaire_row_item_label">Adresse</label>
            <textarea name="name" rows="4" cols="30" class="formulaire_row_item_input"></textarea>
          </div>
        </form>
      </div>
      <div class="Inscription_page_cover"></div>
    </div>
  </body>
</html>
