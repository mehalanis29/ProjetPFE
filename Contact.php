<!DOCTYPE html>
<?php
session_start();
require 'php/database.inc';
include 'php/Client/standard.php';
require 'php/Voyage.inc';
$database=new database();

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/Client/css.php'; ?>
    <script type="text/javascript" src="js\jquery.js">
    </script>
    <script type="text/javascript" src="js\Client\Voyage.js">
    </script>
  </head>
  <body onload="">
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
              <label>Contact</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="voyage_page" style="justify-content: space-between;">
      <div class="voyage_page_droite" style="width: 30%;">
        <div class="page_droite">
          <div class="espace_voyage" id="espace_reservation">
            <div class="formulaire_titre">
                A propos de nous
              </div>
              <hr class="formulaire_ligne">
            <div class="list-single-main-media fl-wrap">
              <div class="box-widget-list mar-top">
                      <ul>
                          <li><span>Adresse :</span> <a href="#">Adresse Blida (09000) , Alegrie</a></li>
                          <li><span>Tél :</span> <a href="#">(+ 213) 67 123 456</a></li>
                          <li><span>Fax :</span> <a href="#">(+ 213) 25 123 456</a></li>
                          <li><span>E-mail :</span> <a href="#">EmailTest@Gmail.com</a></li>
                          <li><span>Horaires :</span> <a href="#">Du dimanche au jeudi : 08:00 - 18:00<br> </a></li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <!-- -->
      <div class="page_gauche" style="width: 68%;">
        <div class="voyage_page_gauche">
          <div class="espace_voyage">
            <div class="formulaire_titre">
              Conactez nous
            </div>
            <hr class="formulaire_ligne">
            <form class="formulaire_form" action="Inscription.php" method="post">
              <div class="formulaire_row_2item" style="margin-top: 10px;">
                <div class="formulaire_row_item">
                  <label for="" class="formulaire_row_item_label">Nom : </label>
                  <input type="text" name="nom" value="" class="formulaire_row_item_input">
                </div>
                <div class="formulaire_row_item">
                  <label for="" class="formulaire_row_item_label">Prénom :</label>
                  <input type="text" name="prenom" value="" class="formulaire_row_item_input">
                </div>
              </div>
              <div class="formulaire_row_2item">
                <div class="formulaire_row_item">
                  <label for="" class="formulaire_row_item_label">E-mail :</label>
                  <input type="text" name="nom" value="" class="formulaire_row_item_input">
                </div>
                <div class="formulaire_row_item">
                  <label for="" class="formulaire_row_item_label">Téléphone :</label>
                  <input type="text" name="prenom" value="" class="formulaire_row_item_input">
                </div>
              </div>
              <div class="formulaire_row_item">
                  <label for="" class="formulaire_row_item_label">Votre message :</label>
                  <textarea class="formulaire_row_item_input" rows="4"></textarea>
              </div>
              <div class="formulaire_btn">
                <button type="submit" name="creer_compte" class="index_offre_top_voyage_btn_more_titre btn_envoyee">
                  <label for="">Envoyer</label>
                  <img src="img/Client/icon/suivant18px.png" alt="">
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="page_cover"></div>
    </div>
    <?php  Footer(); ?>
  </body>
</html>
