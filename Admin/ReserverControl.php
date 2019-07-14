<?php
require '../php/Admin/standard.php';
 require "../php/database.inc";
 require '../php/Admin/Control.php';
$database=new database();
 session_start();
require '../php/Admin/verefieuser.php';

if(isset($_GET["reserve_id"])){
  $result=$database->query("select reserve_id,client.client_id,reserve.voyage_date_id,voyage_date.voyage_id,concat(client.nom,\" \",client.prenom) as nom_prenom,DATE_FORMAT(date_reserve,'%d/%m/%Y') as  date_reserve,DATE_FORMAT(date_rendezvous,'%d/%m/%Y') as date_rendezvous,type_paiement,etat_paiement from reserve 
join voyage_date on voyage_date.voyage_date_id=reserve.voyage_date_id
join client on reserve.client_id=client.client_id where reserve_id=".$_GET["reserve_id"]);
  $reserver=mysqli_fetch_assoc($result);
  $result=$database->query("SELECT * FROM `chambre` where reserve_id=".$_GET["reserve_id"]);
  $chambre=array();
  $chambre_id="(";
  while ($row=mysqli_fetch_assoc($result)) {
    $chambre[$row["chambre_id"]]=array("nbr"=>$row["numero"],"chambre_id"=>$row["chambre_id"]);
    $chambre[$row["chambre_id"]]["invite"]=array();
    $chambre_id.=$row["chambre_id"].",";
  }
  $chambre_id=rtrim($chambre_id,",");
  $chambre_id.=")";
  $result=$database->query("SELECT invite_id,chambre_id,nom_prenom,type FROM `invite` where chambre_id in $chambre_id");
  $invite=array();
  while ($row=mysqli_fetch_assoc($result)) {
    $chambre[$row["chambre_id"]]["invite"][]=array("invite_id"=>$row["invite_id"],"nom_prenom"=>$row["nom_prenom"],"type"=>$row["type"]);
  }
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
             réservation
          </label>
        </div>
        <div class="table">
          <div class="nav_tab">
            <div class="nav_tab_item nav_tab_item_active"  id="Information_label">
               <label onclick="suivant('debut')" for="">Information</label>
            </div>
            <div class="nav_tab_item" id="list_date_label">
              <label onclick="suivant('Information')" for="">invites</label>
            </div>
          </div>
          <form class="" action="VoyageControl.php" method="post" >
           <div id="Information_div"  class="nav_tab_div nav_tab_div_active">
            <div class="left_tab">
            <fieldset class="fields">
              <legend class="legends">information réservation </legend>
              <div class="control_table">
                <div class="control_table_item">
                  <label for="" class="controllabel" >Nom et Prenom</label>
                  <input type="text" name="NomVoyage" class="controlinput" disabled value="<?php if(isset($reserver)) echo $reserver["nom_prenom"]; ?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Voyage</label>
                  <select class="controlinput" name="voyage" required  onchange="AfficheDate(this.value)">
                  <?php 
                    if(isset($reserver["voyage_id"]))$reserve=$reserver["voyage_id"];else $reserve=-1;
                    $result=$database->query("SELECT voyage_id,nom FROM `voyage` where `compte_agence_id`=".$_SESSION['compte_agence_id']."");
                    while($voyage=mysqli_fetch_assoc($result)){
                      if($voyage["voyage_id"]==$reserve){
                        echo "<option value=\"".$voyage["voyage_id"]."\" selected>".$voyage["nom"]."</option>";
                      }else{
                        echo "<option value=\"".$voyage["voyage_id"]."\">".$voyage["nom"]."</option>";
                      }
                    }
                  ?>
                  </select>
                </div>
                 <div class="control_table_item">
                  <label for="" class="controllabel">Voyage Date</label>
                  <select class="controlinput" name="voyage" required id='date_voyage'  >
                  <?php 
                  if(isset($reserver)){
                    $result=$database->query("SELECT voyage_date_id,concat('Du ',DATE_FORMAT(date_depart,'%d/%m/%Y'),' Au ',DATE_FORMAT(date_retour,'%d/%m/%Y')) as date FROM `voyage_date` where voyage_id=".$reserver["voyage_id"]);
                    while($voyage=mysqli_fetch_assoc($result)){
                      if($voyage["voyage_date_id"]==$reserver["voyage_date_id"]){
                        echo "<option value=\"".$voyage["voyage_date_id"]."\" selected>".$voyage["date"]."</option>";
                      }else{
                        echo "<option value=\"".$voyage["voyage_date_id"]."\">".$voyage["date"]."</option>";
                      }
                    }
                  }
                  ?>
                  </select>
                </div>
                <?php if(isset($reserver)): ?>
                <div class="control_table_item">
                  <label for="" class="controllabel">Date Reserver</label>
                  <input type="text" name="NomVoyage" class="controlinput" disabled value="<?php if(isset($reserver)) echo $reserver["date_reserve"]; ?>">
                </div >
                <div class="control_table_item">
                  <label for="" class="controllabel">Date Rendez-Vous</label>
                  <input type="text" name="NomVoyage" class="controlinput" disabled value="<?php if(isset($reserver)) echo $reserver["date_rendezvous"]; ?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Mode de paiement</label>
                  <input type="text" name="NomVoyage" class="controlinput" disabled value="<?php 
                    if(isset($reserver)){
                      if($reserver['type_paiement']==0){
                        echo "Paiement en espèces";
                      }else{
                        echo "Paiement en ligne";
                      }
                    }
                  ?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Paiement</label>
                  <select class="controlinput" name="voyage" required >
                  <?php 
                    $list=array(-1=>"pas encore",1=>"paye");
                    foreach ($list as $key => $value) {
                      if($key==$reserver["etat_paiement"]){
                         echo "<option value=\"$key\" selected>".$value."</option>";
                      }else{
                        echo "<option value=\"$key\">".$value."</option>";
                      }
                      
                    }
                   ?>
                  </select>
                </div>
                <?php endif; ?>
              </div>
            </fieldset>
           </div>
           </div>
            <div id="list_date_div" class="nav_tab_div">
              <div class="left_tab">
              <fieldset class="fields">
                <legend class="legends">les invités</legend>
                <div class="control_table" id="list_voyage">
                  <div class="control_table_2item">
                    <label for="" class="controllabel" >Chambre </label>
                    <div class="control_table_4item">
                      <button style="opacity: 0; background: none;border: none" type="button" id="AjouterVoyage"  >
                         <img src="..\img\Client\icon\add22px.png">
                      </button>
                      <label for="" class="controllabel" >Nom et Prenom</label>
                      <label for="" class="controllabel" >Type </label>
                    </div>
                  </div>
                  <?php foreach ($chambre as $key => $value): ?>
                    <div class="control_table_2item">
                     <input type="text" style="text-align:center;" required name="" class="controlinput" value="<?php echo $value["nbr"]; ?>">
                     <div class="control_table_multi_row">
                     <?php foreach ($value["invite"] as $key => $ivite): ?>
                      <div class="control_table_4item">
                        <button style="background: none;border: none" type="submit" name="remove_date" class="remove_list"
                             value="<?php echo $row["voyage_date_id"] ?>" 
                              id="<?php echo $row["voyage_date_id"] ?>" >
                           <img src="..\img\Client\icon\exit22px.png">
                         </button>
                         <input type="text"  name="" class="controlinput" value="<?php echo $ivite["nom_prenom"]; ?>">
                        <select class="controlinput" >
                           <option value="1" >Adult </option>
                           <option value="2">Enfant </option>
                           <option value="3">Bebe</option>
                        </select>
                      </div>
                     <?php endforeach ?>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>
              </fieldset>
             </div>
            </div>
           <hr>
           <div class="control_div_btn">
             <input type="hidden" name="reserve_id" value="">
              <?php if (isset($_GET["reserve_id"])): ?>
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
  </body>
</html>
