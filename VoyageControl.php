<?php
 require "php/database.inc";
 require "php/Voyage.inc";
 include "php/VoyageFunction.php";
 if(isset($_POST["nom"])){
   echo "ok";
   $voyage=new voyage($_POST["voyage_id"],$_POST["nom"],$_POST["ville_id"]
                     ,$_POST["nbr_jour"],$_POST["lieu_depart"]
                     ,$_POST["hotel_id"],$_POST["description"]
                     ,$_POST["prix"],$_POST["capacite"],$_POST["img"]);
   if(isset($_POST["controlModifiebtn"]))
   {
     $voyage->Updatevoyage();
     header("location: Voyage.php");
   }elseif(issetvoyage($_POST))
   {
     $voyage->Insertvoyage();
     header("location: Voyage.php");
   }

 }
 if(isset($_GET["voyage_id"]))
 {
 $etat="Modifie";
 $voyage = Loadvoyage($_GET["voyage_id"]);
 }else
 {
   $etat="Ajoute";
   $voyage = Loadvoyage(-1);
 }
 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/css.php';?>
    <script src="js/admin/Controle.js">

    </script>
  </head>
  <body>
    <?php include 'html/navbar.html'; ?>
    <div class="page">
      <?php include 'html/sidebar.html'; ?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label">
            <a href="Voyage.php"><img src="img/back_bleu_40px.png" alt=""></a>
            <?php echo $etat; ?> Voyage
          </label>
        </div>
        <div class="table">
          <form class="" action="VoyageControl.php" method="post" onsubmit="return VerifieNom()">
            <div class="left_tab">
            <fieldset class="fields">
              <legend class="legends">Information Du Voyage</legend>
              <div class="control_table">

                <div class="control_table_item">
                  <label for="" class="controllabel">Nom</label>
                  <input type="text" name="nom" class="controlinput
                        <?php if((isset($_POST["nom"]))&&(empty($_POST["nom"])))echo "control_input_erreur";?>"
                         value="<?php if(isset($_POST["nom"])){ echo $_POST["nom"];  }else{ echo $voyage->nom; }?>">


                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Nombre de jours</label>
                  <input type="number" name="nbr_jour" class="controlinput
                        <?php if((isset($_POST["nbr_jour"]))&&(empty($_POST["nbr_jour"])))echo "control_input_erreur";?>"
                         value="<?php if(isset($_POST["nbr_jour"])){ echo $_POST["nbr_jour"];} else{ echo $voyage->nbr_jour;}?>">
                          <!--bon mafhamtch 3lah dayer ville id dmain nseyi nkemel b9ali ghir formulaire nrmlment -->

                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel"></label>
                  <input type="text" name="" class="controlinput" value="">


                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel"></label>
                  <input type="text" name="" class="controlinput" value="">


                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel"></label>
                  <input type="text" name="" class="controlinput" value="">


                </div>

              </div>
            </fieldset>

           </div>
           <hr>
           <div class="control_div_btn">
             <input type="hidden" name="voyage_id" value="<?php if(isset($voyage)) {echo $voyage->voyage_id;}else{ echo "-1";} ?>">
             <button type="submit" class="control_btn" name="control<?php echo $etat; ?>btn"><?php echo $etat; ?></button>
           </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
