<!DOCTYPE html>
<?php
session_start();
include 'php/Client/standard.php';
require 'php/database.inc';
$database=new database();
$result=$database->query("select voyage.voyage_id,compte_agence_id,voyage.nom as voyage_nom,ville.nom as ville_nom,nbr_jour,description,min(prix_A_T) as prix from voyage join voyage_date on voyage.voyage_id= voyage_date.voyage_id join ville on voyage.ville_id=ville.ville_id group by voyage.voyage_id order by voyage.voyage_id ASC limit 3");
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
        <label class="titer_nbr_trouves"><?php echo mysqli_num_rows($result); ?> voyages trouvés</label>
        <div class="voyage_organise_list_voyage">
          <?php while ($row=mysqli_fetch_assoc($result)): ?>
          <div class="voyage_organise_voyage">
            <div class="index_offre_top_voyage_offre">
              <img src="img/Client/roma.jpeg" alt="">
              <div class="index_offre_top_voyage_desc">
                <div class="index_offre_top_voyage_nom_day">
                  <label class="index_offre_top_voyage_day" style="opacity: 0;">
                    <?php echo "m"; ?>
                  </label>
                  <label class="index_offre_top_voyage_nom" ><?php echo $row["ville_nom"]; ?></label>
                </div>
                <div class="index_offre_top_voyage_prix">
                  <label for=""><?php echo number_format($row["prix"]*10000); ?> DZ</label>
                </div>
              </div>
            </div>
            <div class="voyage_organise_voyage_description">
              <div class="voyage_organise_voyage_logo">
                <div class="voyage_organise_voyage_description_titre">
                  <strong><?php echo $row["voyage_nom"]; ?></strong>
                  <label >
                    <?php echo "Durée: ".$row["nbr_jour"]." Jours & ".intval($row["nbr_jour"]-1)." Nuit"; ?>
                  </label>
                </div>
                <img src="img\Admin\AgenceLogo\<?php echo $row["compte_agence_id"]; ?>.png" > 
              </div>
              <hr>
              <div class="voyage_organise_voyage_description_detail">
                <?php echo $row["description"]; ?>
              </div>
              <hr>
              <div class="voyage_organise_btn_more">
                <a href="Voyage.php?voyage_id=<?php echo $row["voyage_id"]; ?>">
                  <div class="index_offre_top_voyage_btn_more_titre">
                    <label for="">Voir toutes nos offres</label>
                    <img src="img/Client/icon/suivant18px.png" alt="" >
                  </div>
                </a>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
      <div class="page_cover"></div>
    </div>
    <?php  Footer(); ?>
  </body>
</html>