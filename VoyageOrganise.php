<!DOCTYPE html>
<?php
include 'php/Client/standard.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/Client/css.php'; ?>
  </head>
  <body>
    <div class="nav_bar">
      <?php NabBar(); ?>
      <div class="nav_bar_cover_index">
        <div class="nav_bar_cover_index_img">
          <img src="img/Client/Cover/cover-avion.jpeg" alt="">
        </div>
        <div class="nav_bar_titre">
          Voyage Organise
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
              <label>Voyage Organise</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="voyage_organise_page">
      <div class="voyage_organise_page_gauche">

      </div>
      <div class="voyage_organise_droite">
        <label class="titer_nbr_trouves">1 voyages trouvés</label>
      </div>
      <div class="page_cover"></div>
    </div>
  </body>
</html>
