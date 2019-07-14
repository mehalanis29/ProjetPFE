<!DOCTYPE html>
<?php
session_start();
require 'php/database.inc';
include 'php/Client/standard.php';
require 'php/Voyage.inc';
$database=new database();
if(isset($_GET["voyage_id"])){
  $result=$database->query("select voyage_id,compte_agence_id,voyage.nom,ville.nom as ville,nbr_jour,hotel_id,description,cover from voyage join ville on voyage.ville_id=ville.ville_id where voyage_id=".$_GET["voyage_id"]) ;
  $row=mysqli_fetch_assoc($result);
  $voyage=new Voyage($row["voyage_id"],$row["nom"],$row["ville"],$row["nbr_jour"],$row["hotel_id"],$row["description"],$row["cover"]);
  $jour=$voyage->LoadListEndroit();
  //$list_photo=$voyage->LoadListPhoto();
}else{
  die("erreur voyage_id");
}

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
  <body onload="LoadDate(<?php echo $_GET["voyage_id"]; ?>);window.i=0;AfficheImage();">
    <div class="nav_bar">
      <?php NabBar(); ?>
      <div class="nav_bar_cover_index">
        <div class="nav_bar_cover_index_img">
          <img src="img/Client/Cover/cover-roma.jpeg" alt="">
        </div>
        <div class="nav_bar_titre">
          <?php echo $voyage->ville; ?>
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
              <label> Voyages Organisés</label>
              <a href="#">
                <img src="img\Client\icon\suivant18pxlemon.png" class="nav_bar_titre_bar_url_icon_suivant">
              </a>
              <label><?php echo $voyage->nom; ?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="voyage_page">
      <div class="page_gauche">
        <div class="voyage_page_gauche">
          <div class="list_photo_de_voyage">
            <div class="photo_de_voyage">
              <img src="img\Client\photo\1-1.jpeg" alt="">
            </div>
            <div class="photo_de_voyage">
              <img src="img\Client\photo\1-2.jpeg" alt="">
            </div>
            <!-- Affiche list des photo -->
            <?php /*foreach ($list_photo as $k => $v) {?>
              <div class="photo_de_voyage">
                <img src="img\Client\photo\<?php echo $v->img; ?>" alt="">
              </div>
            <?php } */?>
            <a class="photo_precedent" onclick="moinsphoto()">❮</a>
            <a class="photo_suivant" onclick="plusphoto()">❯</a>
          </div>
          <div class="espace_voyage">
            <div class="formulaire_titre">
              Carnet de voyage
            </div>
            <hr class="formulaire_ligne">
            <div class="les_jours_voyage">
              <?php  foreach ($jour as $k => $v) {?>
                <div class="jour_voyage">
                  <label for="">Jour</label>
                  <div class="numero_jour_voyage"><?php echo $v->id; ?></div>
                  <div class="description_jour">
                    <strong><?php echo $v->nom; ?></strong>
                    <p>
                      <?php echo $v->description; ?>
                    </p>
                  </div>
                </div>
              <?php }  ?>
            </div>
          </div>
          <div class="espace_voyage">
            <div class="formulaire_titre">
              Tarifs
            </div>
            <hr class="formulaire_ligne">
            <div class="formulaire_row_2item">
              <div class="formulaire_row_item"></div>
              <div class="formulaire_row_item">
                <label for="Online" class="formulaire_row_item_label"> Prochains départs </label>
                <select class="formulaire_row_item_input" name="" id="table_date_prix" onchange="AffichePrix(this.value)">
                
                </select>
              </div>
            </div>
            <table class="table_tarifs">
              <thead>
                <tr>
                  <td width="550"></td>
                  <th>Tarif</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Adulte en chambre Single</td>
                  <th class="prix"></th>
                </tr>
                <tr>
                  <td>Adulte en chambre Double</td>
                  <th class="prix"></th>
                </tr>
                <tr>
                  <td>Adulte en chambre Triple</td>
                  <th class="prix"></th>
                </tr>
                <tr>
                  <td>Enfant (3-12ans)</td>
                  <th class="prix"></th>
                </tr>
                <tr>
                  <td>Bebe</td>
                  <th class="prix"aa></th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="voyage_page_droite">
        <div class="page_droite">
          <div class="espace_voyage" id="espace_reservation">
            <form id="my_form" method="GET" action="Reservez.php" >
              <input type="hidden" name="voyage_id" value="<?php echo $_GET["voyage_id"]; ?>">
              <input type="hidden" name="compte_agence_id" value="<?php echo $row["compte_agence_id"]; ?>">
              <div class="formulaire_titre">
                Reservation
              </div>
              <hr class="formulaire_ligne">
              <!--
            <div class="reservation_prix">
              <label >à partir de</label>
              <span>
                125,000 DA
              </span>
            </div>
             -->
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Périodes</label>
              <select class="formulaire_row_item_input" name="voyage_date_id" id="text_reserve">
              </select>
            </div>
            <div class="list_chambre">
              <label >Chambres</label>
              <button type="button" name="button" id="AjouterChambre" >
                <img src="img\Client\icon\add22px.png" alt="">
              </button>
            </div>
            <div id="list_chambre">
              <div class="formulaire_row_item">
                <input type="hidden"  name="num_chambre[]" value="1">
                <label for="" class="formulaire_row_item_label">Chambre 1</label>
                <select class="formulaire_row_item_input" name="type_chambre[]" id="select_row_1" onchange="InitChambre(1)">
                  <option value="1" > Chambre Single </option>
                  <option value="2"> Chambre Double </option>
                  <option value="3"> Chambre Triple</option>
                </select>
                <div class="nbr_personne">
                  <div class="categorie_presonne">
                    <label for=""><strong>adulte</strong></label>
                    <div class="nbr_personne_btn">
                      <button type="button" name="button" class="minus" onclick="BtnMoinsChambre(1,'adulte')" ></button>
                      <input type="text"  class="nbr_personne_row_1" name="adulte[]" value="1" id="btn_adulte_row_1" readonly>
                      <button type="button" name="button" class="plus" onclick="BtnPlusChambre(1,'adulte')"></button>
                    </div>
                  </div>
                  <div class="categorie_presonne" >
                    <label for=""><strong>enfant</strong>(-12ans)</label>
                    <div class="nbr_personne_btn">
                      <button type="button" name="button" class="minus" onclick="BtnMoinsChambre(1,'enfant')" ></button>
                      <input type="text" class="nbr_personne_row_1" name="enfant[]" id="btn_enfant_row_1" value="0" readonly>
                      <button type="button" name="button" class="plus" onclick="BtnPlusChambre(1,'enfant')" ></button>
                    </div>
                  </div>
                  <div class="categorie_presonne">
                    <label for=""><strong>bebe</strong>(-3ans)</label>
                    <div class="nbr_personne_btn">
                      <button type="button" name="button" class="minus" onclick="BtnMoinsChambre(1,'bebe')" ></button>
                      <input type="text" class="nbr_personne_row_1" name="bebe[]" id="btn_bebe_row_1" value="0" readonly>
                      <button type="button" name="button" class="plus" onclick="BtnPlusChambre(1,'bebe')" ></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="index_offre_top_voyage_btn_more">
              <a href="javascript:{}" onclick="ButtonReserver(<?php if(isset($_SESSION["client_id"])) echo "'ok'";else echo "'no'";?>)">
                <div class="index_offre_top_voyage_btn_more_titre">
                  <label for="">Réservez</label>
                  <img src="img/Client/icon/suivant18px.png" alt="">
                </div>
              </a>
            </div>
            </form>
          </div>
          <!-- -->
        </div>
      </div>
      <div class="page_cover"></div>
    </div>
    <div style="display:none;" id="chambre">
      <div class="formulaire_row_item list_div" >
        <div class="voyage_titre_remove">
          <input type="hidden" class="num_chambre"  name="num_chambre[]" value="0">
          <label for="" class="formulaire_row_item_label Nom_chambre">Chambre X</label>
          <button type="button" name="button"  class="btn_remove" >
            <img src="img\Client\icon\exit22px.png" alt="" width="22">
          </button>
        </div>
        <select class="formulaire_row_item_input list_select" name="type_chambre[]">
          <option value="1"> Chambre Single </option>
          <option value="2"> Chambre Double </option>
          <option value="3"> Chambre Triple</option>
        </select>
        <div class="nbr_personne">
          <div class="categorie_presonne">
            <label for=""><strong>adulte</strong></label>
            <div class="nbr_personne_btn">
              <button type="button" name="button" class="list_minus  minus"></button>
              <input type="text" name="adulte[]" value="1" class="list_input" readonly>
              <button type="button" name="button" class="list_plus plus"></button>
            </div>
          </div>
          <div class="categorie_presonne" >
            <label for=""><strong>enfant</strong>(-12ans)</label>
            <div class="nbr_personne_btn">
              <button type="button" name="button" class="list_minus minus"></button>
              <input type="text" name="enfant[]" value="0" class="list_input" readonly>
              <button type="button" name="button" class="list_plus plus"></button>
            </div>
          </div>
          <div class="categorie_presonne">
            <label for=""><strong>bebe</strong>(-3ans)</label>
            <div class="nbr_personne_btn">
              <button type="button" name="button" class="list_minus minus"></button>
              <input type="text" name="bebe[]" value="0" class="list_input" readonly>
              <button type="button" name="button" class="list_plus plus"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php  Footer(); ?>
  </body>
</html>
