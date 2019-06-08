<?php 
  if(isset($_GET["deco"])){
    session_destroy();
    header("location: index.php");
  }
 ?>
<div class="nav_bar_head">
  <div class="nav_bar_head_left">
    <div class="nav_bar_div_logo">
      <label class="nav_bar_logo">Logo</label>
    </div>
    <div class="nav_bar_list_btn">
      <a href="index.php" class="nav_bar_btn">Home</a>
      <a href="VoyageOrganise.php" class="nav_bar_btn">Voyage Organise</a>
      <a href="Admin" class="nav_bar_btn">Cote Admin</a>
    </div>
  </div>
  <div class="nav_bar_head_right">
    <?php if (isset($_SESSION["email"])): ?>
      <a href="#">Bonjour  , <?php echo $_SESSION["prenom"]." ".$_SESSION["nom"]; ?></a>
      <a href="index.php?deco">
        <img src="img\Client\icon\sort-down-filled-16.png">
      </a>
    <?php else: ?>
      <a href="Connexion.php">Connexion</a>
      <a href="Inscription.php" class="nav_bar_head_right_creer">Inscription</a>
    <?php endif; ?>
  </div>
</div>
