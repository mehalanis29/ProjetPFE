<?php
require '../php/Agence/standard.php';
require '../php/database.inc';
require '../php/Voyage.inc';
include '../php/Agence/VoyageFunction.php';
$database=new database();
session_start();
require '../php/Agence/verefieuser.php';

if(isset($_POST["remove_list"])){
  foreach ($_POST["remove_list"] as $k  => $reserve_id) {
    $database->query("DELETE FROM  reserve WHERE reserve_id=".$reserve_id);
  }
}
$where="";
if(isset($_POST["rech"]))
{
 // $where="and  nom_ville like '%".$_POST["rech"]."%'";
}
$result=$database->query("select reserve_id,concat(client.nom,\" \",client.prenom) as nom_client,voyage.nom as voyage_nom from  reserve
                          join voyage_date on reserve.voyage_date_id=voyage_date.voyage_date_id
                          join voyage on  voyage_date.voyage_id=voyage.voyage_id
                          join client on reserve.client_id=client.client_id
                          where reserve.compte_agence_id=".$_SESSION['compte_agence_id']."  $where limit ".CalculDebut($_GET).", 10");
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
            Reserver
          </label>
        </div>
        <div class="table">
          <form class="" action="Reserver.php" method="post">
          <div class="bartable">
              <a href="ReserverControl.php"><img src="../img/Admin/icon/add32pxgreen.png" alt=""></a>
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
                  <th>Id</th>
                  <th>Nom Du Client</th>
                  <th>Nom du Voyage</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row=mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td width='10'>
                      <input type="checkbox" class="remove_list" name="remove_list[]" value="<?php echo $row["reserve_id"]; ?>"/>
                    </td>
                    <td><?php echo $row["reserve_id"]; ?></td>
                    <td><?php echo $row["nom_client"]; ?></td>
                    <td><?php echo $row["voyage_nom"]; ?></td>
                    <td>
                      <a href="ReserverControl.php?reserve_id=<?php echo $row["reserve_id"]; ?>" class="produitbtn produitbtnedit">Detail</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
            <div class="tableinfo">
              <ul class="listinfo">
                <?php
                  bar($_GET,IssetRech($_POST),"Reserver.php");
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
