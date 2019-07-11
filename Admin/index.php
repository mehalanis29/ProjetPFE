<!DOCTYPE html>
<?php
require '../php/Admin/standard.php';
 session_start();

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php CSS();?>
  </head>
  <body>
    <?php NavBar();?>
    <div class="page">
      <?php SideBar(); ?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label"> Accueil </label>
        </div>
        <div class="index">
          <div class="list_item">
            <a href="Client.php" class="item_page_a">
              <div class="item_page">
                <div class="item_page_icon">
                  <img src="../img/Admin/icon/clientxwhite62px.png" alt="">
                </div>
                <div class="item_page_titre">
                   <label for="">Client</label>
                </div>
              </div>
            </a>
            <a href="Voyage.php" class="item_page_a">
              <div class="item_page">
                <div class="item_page_icon">
                  <img src="../img/Admin/icon\voyagewhite62px.png" alt="">
                </div>
                <div class="item_page_titre">
                   <label for="">Voyage</label>
                </div>
              </div>
            </a>
            <a href="Reserver.php" class="item_page_a">
              <div class="item_page">
                <div class="item_page_icon">
                  <img src="../img/Admin/icon/reservationwhite32px.png" alt="">
                </div>
                <div class="item_page_titre">
                   <label for="">Reserver</label>
                </div>
              </div>
            </a>
            <a href="Client.php" class="item_page_a">
              <div class="item_page">
                <div class="item_page_icon">
                  <img src="../img/Admin/icon/clientxwhite62px.png" alt="">
                </div>
                <div class="item_page_titre">
                   <label for="">Client</label>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
