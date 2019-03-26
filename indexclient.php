<!DOCTYPE html>
<?php
include 'php/Client/standard.php';

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/Client/standard.css">
    <link rel="stylesheet" href="css/Client/navbar.css">
  </head>
  <body>
    <div class="nav_bar">
        <div class="nav_bar_head">
          <div class="nav_bar_div_logo">
            <label class="nav_bar_logo">Logo</label>
          </div>
          <div class="nav_bar_list_btn">
            <a href="#" class="nav_bar_btn">Home</a>
            <a href="#" class="nav_bar_btn">Voyage Organise</a>
          </div>
        </div>
        <div class="nav_bar_cover_index">
          <div class="nav_bar_from">
            <div class="nav_bar_from_titre">
              <button type="button" class="nav_bar_from_titre_choix nav_bar_from_titre_choix_active" name="button">
                voyage organisé
              </button>
              <button type="button" class="nav_bar_from_titre_choix" name="button">voyage</button>
              <button type="button" class="nav_bar_from_titre_choix" name="button">hotel</button>
            </div>
            <div class="nav_bar_div_form">
              <form class="formtest" action="indexclient.php" method="post">
                <div class="nab_bar_index_div_input">
                  <select class="nab_bar_index_input" placeholder="pays" name="">
                    <option value="">Pays</option>
                  </select>
                </div>
                <div class="nab_bar_index_div_input">
                  <select class="nab_bar_index_input" placeholder="ville" name="">
                    <option value="">ville</option>
                  </select>
                </div>
                <div class="nab_bar_index_div_input">
                  <label class="nab_bar_index_label"> </label>
                  <input type="date" class="nab_bar_index_input" placeholder="à partir" name="" value="">
                </div>
                <div class="nab_bar_index_div_input">
                  <button type="submit" class="recharche_btn" name="Recharche">Recharche</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>