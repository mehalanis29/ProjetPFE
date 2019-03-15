<!DOCTYPE html>
<?php
require 'php/database.inc';
require 'php/Client.inc';
$Table=new ListClient($_GET);
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/css.php';?>
  </head>
  <body>
    <?php include 'html/navbar.html'; ?>
    <div class="page">
      <?php include 'html/sidebar.html'; ?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label">Client</label>
        </div>
        <div class="table">
          <div class="bartable">
            <a href="ClientControle.php"><img src="img/add32pxgreen.png" alt=""></a>
            <a href="#remove"><img src="img/remove32px.png" alt=""></a>
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
                	test 2eme user
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
                  $Table->bar('Client.php');
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
