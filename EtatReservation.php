<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION["email"])){
//  header("location: index.php");
}
include 'php/Client/standard.php';
require 'php/Admin/Control.php';
require 'php/database.inc';
require 'php/Client.inc';
$database=new database();

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
            <label for="" class="formulaire_titre">Félicitation</label>
            <hr class="formulaire_ligne"/>
            <div class="AlertConfirme">
              <strong>Échoué !</strong> votre email ou mot de passe est incorrect 
            </div>  
          </form>
        </div>
      </div>
    </div>
    <div class="page_cover"></div>
  </body>
</html>
