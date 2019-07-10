<!DOCTYPE html>
<?php
require '../php/database.inc';
$database=new database();
session_start();
if(isset($_POST["exit"])){
  session_destroy();
}
if(isset($_POST["button"])){

$result=$database->query("select * from compte_agence where email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$cpt=0;
while ($row=mysqli_fetch_assoc($result)) {
  $cpt++;  $info=$row;
}

if($cpt==1){
  $_SESSION['compte_agence_id']=$info["compte_agence_id"];
  $_SESSION['username']=$_POST['username'];
  $_SESSION['password']=md5($_POST['password']);
  header("location: index.php");
}
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/admin/Login.css">
    <script type="text/javascript" src='js/login.js'>

    </script>
  </head>
  <body
      <div class="body">
       <div class="login">
         <div class="content">
           <div class="image">
             <img width="450" src="img/moza.png" alt="">
           </div>
           <div class="form" id="login_Compte">
           	<span class="member">Se connecter </span>
              <form method="post" action="Login.php">
                    <?php if((isset($_POST['username']))&&(isset($_POST['password']))){ ?>
                       <div class="erreur member">
                          <label>Nom d’utilisateur ou Mot de passe erroné</label>
                       </div>
                    <?php } ?>
                <div class="input">
                  <img class="icon" src="..\img\Admin\icon\user32px.png" alt="">
                   <input class="text" type="text" name="username" required value="<?php if(isset($_POST['username']))echo $_POST['username']; ?>" placeholder="Nom d’utilisateur">
                </div>
                <div class="input">
                  <img class="icon" src="..\img\Admin\icon\password32px.png" alt="">
                  <input class="text" type="Password" name="password" required placeholder="Mot de passe">
                </div>
                <button class="btn" type="submit" name="button">Connexion</button>
              </form>
           </div>
         </div>
      </div>
    </div>
  </body>
</html>
