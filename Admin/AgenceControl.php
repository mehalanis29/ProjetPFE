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
  $agence=new agence($_POST["Modifier"],$_POST["nom"],$_POST["adress"],$_POST["telephone"],$_POST["fax"],
                    $_POST["email"],$_POST["password"]);
  $agence->UpdateAgence();

}
$database=new database();
$query_agence=$database->query("select * from compte_agence where compte_agence_id=".$_GET["compte_agence_id"]);
$result_agence=mysqli_fetch_assoc($query_agence);
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
            <div class="nav_tab_item" id="image_label">
              <label onclick="Tab('image')" for="">image</label>
            </div>
            <div class="nav_tab_item" id="Compte_label">
              <label onclick="Tab('Compte')" for="">Compte</label>
            </div>
          </div>
          <form class="" action="Parametre.php" method="post" >
            <div id="Information_div"  class="nav_tab_div nav_tab_div_active">
              <div class="left_tab">
            <fieldset class="fields">
              <legend class="legends">Information De l'Agence</legend>
              <div class="control_table">
                <div class="control_table_item">
                  <label class="controllabel" for="" >Nom</label>
                  <input type="text" id="nom" name="nom"  class="controlinput"
                        value="<?php echo $result_agence["nom"]; ?>">
                </div>
                <div class="control_table_item">
                  <label class="controllabel" for="">Adresse</label>
                  <textarea name="adress" class="controlinput"><?php echo $result_agence["adresse"]; ?></textarea>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Phone</label>
                  <input type="text" name="telephone" class="controlinput"
                       value="<?php echo $result_agence["telephone"]; ?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Fax</label>
                  <input type="text" name="fax" class="controlinput" required
                      value="<?php echo $result_agence["fax"]; ?>">
                </div>
                <div class="control_table_item">
                  <label class="controllabel" for="">Description</label>
                  <textarea name="adress" class="controlinput"><?php echo $result_agence["description"]; ?></textarea>
                </div>
              </div>
               </fieldset>
             </div>
            </div>
            <div id="image_div"  class="nav_tab_div">
               <div class="left_tab">
                 <fieldset class="fields">
                  <legend class="legends">Logo</legend>
                  <div class="control_table">
                    <div class="control_table_item">
                      <img src="..\img\Admin\AgenceLogo\<?php echo  $result_agence["compte_agence_id"]; ?>.png" style="width: 60px">
                      <input type="file"  name="email"  class="controlinput" value="<?php echo $result_agence['compte_agence_id']; ?>.png">
                    </div>
                  </div>
                </fieldset>
               </div>
            </div>
            <div id="Compte_div"  class="nav_tab_div">
              <div class="left_tab">
                 <fieldset class="fields">
                  <legend class="legends">Compte</legend>
                  <div class="control_table">
                    <div class="control_table_item">
                      <label class="controllabel" for="" >Email</label>
                      <input type="email" id="email" name="email"  class="controlinput"
                            value="<?php echo $result_agence["email"]; ?>">
                    </div>
                    <div class="control_table_item">
                          <label class="controllabel" for="" >Password</label>
                          <input type="password" id="password" name="password"  class="controlinput"
                                value="">
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
            <hr>
           <div class="control_div_btn">
              <button type="submit" class="control_btn" value="<?php echo $result_agence["compte_agence_id"]; ?>" name="Modifier">Modifier</button>
           </div>
           </div>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
