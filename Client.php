<!DOCTYPE html>
<?php
require 'php/database.inc';
require 'php/Client.inc';
include 'php/ClientFunction.php';
if(isset($_POST["remove_list"])){
  removeClient($_POST["remove_list"]);
}
$Table=new ListClient($_GET);

?>
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
            Client
          </label>
        </div>
        <div class="table">
          <form class="" action="Client.php" method="post">
          <div class="bartable">
              <a href="ClientControle.php"><img src="img/add32pxgreen.png" alt=""></a>
              <button type="submit" name="button"><img src="img/remove32px.png" alt=""></button>
          </div>
          <div class="divtable">
            <form method="GET" action="Client.php">
              <div class="barrecherche">
                <input type="text" name="rech" value="">
                <button type="submit"><img src="img/search24pxwhite.png"></button>
              </div>
            </form>
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
