<!DOCTYPE html>
<?php
session_start();
/*if(!isset($_SESSION["compte_agence_id"])){
  header('location: ../index.php');
}*/
require '../php/Admin/standard.php';
require "../php/database.inc";
require '../php/agence.inc';
require '../php/Agence/Control.php';
$database=new database();
if(isset($_POST["Modifier"])){
//  $agence=new agence($_POST["Modifier"],$_POST["nom"],$_POST["adress"],$_POST["telephone"],$_POST["fax"],
                  //  $_POST["email"],$_POST["password"]);
  //$agence->UpdateAgence();

}
$database=new database();
$query_contact=$database->query("select * from contact where contact_id=".$_GET["contact_id"]);
$result_contact=mysqli_fetch_assoc($query_contact);
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php CSS();?>
    <script src="../js/Admin/Controle.js">

    </script>

  </head>
  <body>
    <?php NavBar(); ?>
    <div class="page">
      <?php SideBar(); ?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label">
            <a href="Client.php"><img src="../img/Admin/icon/back_bleu_40px.png" alt=""></a>
             Agence de voyage
          </label>
        </div>
        <div class="table">
          <div class="nav_tab">
            <div class="nav_tab_item nav_tab_item_active"  id="Information_label">
               <label onclick="Tab('Information')" for="">Information</label>
            </div>
          </div>
          <form class="" action="Parametre.php" method="post" >
            <div id="Information_div"  class="nav_tab_div nav_tab_div_active">
              <div class="left_tab">
            <fieldset class="fields">
              <legend class="legends">Information De l'Agence</legend>
              <div class="control_table">
                <div class="control_table_item">
                  <label class="controllabel" for="" >Nom & Prenom</label>
                  <input type="text" id="nom" name="nom"  class="controlinput"
                        value="<?php echo $result_contact["nom"]." ".$result_contact["prenom"]; ?>">
                </div>
                <div class="control_table_item">
                  <label class="controllabel" for="">email</label>
                  <input type="text" name="telephone" class="controlinput"
                       value="<?php echo $result_contact["email"]; ?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">telephone</label>
                  <input type="text" name="telephone" class="controlinput"
                       value="<?php echo $result_contact["telephone"]; ?>">
                </div>
                <div class="control_table_item">
                  <label class="controllabel" for="">Message</label>
                  <textarea name="adress" class="controlinput"><?php echo $result_contact["message"]; ?></textarea>
                </div>
              </div>
               </fieldset>
             </div>
            </div>
            <hr>
           <div class="control_div_btn">
              <button type="submit" class="control_btn" value="<?php echo $result_contact["contact_id"]; ?>" name="Modifier">Modifier</button>
           </div>
           </div>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
