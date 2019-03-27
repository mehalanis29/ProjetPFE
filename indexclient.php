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
    <script type="text/javascript" src="js/Client/index.js">

    </script>
  </head>
  <body>
    <div class="nav_bar">
        <div class="nav_bar_head">
          <div class="nav_bar_div_logo">
            <label class="nav_bar_logo">Logo</label>
          </div>
          <div class="nav_bar_list_btn">
            <a href="#" class="nav_bar_btn">Home</a>
            <a href="#" class="nav_bar_btn">Voyage Organise</a>
          </div>
        </div>
        <div class="nav_bar_cover_index">
          <div class="nav_bar_from">
            <div class="nav_bar_from_titre">
              <button type="button" class="nav_bar_from_titre_choix nav_bar_from_titre_choix_active"
               id="voyage_organis_btn" onclick="change('voyage_organis')" name="button">
                voyage organisé
              </button>
              <button type="button" class="nav_bar_from_titre_choix" id="voyage_btn"
                  onclick="change('voyage')" name="button">voyage</button>
              <button type="button" class="nav_bar_from_titre_choix" id="hotel_btn"
                       onclick="change('hotel')" name="button">hotel</button>
            </div>
            <div class="nav_bar_div_form nav_bar_div_form_activ" id="voyage_organis_form">
              <form class="formtest" action="indexclient.php" method="post">
                <div class="nab_bar_index_div_input">
                  <select class="nab_bar_index_input" placeholder="pays" name="">
                    <option value="">Pays</option>
                  </select>
                </div>
                <div class="nab_bar_index_div_input">
                  <select class="nab_bar_index_input" placeholder="ville" name="">
                    <option value="">ville</option>
                  </select>
                </div>
                <div class="nab_bar_index_div_input">
                  <label class="nab_bar_index_label"> </label>
                  <input type="date" class="nab_bar_index_input" placeholder="à partir" name="" value="">
                </div>
                <div class="nab_bar_index_div_input">
                  <button type="submit" class="recharche_btn" name="Recharche">Recharche</button>
                </div>
              </form>
            </div>
            <div class="nav_bar_div_form" id="voyage_form">
              voyage
            </div>
            <div class="nav_bar_div_form" id="hotel_form">
              hotel
            </div>
          </div>
        </div>
    </div>
    <div class="index_offre_page">
      <div class="index_offre_top_voyage_titre">
        <label for="">
          Nos Top Déstination Voyages organisés
        </label>
      </div>
      <div class="index_offre_top_voyage_list_offre">
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
      </div>
    </div>
  </body>
</html>
