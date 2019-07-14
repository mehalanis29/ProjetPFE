<?php
require '../php/Admin/standard.php';
 require "../php/database.inc";
 require "../php/Voyage.inc";
 require '../php/Admin/Control.php';
 include "../php/Admin/VoyageFunction.php";

$database=new database();
session_start();
require '../php/Admin/verefieuser.php';

 if(isset($_POST["remove_date"])){
  $database->query("delete from voyage_date where voyage_date_id=".$_POST["remove_date"]);
  header("location: VoyageControl.php?voyage_id=".$_POST['voyage_id']);
 }elseif(isset($_POST["ville_id"])){
   $voyage=new voyage($_POST["voyage_id"],$_POST["NomVoyage"],$_POST["ville_id"],$_POST["nbr_jour"]
                      ,$_POST["hotel_id"],$_POST["description"],"test.jpg");
   if(isset($_POST["controlAjoutebtn"]))
   {
    $id_voyage=$voyage->Insertvoyage();
    $target_file = "../img/Client/photo_index/".$id_voyage.".jpg";
    move_uploaded_file($_FILES["imge"]["tmp_name"], $target_file);
   }else{
     $voyage->Updatevoyage();
     $id_voyage=$_POST["voyage_id"];
   }
  foreach ($_POST["date_depart"] as $key => $date_depart) {
    if($_POST["id_voyage_date"][$key]==-1){
      $database->query("INSERT INTO `voyage_date`( `voyage_id`, `date_depart`, `date_retour`, `capacite`, `prix_A_S`, `prix_A_D`, `prix_A_T`, `prix_E`, `prix_B`) VALUES ($id_voyage,'$date_depart','".$_POST["date_retour"][$key]."',".$_POST["capacite"][$key].",".$_POST["A_S"][$key].",".$_POST["A_D"][$key].",".$_POST["A_T"][$key].",".$_POST["E"][$key].",".$_POST["B"][$key].")");
    }else{
      $database->query("UPDATE `voyage_date` SET `date_depart`='$date_depart',`date_retour`='".$_POST["date_retour"][$key]."',`capacite`=".$_POST["capacite"][$key].",`prix_A_S`=".$_POST["A_S"][$key].",`prix_A_D`=".$_POST["A_D"][$key].",`prix_A_T`=".$_POST["A_T"][$key].",`prix_E`=".$_POST["E"][$key].",`prix_B`=".$_POST["B"][$key]." WHERE `voyage_date_id`=".$_POST["id_voyage_date"][$key]);
    }
  }
  header("location: Voyage.php");
 }
 if(isset($_GET["voyage_id"]))
 {
 $voyage = Loadvoyage($_GET["voyage_id"]);
 }
 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php CSS();?>
    <script type="text/javascript" src="..\js\jquery.js"></script>
    <script src="../js/Admin/Controle.js"></script>
    <script src="../js/Admin/Voyage.js"></script>
  </head>
  <body  onload="">
    <?php NavBar();?>
    <div class="page">
      <?php SideBar(); ?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label">
            <a href="Voyage.php"><img src="../img/Admin/icon/back_bleu_40px.png" alt=""></a>
            <?php //echo $etat; ?> Voyage
          </label>
        </div>
        <div class="table">
          <div class="nav_tab">
            <div class="nav_tab_item nav_tab_item_active"  id="Information_label">
               <label onclick="suivant('Information')" for="">Information</label>
            </div>
            <div class="nav_tab_item" id="image_label">
              <label onclick="suivant('image')" for="">Image</label>
            </div>
            <div class="nav_tab_item" id="list_date_label">
              <label onclick="suivant('list_date')" for="">Date</label>
            </div>
          </div>
          <form class="" action="VoyageControl.php" method="post" enctype="multipart/form-data">
           <div id="Information_div"  class="nav_tab_div nav_tab_div_active">
            <div class="left_tab">
            <fieldset class="fields">
              <legend class="legends">Information Du Voyage</legend>
              <div class="control_table">
                <div class="control_table_item">
                  <label for="" class="controllabel" >Nom </label>
                  <input type="text" name="NomVoyage" class="controlinput" required value="<?php if(isset($voyage))echo $voyage->nom; ?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Pays</label>
                  <select class="controlinput" name="pays" required onchange="LoadVille(this.value)">
                    <?php
                      if(isset($voyage)){ $pays=VilletoPays($voyage->ville);  }
                      else{ $pays="-1"; }
                      LoadPays($pays);

                    ?>
                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Ville</label>
                  <select class="controlinput" name="ville_id" id="ville" required onchange="LoadHotel(this.value)">
                    <?php if(isset($voyage))LoadVille($voyage->ville,$pays) ?>
                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Hotel</label>
                  <select class="controlinput" name="hotel_id" id="hotel" required >
                    <?php if(isset($voyage))LoadHotel($voyage->hotel_id,$voyage->ville) ?>
                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Description</label>
                  <textarea name="description" class="controlinput" rows="3" cols="80" required><?php
                   if(isset($voyage))echo $voyage->description;
                   ?></textarea>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Nombre de jours</label>
                  <input type="number" name="nbr_jour" class="controlinput" required
                         value="<?php if(isset($voyage)) echo $voyage->nbr_jour;?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Image</label>
                  <input type="file" name="imge" id="imge" class="controlinput">
                </div>
              </div>
            </fieldset>
           </div>
           </div>
           <div id="image_div" class="nav_tab_div">
              <div class="left_tab">
              <fieldset class="fields">
                <legend class="legends">Les Date Du Voyage</legend>
                <div class="control_table" id="list_image">
                  <div class="control_table_item">
                    <button style="background: none;border: none" type="button" id="Ajouterimage"  >
                      <img src="..\img\Client\icon\add22px.png">
                    </button>
                    <label for="" class="controllabel" >  </label>
                  </div>
                  <div class="control_table_item list_image" id="">
                    <button style="background: none;border: none" type="button" name="remove_date" class="remove_list_image"
                          id="" >
                      <img src="..\img\Client\icon\exit22px.png">
                    </button>
                    <input type="file"  name="list_image[]"  class="controlinput">
                  </div>
                </div>
              </fieldset>
             </div>
            </div>
            <div id="list_date_div" class="nav_tab_div">
              <div class="left_tab">
              <fieldset class="fields">
                <legend class="legends">Les Date Du Voyage</legend>
                <div class="control_table" id="list_voyage">
                  <div class="control_table_9item">
                    <button style="background: none;border: none" type="button" id="AjouterVoyage"  >
                      <img src="..\img\Client\icon\add22px.png">
                    </button>
                    <label for="" class="controllabel" >Date Depart </label>
                    <label for="" class="controllabel" >Date Retour </label>
                    <label for="" class="controllabel" >Capacite </label>
                    <label for="" class="controllabel" >Adulte Single</label>
                    <label for="" class="controllabel" >Adulte Double</label>
                    <label for="" class="controllabel" >Adulte Triple</label>
                    <label for="" class="controllabel" >Enfant </label>
                    <label for="" class="controllabel" >Bebe</label>
                  </div>
                  <?php
                    if (isset($_GET["voyage_id"])):
                     $result=$database->query("SELECT * FROM `voyage_date` where voyage_id=".$voyage->voyage_id);
                     while ($row=mysqli_fetch_assoc($result)):
                   ?>
                    <div class="control_table_9item list_date" id="row_<?php echo $row["voyage_date_id"] ?>" >
                      <button style="background: none;border: none" type="submit" name="remove_date" class="remove_list"
                         value="<?php echo $row["voyage_date_id"] ?>" 
                          id="<?php echo $row["voyage_date_id"] ?>" >
                        <img src="..\img\Client\icon\exit22px.png">
                      </button>
                      <input type="hidden" name="id_voyage_date[]" required value="<?php echo $row["voyage_date_id"] ?>">
                      <input type="date" name="date_depart[]" required class="controlinput" value="<?php echo $row["date_depart"]; ?>">
                      <input type="date" name="date_retour[]" required class="controlinput" value="<?php echo $row["date_retour"]; ?>">
                      <input type="number" name="capacite[]" required class="controlinput" value="<?php echo $row["capacite"]; ?>">
                      <input type="number" name="A_S[]" required class="controlinput" value="<?php echo $row["prix_A_S"]; ?>">
                      <input type="number" name="A_D[]" required class="controlinput" value="<?php echo $row["prix_A_D"]; ?>">
                      <input type="number" name="A_T[]" required class="controlinput" value="<?php echo $row["prix_A_T"]; ?>">
                      <input type="number" name="E[]" required class="controlinput" value="<?php echo $row["prix_E"]; ?>">
                      <input type="number" name="B[]" required class="controlinput" value="<?php echo $row["prix_B"]; ?>">
                    </div>
                  <?php endwhile;
                endif;?>
                </div>
              </fieldset>
             </div>
            </div>
           <hr>
           <div class="control_div_btn">
             <input type="hidden" name="voyage_id" value="<?php if(isset($voyage)) {echo $voyage->voyage_id;}else{ echo "-1";} ?>">
              <?php if (isset($_GET["voyage_id"])): ?>
              <button type="submit" class="control_btn" name="controlModifierbtn">
               Modifier
              </button>
              <?php else: ?>
                <button type="button" class="control_btn" id="Ajouter" name="controlAjoutebtn" onclick="suivant('Information')">
                  Suivant
                </button>
              <?php endif ; ?>
           </div>
          </form>
        </div>
      </div>
    </div>
    <div style="display: none" id="row_voyage">
       <div class="control_table_9item list_date">
          <button style="background: none;border: none"  type="submit"  class="remove_list" >
            <img src="..\img\Client\icon\exit22px.png">
          </button>
          <input type="hidden" name="id_voyage_date[]" value="-1">
          <input type="date" required name="date_depart[]" class="controlinput">
          <input type="date" required name="date_retour[]" class="controlinput">
          <input type="number" required name="capacite[]" class="controlinput">
          <input type="number" required name="A_S[]" class="controlinput">
          <input type="number" required name="A_D[]" class="controlinput">
          <input type="number" required name="A_T[]" class="controlinput">
          <input type="number" required name="E[]" class="controlinput">
          <input type="number" required name="B[]" class="controlinput">
       </div>
    </div>
    <div style="display: none" id="row_image"> 
      <div class="control_table_item list_image" id="">
        <button style="background: none;border: none" type="submit" name="remove_date" class="remove_list_image" id="" >
          <img src="..\img\Client\icon\exit22px.png">
        </button>
        <input type="file"  name="list_image[]"  class="controlinput">
       </div>
    </div>
  </body>
</html>
