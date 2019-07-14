<!DOCTYPE html>
<?php

require '../php/database.inc';
$database=new database();
 session_start();
require '../php/Admin/standard.php';

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
            <a href="Agence.php" class="item_page_a">
              <div class="item_page">
                <div class="item_page_icon">
                  <img src="../img/Admin/icon/clientxwhite62px.png" alt="">
                </div>
                <div class="item_page_titre">
                   <label for="">Agence</label>
                </div>
              </div>
            </a>
            <a href="Contact.php" class="item_page_a">
              <div class="item_page">
                <div class="item_page_icon">
                  <img src="../img/Admin/icon\voyagewhite62px.png" alt="">
                </div>
                <div class="item_page_titre">
                   <label for="">Voyage</label>
                </div>
              </div>
            </a>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
