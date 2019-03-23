<?php
require 'php/database.inc';
require 'php/Voyage.inc';
include 'php/VoyageFunction.php';
if(isset($_POST["remove_list"])){
  removeVoyage($_POST["remove_list"]);
}
$Table=new ListVoyage($_POST);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/css.php';?>
    <script src="js/admin/standrad.js">

    </script>
  </head>
  <body>
    <?php include 'html/navbar.html'; ?>
    <div class="page">
      <?php include 'html/sidebar.html'; ?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label">
            <a href="index.php"><img src="img/back_bleu_40px.png" alt=""></a>
            Voyage
          </label>
        </div>
        <div class="table">
          <form class="" action="Voyage.php" method="post">
          <div class="bartable">
              <a href="VoyageControl.php"><img src="img/add32pxgreen.png" alt=""></a>
              <button type="submit" class="btn_remove_all" name="button"><img src="img/remove32px.png" alt=""></button>
          </div>
          <div class="divtable">
            <div class="barrecherche">
              <input type="text" name="rech" value="">
              <button type="submit"><img src="img/search24pxwhite.png"></button>
            </div>
            <table class="infotable">
              <thead>
                <tr>
                  <?php
                     $Table->head();
                   ?>
                </tr>
              </thead>
              <tbody>
                <?php
                    $Table->Table();
                ?>
              </tbody>
            </table>
            <div class="tableinfo">
              <ul class="listinfo">
                <?php
                  $Table->bar();
                ?>
              </ul>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
