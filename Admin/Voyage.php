<?php
require '../php/Admin/standard.php';
require '../php/database.inc';
require '../php/Voyage.inc';
include '../php/Admin/VoyageFunction.php';
$database=new database();
session_start();

if(isset($_POST["remove_list"])){
  foreach ($_POST["remove_list"] as $k  => $voyage_id) {
    $database->query("DELETE FROM  `voyage` WHERE voyage_id=".$voyage_id);
  }
}
$where="";
if(isset($_POST["rech"])){
  $where="and nom_ville like '%".$_POST["rech"]."%'";
}
$result=$database->query("select voyage_id, voyage.nom as nom_voyage,ville.nom as nom_ville,pays.nom as nompays from voyage join ville join pays on voyage.ville_id=ville.ville_id and ville.pays_id=pays.pays_id where voyage.compte_agence_id=".$_SESSION['compte_agence_id']." $where limit ".CalculDebut($_GET).", 10")
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
                  <th><input type="checkbox" id="checkbox_all" onclick="SelecteAll()" /></th>
                  <th>Nom</th>
                  <th>Pays</th>
                  <th>Ville</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row=mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td width='10'>
                      <input type="checkbox" class="remove_list" name="remove_list[]" value="<?php echo $row["voyage_id"]; ?>"/>
                    </td>
                    <td><?php echo $row["nom_voyage"]; ?></td>
                    <td><?php echo $row["nompays"]; ?></td>
                    <td><?php echo $row["nom_ville"]; ?></td>
                    <td>
                      <a href="VoyageControl.php?voyage_id=<?php echo $row["voyage_id"]; ?>" class="produitbtn produitbtnedit">Detail</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
            <div class="tableinfo">
              <ul class="listinfo">
                <?php
                  bar($_GET,IssetRech($_POST),"Voyage.php");
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
