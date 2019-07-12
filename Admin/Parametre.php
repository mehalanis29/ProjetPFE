<!DOCTYPE html>
<?php
require '../php/Admin/standard.php';
require "../php/database.inc";
require '../php/Client.inc';
require '../php/Admin/Control.php';
include '../php/Admin/ClientFunction.php';
if(isset($_POST["nom"])){
  $agence=new agence($_POST["compte_agence_id"],$_POST["nom"],$_POST["adress"],$_POST["telephone"],$_POST["fax"],
                    $_POST["email"],"",$_POST["password"]);
  if(isset($_POST["controlModifiebtn"])){
    $agence->UpdateClient();
    header("location: Client.php");
  }elseif(issetClient($_POST))
  {
    $agence->InsertAgence();
    header("location: Client.php");
  }

}
$etat="Modifie";
if(isset($_GET["compte_agence_id"])){
$etat="Modifie";
$agence = LoadClient($_GET["compte_agence_id"]);
}
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
          <form class="" action="Parametre.php" method="post" onsubmit="return VerifieNom()">
            <div id="Information_div"  class="nav_tab_div nav_tab_div_active">
              <div class="left_tab">
            <fieldset class="fields">
              <legend class="legends">Information De l'Agence</legend>
              <div class="control_table">
                <div class="control_table_item">
                  <label class="controllabel" for="" >Nom</label>
                  <input type="text" id="nom" name="nom"  class="controlinput"
                        value="<?php if(isset($agence))echo $agence->nom; ?>">
                </div>
                <div class="control_table_item">
                  <label class="controllabel" for="">Adresse</label>
                  <input type="text" name="adress" class="controlinput"
                         value="<?php if(isset($agence))echo $agence->adress; ?>">
                </div>

                <div class="control_table_item">
                  <label for="" class="controllabel">Phone</label>
                  <input type="text" name="telephone" class="controlinput"
                       value="<?php if(isset($agence))echo $agence->telephone; ?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Fax</label>
                  <input type="text" name="fax" class="controlinput" required
                      value="<?php if(isset($agence))echo $agence->fax;?>">
                </div>
              </div>
               </fieldset>
             </div>
            </div>
            <div id="image_div"  class="nav_tab_div">
               <div class="left_tab">
                 <fieldset class="fields">
                  <legend class="legends">Les images</legend>
                  <div class="control_table">
                  
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
                            value="<?php if(isset($agence))echo $agence->nom; ?>">
                    </div>
                    <div class="control_table_item">
                          <label class="controllabel" for="" >Password</label>
                          <input type="password" id="password" name="password"  class="controlinput"
                                value="<?php if(isset($agence))echo $agence->nom; ?>">
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
            <hr>
           <div class="control_div_btn">
             <input type="hidden" name="compte_agence_id" value="<?php if(isset($agence)) {echo $agence->compte_agence_id;}else{ echo "-1";} ?>">
              <button type="submit" class="control_btn" name="control<?php echo $etat; ?>btn"><?php echo $etat; ?></button>
           </div>
           </div>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
