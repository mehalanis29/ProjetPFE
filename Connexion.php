<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION["email"])){
  header("location: index.php");
}
include 'php/Client/standard.php';
require 'php/Admin/Control.php';
require 'php/database.inc';
require 'php/Client.inc';
$database=new database();

 $i=-1;
if(isset($_POST["Connecter"])){
  $result=$database->query("select * from client where email='".$_POST["email"]."' and password='".md5($_POST["password"])."'");
  $i=0;
  while ($row=mysqli_fetch_assoc($result)) {
    $i++; $user=$row;
  }
  $txt="";
  if(isset($_POST["voyage_id"])){
   function AfficheGET($POST,$nom)
   {
     
      foreach ($POST[$nom] as $key => $value) {
         $txt.= $nom."[]=".$value."&";
      }
      return $txt;
   }
   $text="voyage_id=".$_POST["voyage_id"]."&compte_agence_id=".$_POST["compte_agence_id"]."&voyage_date_id=".$_POST["voyage_date_id"]."&".$text."&";
   $text.=AfficheGET($_POST,"num_chambre");
   $text.=AfficheGET($_POST,"type_chambre");
   $text.=AfficheGET($_POST,"adulte");
   $text.=AfficheGET($_POST,"enfant");
   $text.=AfficheGET($_POST,"bebe");
  }
  if($i==1){
    $_SESSION["client_id"]=$user["client_id"];
    $_SESSION["nom"]=$user["nom"];
    $_SESSION["prenom"]=$user["prenom"];
    $_SESSION["email"]=$user["email"];
    $_SESSION["password"]=$user["password"];
    if(isset($_POST["voyage_id"])){
       
        header("location: Reservez.php?".$text);
    }else{
      header("location: index.php");
    }
  }else{
  	header("location: Connexion.php?".$text."&erreurpassword=-1");
  }
}

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/Client/css.php'; ?>
    <script type="text/javascript" src="js/Client/index.js">

    </script>
  </head>
  <body>
    <div class="nav_bar">
      <?php NabBar(); ?>
    </div>
    <div class="Inscription_page">
      <div class="Connexion_formulaire">
        <div class="Inscription_formulaire">
          <form class="formulaire_form" action="Connexion.php" method="post">
            <label for="" class="formulaire_titre">Se connecter</label>
            <hr class="formulaire_ligne"/>
            <?php
            function Affiche($POST,$v)
            {
                foreach ($POST[$v] as $key => $value) {
            		echo "<input type=\"hidden\" name=\"".$v."[]\" value=\"".$value."\">";
            	}
            }
            if(isset($_GET["voyage_id"])):?>
              <input type="hidden" name="voyage_id" value="<?php echo $_GET["voyage_id"]; ?>">
              <input type="hidden" name="compte_agence_id" value="<?php echo $_GET["compte_agence_id"]; ?>">
              <input type="hidden" name="voyage_date_id" value="<?php echo $_GET["voyage_date_id"]; ?>">
            <?php
            Affiche($_GET,"num_chambre");
            Affiche($_GET,"type_chambre");
            Affiche($_GET,"adulte");
            Affiche($_GET,"enfant");
            Affiche($_GET,"bebe");
            endif;?>
            <?php if(isset($_GET["erreurpassword"])){  ?>
                  <div class="AlertErreur">
                    <strong>Échoué !</strong> votre email ou mot de passe est incorrect
                  </div>
            <?php } ?>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Email</label>
              <input type="text" name="email" required value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_row_item">
              <label for="" class="formulaire_row_item_label">Mot de Passe</label>
              <input type="password" name="password" required value="" class="formulaire_row_item_input">
            </div>
            <div class="formulaire_btn">
              <button type="submit" name="Connecter" class="index_offre_top_voyage_btn_more_titre btn_envoyee">
                <label for="">Connecter</label>
                <img src="img/Client/icon/suivant18px.png" alt="">
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="page_cover"></div>
    </div>
    <?php  Footer(); ?>
  </body>
</html>
