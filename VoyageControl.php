<?php
 require "php/database.inc";
 require "php/Admin/Voyage.inc";
 require 'php/Admin/Control.php';
 include "php/Admin/VoyageFunction.php";
 if(isset($_POST["nom"])){
   $voyage=new voyage($_POST["voyage_id"],$_POST["nom"],$_POST["ville_id"]
                     ,$_POST["nbr_jour"],$_POST["hotel_id"],$_POST["description"]
                     ,$_POST["prix"],$_POST["capacite"],$_POST["img"]);

   if(isset($_POST["controlAjoutebtn"]))
   {
    $voyage->Insertvoyage();
    header("location: Voyage.php");

   }else{
     $voyage->Updatevoyage();
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
    <?php include 'php/Admin/css.php';?>
    <script src="js/admin/Controle.js"></script>
  </head>
  <body  onload="">
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
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Pays</label>
                  <select class="controlinput" name="pays" onchange="LoadVille(this.value)">
                    <?php
                      if(isset($_POST["pays"])){ $pays=$_POST["pays"];  }else{ $pays=$voyage->pays; }
                      LoadPays($pays);
                    ?>
                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Ville</label>
                  <select class="controlinput" name="ville_id" id="ville"  onchange="LoadHotel(this.value)">

                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Hotel</label>
                  <select class="controlinput" name="hotel_id" id="hotel" >

                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Description</label>
                  <textarea name="description" class="controlinput" rows="3" cols="80"><?php
                   if(isset($_POST["description"])){ echo $_POST["description"];}else{echo $voyage->description;}
                   ?></textarea>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Prix</label>
                  <input type="text" name="prix" value="" class="controlinput
                        <?php if((isset($_POST["prix"]))&&(empty($_POST["prix"])))echo "control_input_erreur";?>"
                       value="<?php if(isset($_POST["prix"])){ echo $_POST["prix"];} else{ echo $voyage->prix;}?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Capacite</label>
                  <input type="number" name="capacite" class="controlinput
                        <?php if((isset($_POST["capacite"]))&&(empty($_POST["capacite"])))echo "control_input_erreur";?>"
                         value="<?php if(isset($_POST["capacite"])){ echo $_POST["capacite"];} else{ echo $voyage->capacite;}?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Image</label>
                  <input type="file" name="img" class="controlinput">
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
