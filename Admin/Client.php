<!DOCTYPE html>
<?php
require '../php/Admin/standard.php';
require '../php/database.inc';
require '../php/Client.inc';
include '../php/Admin/ClientFunction.php';
$database=new database();
session_start();
if(isset($_POST["remove_list"])){
  removeClient($_POST["remove_list"]);
}
$where="";
if(isset($_POST["rech"])){
  $where="and nom like '".$_POST["rech"]."%' or prenom like '%".$_POST["rech"]."%'";
}
$result=$database->query("select client_id,nom,prenom from client where client_id in (SELECT `client_id` FROM `reserve` WHERE `compte_agence_id`=".$_SESSION['compte_agence_id']." ) $where limit ".CalculDebut($_GET).", 10")
?>
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
      <?php SideBar();?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label">
            <a href="index.php"><img src="../img/Admin/icon/back_bleu_40px.png" alt=""></a>
            Client
          </label>
        </div>
        <div class="table">
          <form class="" action="Client.php" method="post">
          <div class="bartable">
              <a href="ClientControle.php"><img src="../img/Admin/icon/add32pxgreen.png" alt=""></a>
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
                  <th><input type="checkbox" id="checkbox_all" onclick="SelecteAll()" /></th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row=mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td width='10'>
                      <input type="checkbox" class="remove_list" name="remove_list[]" value="<?php echo $row["client_id"]; ?>"/>
                    </td>
                    <td><?php echo $row["nom"]; ?></td>
                    <td><?php echo $row["prenom"]; ?></td>
                    <td>
                      <a href="ClientControle.php?idclient=<?php echo $row["client_id"]; ?>" class="produitbtn produitbtnedit">Detail</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
            <div class="tableinfo">
              <ul class="listinfo">
                <?php
                  bar($_GET,IssetRech($_POST),"Client.php");
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
