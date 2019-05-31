<!DOCTYPE html>
<?php
session_start();
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
        <div class="voyage_organise_list_voyage">
          <div class="voyage_organise_voyage">
            <div class="index_offre_top_voyage_offre">
              <img src="img/Client/roma.jpeg" alt="">
              <div class="index_offre_top_voyage_desc">
                <div class="index_offre_top_voyage_nom_day">
                  <label class="index_offre_top_voyage_nom">Roma</label>
                  <label class="index_offre_top_voyage_day">7 Jours & 6 Nuit</label>
                </div>
                <div class="index_offre_top_voyage_prix">
                  <label for="">25,000 DZ</label>
                </div>
              </div>
            </div>
            <div class="voyage_organise_voyage_description">
              <div class="voyage_organise_voyage_description_titre">
                <strong>Roma</strong>
                <label >
                  Durée: 5 jours & 4 nuits du 16/06/2019 au 20/06/2019
                </label>
              </div>
              <hr>
              <div class="voyage_organise_voyage_description_detail">
                Barcelone est une ville merveilleuse pour faire du shopping
              </div>
              <hr>
              <div class="voyage_organise_btn_more">
                <a href="Voyage.php">
                  <div class="index_offre_top_voyage_btn_more_titre">
                    <label for="">Voir toutes nos offres</label>
                    <img src="img/Client/icon/suivant18px.png" alt="">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="page_cover"></div>
    </div>
  </body>
</html>
