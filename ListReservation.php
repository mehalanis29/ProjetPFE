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
              <label>Reservation</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="Inscription_page">
      <div class="list_Reseravtion_formulaire">
        <form class="formulaire_form" action="ListReservation.php" method="post">
          <label for="" class="formulaire_titre">Reservation</label>
          <hr class="formulaire_ligne"/>
          <div class="formulaire_table_row_5item formulaire_table_row_5item_titre">
            <label for="" class="formulaire_row_item_label">Voyage</label>
            <label for="" class="formulaire_row_item_label">Périodes</label>
            <label for="" class="formulaire_row_item_label">Rendez-Vous</label>
            <label for="" class="formulaire_row_item_label">Paiement</label>
            <label for="" class="formulaire_row_item_label">Operation</label>
          </div>
          <?php 
           $result_resevation = $database->query("select voyage.nom as voyage_nom,DATE_FORMAT(date_depart,'%d/%m/%Y') as date_depart,DATE_FORMAT(date_retour,'%d/%m/%Y') as date_retour ,DATE_FORMAT(date_rendezvous,'%d/%m/%Y') as date_rendez_vous,etat_paiement  from reserve join voyage_date join voyage on reserve.voyage_date_id=voyage_date.voyage_date_id and voyage.voyage_id=voyage_date.voyage_id where reserve.client_id=".$_SESSION["client_id"] );
           while($row=mysqli_fetch_assoc($result_resevation)):
          ?>
          <div class="formulaire_table_row_5item">
            <label for="" class="formulaire_row_item_label"><?php echo $row["voyage_nom"];?></label>
            <label for="" class="formulaire_row_item_label"><?php echo "Du ".$row["date_depart"]." Au ".$row["date_retour"];?></label>
            <label for="" class="formulaire_row_item_label"><?php echo $row["date_rendez_vous"];?></label>
            <label for="" class="formulaire_row_item_label"><?php echo $row["etat_paiement"];?></label>
          </div>
          <?php endwhile;?>
        </form>
      </div>
      <div class="page_cover"></div>
    </div>
    <?php  Footer(); ?>
  </body>
</html>
