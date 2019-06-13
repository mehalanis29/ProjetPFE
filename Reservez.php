<!DOCTYPE html>
<?php
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
    <script type="text/javascript" src="js/Client/Reservez.js">

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
                  <select class="formulaire_row_item_input" name="periodes" >
                    <?php
                      $database=new database(); 
                      $result=$database->query("select voyage_date_id,DATE_FORMAT(date_depart,'%d/%m/%Y') as date_depart,DATE_FORMAT(date_retour,'%d/%m/%Y') as date_retour from voyage_date where voyage_id=".$_POST["voyage_id"]);
                      while($row=mysqli_fetch_assoc($result)){
                        if($_POST["periodes"]==$row["voyage_date_id"]){
                          echo "<option value=".$row["voyage_date_id"]." selected>Du ".$row["date_depart"]." AU ".$row["date_retour"]."</option>";
                        }else{
                          echo "<option value=".$row["voyage_date_id"].">Du ".$row["date_depart"]." AU ".$row["date_retour"]."</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <?php 
              function Affiche($nbr,$type)
              {
                 $list_type=array(1=>"Adulte",2=>"Enfant(-12ans)",3=>"Bebe(-3ans)");
                 for ($i=0;$i<$nbr;$i++){
                  echo "<div class=\"formulaire_row_2item\">
                  <div class=\"formulaire_row_item\">
                    <label class=\"formulaire_row_item_label\">Nom et Prenom</label>
                    <input type=\"text\" class=\"formulaire_row_item_input\">
                  </div>
                  <div class=\"formulaire_row_item\">
                    <label class=\"formulaire_row_item_label\">Age</label>
                    <select width=\"200\" class=\"formulaire_row_item_input\" >";
                    foreach ($list_type as $key => $value) {
                      if($key==$type){
                        echo "<option value=".$key." selected>".$value."</option>";
                      }else{
                        echo "<option value=".$key.">".$value."</option>";
                      }
                     }
                     echo "</select></div></div>";
                 }
              }
             
              foreach ($_POST["num_chambre"] as $key => $num_chambre): ?>
                <label for="" class="formulaire_titre">Chambre <?php echo $num_chambre; ?></label>
                <hr class="formulaire_ligne"/>
                <?php Affiche($_POST["adulte"][$key],1) ; ?>
                <?php Affiche($_POST["enfant"][$key],2) ; ?>
                <?php Affiche($_POST["bebe"][$key],3) ; ?>
              <?php endforeach; ?>
              
              <label for="" class="formulaire_titre">Mode de paiement</label>
              <hr class="formulaire_ligne"/>
              <div class="formulaire_row_2item" style="margin-bottom: 16px;">
                <div class="">
                  <input type="radio" onclick="Formulaire('none')" id="liquide" name="paiement" class="formulaire_row_item_input" value="">
                  <label for="liquide"  class="formulaire_row_item_label">Paiement en espèces</label>
                </div>
                <div class="">
                  <input type="radio" onclick="Formulaire('grid')" id="Online" name="paiement" class="formulaire_row_item_input" value="">
                  <label for="Online"  class="formulaire_row_item_label">paiement en ligne</label>
                </div>
              </div>
              <div class="formulaire_form" id="formulaire_paiement" style="display: none;">
                <div class="formulaire_row_item">
                  <label class="formulaire_row_item_label">Nom et Prenom :</label>
                  <input type="text" class="formulaire_row_item_input">
                </div>
                <div class="formulaire_row_item">
                    <label class="formulaire_row_item_label">Numéro de la carte de crédit :  </label>
                    <input type="text" class="formulaire_row_item_input">
                </div>
                <div class="formulaire_row_2item">
                  <div class="formulaire_row_item">
                    <label  class="formulaire_row_item_label">Date d'expiration :</label>
                    <input type="month"  class="formulaire_row_item_input" placeholder="MM/YYYY">
                  </div>
                  <div class="formulaire_row_item">
                    <label class="formulaire_row_item_label">Entrez le code CVC2/CVV2 :</label>
                    <input type="text" class="formulaire_row_item_input">
                  </div>
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
