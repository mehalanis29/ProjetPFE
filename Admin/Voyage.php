<?php
require '../php/Admin/standard.php';
require '../php/database.inc';
require '../php/Voyage.inc';
include '../php/Admin/VoyageFunction.php';
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
    <?php CSS();?>
    <script src="../js/Admin/standrad.js">

    </script>
  </head>
  <body>
    <?php NavBar(); ?>
    <div class="page">
      <?php SideBar(); ?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label">
            <a href="index.php"><img src="../img/Admin/icon/back_bleu_40px.png" alt=""></a>
            Voyage
          </label>
        </div>
        <div class="table">
          <form class="" action="Voyage.php" method="post">
          <div class="bartable">
              <a href="VoyageControl.php"><img src="../img/Admin/icon/add32pxgreen.png" alt=""></a>
              <button type="submit" class="btn_remove_all" name="button"><img src="../img/Admin/icon/remove32px.png" alt=""></button>
          </div>
          <div class="divtable">
            <div class="barrecherche">
              <input type="text" name="rech" value="">
              <button type="submit"><img src="../img/Admin/icon/search24pxwhite.png"></button>
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
