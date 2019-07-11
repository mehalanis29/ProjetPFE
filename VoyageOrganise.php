<!DOCTYPE html>
<?php
session_start();
include 'php/Client/standard.php';
require 'php/database.inc';
$database=new database();
$where="";
$having="";
$b=false;
if(isset($_GET["date"])){
  $date=$_GET["date"];
}else{
  $date=date("Y-m-d");
}
if(isset($_GET['prix'])){
  $having.="and min(prix_A_T) between ".$_GET['prix'];
}
if(isset($_GET['duree'])){
  if($b==false){$where.=" where ";}else{$where.=" and ";}
  $where.="nbr_jour between ".$_GET['duree'];
  $b=true;
}
//
$result=$database->query("select voyage.voyage_id,compte_agence_id,voyage.nom as voyage_nom,ville.nom as ville_nom,nbr_jour,description,min(prix_A_T) as prix , min(date_depart) as datedepart  from voyage join voyage_date on voyage.voyage_id= voyage_date.voyage_id  join ville on voyage.ville_id=ville.ville_id ".$where." group by voyage.voyage_id having min(date_depart) > '".$date."' $having  order by voyage.voyage_id ASC limit 3");
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
        <script type="text/javascript" src="js/Client/index.js">

    </script>

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
        <div class="page_gauche" style="width:90%;">
        <div class="voyage_page_gauche">
          <div class="espace_voyage">
            <div class="formulaire_titre">
              Recherche 
            </div>
            <hr class="formulaire_ligne">
            <form class="formulaire_form" action="VoyageOrganise.php" method="GET">
              <div class="formulaire_row_item">
                <label for="" class="formulaire_row_item_label">Pays : </label>
                <select class="formulaire_row_item_input" name="pays" onchange ="LoadVille(this.value)">
                  <option value="">ALL Pays</option>
                  <?php 
                    $pays =$database->query("select pays_id,nom from pays where pays_id in (select pays_id from ville where ville_id in (select ville_id from voyage where voyage_id in (select voyage_id from voyage_date where date_depart > '".$date."')))") ;
                    while ($row=mysqli_fetch_assoc($pays)) {
                      echo "<option value=\"".$row["pays_id"]."\">".$row["nom"]."</option>";
                    }
                   ?>
                </select>
              </div>
              <div class="formulaire_row_item">
                <label for="" class="formulaire_row_item_label">Ville :</label>
                <select class="formulaire_row_item_input" name="ville" id="ville">
                  <option value="">ALL Ville</option>
                </select>
              </div>
              <div class="formulaire_row_item">
                <label for="" class="formulaire_row_item_label">Date Depart :</label>
                <input type="date" class="formulaire_row_item_input" name="date" value="<?php echo $date;?>">
              </div>
              <div class="formulaire_row_item">
                <label for="" class="formulaire_row_item_label" >Budget :</label>
                <div class="formulaire_row_2item" style="grid-template-columns:3% auto"> 
                  <input type="radio" class="filter-tags" value="0.1 and 2" name="prix" id="prix10">
                  <label style="margin-top: 3px;color: #999;font-size: 14px;" for="prix10">
                    Entre 1,000 Et 20,000 DA
                  </label>
                </div>
                <div class="formulaire_row_2item" style="grid-template-columns:3% auto"> 
                  <input type="radio" class="filter-tags" value="2.1 and 6" name="prix" id="prix21">
                  <label style="margin-top: 3px;color: #999;font-size: 14px;" for="prix21">
                    Entre 21,000 Et 60,000 DA
                  </label>
                </div>
                <div class="formulaire_row_2item" style="grid-template-columns:3% auto"> 
                  <input type="radio" class="filter-tags" value="6.1 and 10" name="prix" id="prix61">
                  <label style="margin-top: 3px;color: #999;font-size: 14px;" for="prix61">
                    Entre 61,000 Et 100,000 DA
                  </label>
                </div>
                <div class="formulaire_row_2item" style="grid-template-columns:3% auto"> 
                  <input type="radio" class="filter-tags" value="10 and 1000" name="prix" id="prix100">
                  <label style="margin-top: 3px;color: #999;font-size: 14px;" for="prix100">
                    Plus Que 100,000 DA
                  </label>
                </div>
              </div>
              <div class="formulaire_row_item">
                <label for="" class="formulaire_row_item_label" >Duree :</label>
                <div class="formulaire_row_2item" style="grid-template-columns:3% auto"> 
                  <input type="radio" class="filter-tags" value="1 and 4" name="duree" id="4">
                  <label style="margin-top: 3px;color: #999;font-size: 14px;" for="4">Max 4 Jours</label>
                </div>
                <div class="formulaire_row_2item" style="grid-template-columns:3% auto"> 
                  <input type="radio" class="filter-tags" value="5 and 10" name="duree" id="10">
                  <label style="margin-top: 3px;color: #999;font-size: 14px;" for="10">5 À 10 Jours</label>
                </div>
                <div class="formulaire_row_2item" style="grid-template-columns:3% auto"> 
                  <input type="radio" class="filter-tags" value="11 and 365" name="duree" id="11">
                  <label style="margin-top: 3px;color: #999;font-size: 14px;" for="11">Plus Que 11 Jours</label>
                </div>
              </div>
              <div class="formulaire_btn">
                <button type="submit" name="Recherche" class="index_offre_top_voyage_btn_more_titre btn_envoyee">
                  <label for="">Recherche</label>
                  <img src="img/Client/icon/suivant18px.png" alt="">
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      <div class="voyage_organise_droite">
        <div style="  display: grid;  grid-row-gap: 24px;"> 
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
      </div>
      <div class="page_cover"></div>
    </div>
    <?php  Footer(); ?>
  </body>
</html>