<!DOCTYPE html>
<?php
require 'php/database.inc';
include 'php/Client/standard.php';
require 'php/Voyage.inc';
$voyage=new Voyage(1,"","","","","","","");
$list_photo=$voyage->LoadListPhoto();
$jour=$voyage->LoadListEndroit();
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/Client/css.php'; ?>
    <script type="text/javascript" src="js\Client\Voyage.js">
    </script>
  </head>
  <body onload="window.i=0;AfficheImage()">
    <div class="nav_bar">
      <?php NabBar(); ?>
      <div class="nav_bar_cover_index">
        <div class="nav_bar_cover_index_img">
          <img src="img/Client/Cover/cover-roma.jpeg" alt="">
        </div>
        <div class="nav_bar_titre">
          Roma
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
              <label>Roma</label>
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
              <div class="jour_voyage">
                <label for="">Jour</label>
                <div class="numero_jour_voyage">1</div>
                <div class="description_jour">
                  <strong>Alger - Rome</strong>
                  <p>
                    Départ de Alger à destination de ROME sur vol Air-algerie.
                    Arrivé assistance et départ vers Rome ,
                    arriver à Hôtel, répartition des chambres et soirée libre
                  </p>
                </div>
              </div>
              <div class="jour_voyage">
                <label for="">Jour</label>
                <div class="numero_jour_voyage">2</div>
                <div class="description_jour">
                  <strong>Big Bus Rome Hop-on Hop-off</strong>
                  <p>
                    Asseyez-vous et profitez de la balade à bord d'un bus à toit ouvert et découvrez l'histoire unique et ancienne de Rome.
                  </p>
                </div>
              </div>
            <!-- Affiche list des jour -->
              <?php /* foreach ($jour as $k => $v) {?>
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
              <?php } */ ?>
            </div>
          </div>
        </div>
      </div>
      <div class="voyage_page_droite">
        <div class="page_droite">
          <div class="espace_voyage" id="espace_reservation">
            <div class="formulaire_titre">
              Reservation
            </div>
            <hr class="formulaire_ligne">
            <div class="reservation_prix">
              <label >à partir de</label>
              <span>
                125,000 DA
              </span>
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Périodes</label>
              <select class="formulaire_row_item_input" name="">
                <option value="">du 30/06/2019 au 06/07/2019 </option>
                <option value="">du 07/07/2019 au 13/07/2019 </option>
                <option value="">du 14/07/2019 au 20/07/2019 </option>
              </select>
            </div>
            <div class="list_chambre">
              <label >Chambres</label>
              <button type="button" name="button"  onclick="AjouterChambre()">
                <img src="img\Client\icon\add22px.png" alt="">
              </button>
            </div>
            <div id="list_chambre">
              <div class="formulaire_row_item">
                <label for="" class="formulaire_row_item_label">Chambre 1</label>
                <select class="formulaire_row_item_input" name="">
                  <option value=""> Chambre single </option>
                  <option value=""> Chambre double </option>
                </select>
                <div class="nbr_personne">
                  <div class="categorie_presonne">
                    <label for=""><strong>adulte</strong></label>
                    <div class="nbr_personne_btn">
                      <button type="button" name="button" class="minus"></button>
                      <input type="text" name="" value="2">
                      <button type="button" name="button" class="plus"></button>
                    </div>
                  </div>
                  <div class="categorie_presonne" >
                    <label for=""><strong>enfant</strong>(-16ans)</label>
                    <div class="nbr_personne_btn">
                      <button type="button" name="button" class="minus"></button>
                      <input type="text" name="" value="0">
                      <button type="button" name="button" class="plus"></button>
                    </div>
                  </div>
                  <div class="categorie_presonne">
                    <label for=""><strong>bebe</strong>(-2ans)</label>
                    <div class="nbr_personne_btn">
                      <button type="button" name="button" class="minus"></button>
                      <input type="text" name="" value="0">
                      <button type="button" name="button" class="plus"></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="index_offre_top_voyage_btn_more">
              <a href="#">
                <div class="index_offre_top_voyage_btn_more_titre">
                  <label for="">Réservez</label>
                  <img src="img/Client/icon/suivant18px.png" alt="">
                </div>
              </a>
            </div>
          </div>
          <!-- -->
        </div>
      </div>
      <div class="page_cover"></div>
    </div>
    <div style="display:none;" id="chambre">
      <div class="formulaire_row_item" id="remove_$NBR$">
        <div class="voyage_titre_remove">
          <label for="" class="formulaire_row_item_label">Chambre $NBR$</label>
          <button type="button" name="button" value="$NBR$" onclick="RemoveChambre(this.value)" >
            <img src="img\Client\icon\exit22px.png" alt="" width="22">
          </button>
        </div>
        <select class="formulaire_row_item_input" name="">
          <option value=""> Chambre single </option>
          <option value=""> Chambre double </option>
        </select>
        <div class="nbr_personne">
          <div class="categorie_presonne">
            <label for=""><strong>adulte</strong></label>
            <div class="nbr_personne_btn">
              <button type="button" name="button" class="minus"></button>
              <input type="text" name="" value="2">
              <button type="button" name="button" class="plus"></button>
            </div>
          </div>
          <div class="categorie_presonne" >
            <label for=""><strong>enfant</strong>(-16ans)</label>
            <div class="nbr_personne_btn">
              <button type="button" name="button" class="minus"></button>
              <input type="text" name="" value="0">
              <button type="button" name="button" class="plus"></button>
            </div>
          </div>
          <div class="categorie_presonne">
            <label for=""><strong>bebe</strong>(-2ans)</label>
            <div class="nbr_personne_btn">
              <button type="button" name="button" class="minus"></button>
              <input type="text" name="" value="0">
              <button type="button" name="button" class="plus"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
