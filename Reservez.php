<!DOCTYPE html>
<?php
include 'php/Client/standard.php';
require 'php/Admin/Control.php';
require 'php/database.inc';
require 'php/Client.inc';
$database=new database();
if(isset($_GET["voyage_id"])){

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
          Reservez
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
              <label>Reservez</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="voyage_page">
      <div class="page_gauche">
        <div class="voyage_page_gauche">
          <div class="Inscription_formulaire">
            <form class="formulaire_form" action="Inscription.php" method="post">
              <label for="" class="formulaire_titre">Réservation</label>
              <hr class="formulaire_ligne"/>
              <div class="formulaire_row_2item">
                <div class="formulaire_row_item">
                  <label for="" class="formulaire_row_item_label">Périodes</label>
                  <select class="formulaire_row_item_input" name="">
                    <option value="">du 30/06/2019 au 06/07/2019 </option>
                    <option value="">du 07/07/2019 au 13/07/2019 </option>
                    <option value="">du 14/07/2019 au 20/07/2019 </option>
                  </select>
                </div>
              </div>
              <label for="" class="formulaire_titre">Chambre 1</label>
              <hr class="formulaire_ligne"/>
              <div class="formulaire_row_2item">
                <div class="formulaire_row_item">
                  <label for="" class="formulaire_row_item_label">Nom et Prenom</label>
                  <input type="text" class="formulaire_row_item_input" name="" value="">
                </div>
                <div class="formulaire_row_item">
                  <label for="" class="formulaire_row_item_label">Age</label>
                  <select width="200" class="formulaire_row_item_input" name="">
                    <option value="">Adulte</option>
                    <option value="">Enfant(-12ans)</option>
                    <option value="">Bebe(-3ans)</option>
                  </select>
                </div>
              </div>
              <label for="" class="formulaire_titre">Mode de paiement</label>
              <hr class="formulaire_ligne"/>
              <div class="formulaire_row_2item">
                <div class="">
                  <input type="radio" id="liquide" name="paiement" class="formulaire_row_item_input" value="">
                  <label for="liquide" class="formulaire_row_item_label">Paiement en espèces</label>
                </div>
                <div class="">
                  <input type="radio" id="Online" name="paiement" class="formulaire_row_item_input" value="">
                  <label for="Online" class="formulaire_row_item_label">paiement en ligne</label>
                </div>
              </div>
              <div class="formulaire_btn">
                <button type="submit" name="creer_compte" class="index_offre_top_voyage_btn_more_titre btn_envoyee">
                  <label for="">Reservez</label>
                  <img src="img/Client/icon/suivant18px.png" alt="">
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="voyage_page_droite">
        <div class="page_droite">
          <div class="espace_voyage" id="espace_reservation">
            <div class="formulaire_titre">
              votre pack
            </div>
            <hr class="formulaire_ligne">
            <div class="reservation_prix">
              <label >Total</label>
              <span>
                125,000 DA
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="page_cover"></div>
    </div>
  </body>
</html>
