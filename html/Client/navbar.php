<?php
  if(isset($_GET["deco"])){
    session_destroy();
    header("location: index.php");
  }
 ?>
<div class="nav_bar_head">
  <div class="nav_bar_head_left">
    <div class="nav_bar_div_logo">
      <label class="nav_bar_logo">
        <img src="img/logo.png" style="width: 80px;margin-top: -18px;">
      </label>
    </div>
    <div class="nav_bar_list_btn">
      <a href="index.php" class="nav_bar_btn">Home</a>
      <a href="VoyageOrganise.php" class="nav_bar_btn">Voyage Organise</a>
      <a href="Contact.php" class="nav_bar_btn">Contact</a>
      <!-- <a href="Admin\Login.php" class="nav_bar_btn">Cote Admin</a>-->
    </div>
  </div>
  <div class="nav_bar_head_right">
    <?php if (isset($_SESSION["email"])): ?>
      <a href="#">Bonjour  , <?php echo $_SESSION["prenom"]." ".$_SESSION["nom"]; ?></a>
      <div class="dropdown_menu_btn">
        <img class="dropdown_menu_img" src="img\Client\icon\sort-down-filled-16.png">
        <div class="dropdown_menu">
         <a href="ListReservation.php">
            Reservation
         </a>  
         <a href="Parametre.php">
            Parametre
         </a>  
         <a href="index.php?deco">
            déconnecter
         </a>  
        </div>
        
      </div>
      
    <?php else: ?>
      <a href="Connexion.php">Connexion</a>
      <a href="Inscription.php" class="nav_bar_head_right_creer">Inscription</a>
    <?php endif; ?>
  </div>
</div>
