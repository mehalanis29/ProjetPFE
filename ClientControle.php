<!DOCTYPE html>
<?php
require "php/database.inc";
require 'php/Client.inc';
require 'php/Control.php';
include 'php/ClientFunction.php';
if(isset($_POST["nom"])){
  echo "ok";
  $client=new client($_POST["client_id"],$_POST["num_passport"],$_POST["nom"],$_POST["prenom"],$_POST["date_naissance"],
                    $_POST["pays"],$_POST["email"],"",$_POST["phone"],$_POST["address"],$_POST["city"],
                    $_POST["nationalite"],$_POST["date_emission_passport"],$_POST["date_expiration_passport"]);
  if(isset($_POST["controlModifiebtn"])){
    $client->UpdateClient();
    header("location: Client.php");
  }elseif(issetClient($_POST))
  {
    $client->InsertClient();
    header("location: Client.php");
  }

}
if(isset($_GET["idclient"])){
$etat="Modifie";
$client = LoadClient($_GET["idclient"]);
}else{
  $etat="Ajoute";
  $client = LoadClient(-1);
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
            <a href="Client.php"><img src="img/back_bleu_40px.png" alt=""></a>
            <?php echo $etat; ?> Client
          </label>
        </div>
        <div class="table">
          <form class="" action="ClientControle.php" method="post" onsubmit="return VerifieNom()">
            <div class="left_tab">
            <fieldset class="fields">
              <legend class="legends">Information Du Client</legend>
              <div class="control_table">
                <div class="control_table_item">
                  <label class="controllabel" for="" >Nom</label>
                  <input type="text" id="nom" name="nom"  class="controlinput
                        <?php if((isset($_POST["nom"]))&&(empty($_POST["nom"])))echo "control_input_erreur";?>"
                        value="<?php if(isset($_POST["nom"])){ echo $_POST["nom"];  }else{ echo $client->nom; }?>">
                </div>
                <div class="control_table_item">
                  <label class="controllabel" for="">Prenom</label>
                  <input type="text" name="prenom" class="controlinput
                        <?php if((isset($_POST["prenom"]))&&(empty($_POST["prenom"])))echo "control_input_erreur";?>"
                        value="<?php if(isset($_POST["prenom"])){ echo $_POST["prenom"];  }else{ echo $client->prenom; }?>">
                </div>
                <div class="control_table_item">
                  <label class="controllabel" for="">Date Naissance</label>
                  <input type="date" name="date_naissance" class="controlinput
                         <?php if((isset($_POST["date_naissance"]))&&(empty($_POST["date_naissance"])))
                                     echo "control_input_erreur";?>"
                         value="<?php if(isset($_POST["date_naissance"])){ echo $_POST["date_naissance"];  }
                                     else{ echo $client->date_naissance; }?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Email</label>
                  <input type="email" name="email" class="controlinput
                      <?php if((isset($_POST["email"]))&&(empty($_POST["email"])))echo "control_input_erreur";?>"
                      value="<?php if(isset($_POST["email"])){ echo $_POST["email"];  }
                                   else{ echo $client->email; }?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Phone</label>
                  <input type="text" name="phone" class="controlinput
                      <?php if((isset($_POST["phone"]))&&(empty($_POST["phone"])))echo "control_input_erreur";?>"
                       value="<?php if(isset($_POST["phone"])){ echo $_POST["phone"];  }
                                    else{ echo $client->phone; }?>">
                </div>
                <div class="control_table_item">
                    <label for="" class="controllabel">Pays</label>
                    <select name="pays" class="controlinput" >
                      <?php
                        if(isset($_POST["pays"])){ $pays=$_POST["pays"];  }else{ $pays=$client->pays; }
                        LoadPays($pays);
                       ?>
                    </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Cite</label>
                  <input type="text" name="city" class="controlinput
                    <?php if((isset($_POST["city"]))&&(empty($_POST["city"])))echo "control_input_erreur";?>"
                     value="<?php if(isset($_POST["city"])){ echo $_POST["city"];  }
                                  else{ echo $client->city; }?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Adresse</label>
                  <textarea name="address" class="controlinput
                    <?php if((isset($_POST["address"]))&&(empty($_POST["address"])))echo "control_input_erreur";?>"
                    cols="56" rows="5"><?php if(isset($_POST["address"])){echo $_POST["address"];}
                                             else{ echo $client->address; }?></textarea>
                </div>
              </div>
               </fieldset>
              <fieldset class="fields">
                  <legend class="legends">Information Du Passport</legend>
                  <div class="control_table">
                    <div class="control_table_item">
                      <label for="" class="controllabel">Nationalité</label>
                      <select class="controlinput" name="nationalite">
                         <?php
                           $result->data_seek(0);
                           if(isset($_POST["nationalite"])){ $nationalite=$_POST["nationalite"];  }
                           else{ $nationalite=$client->nationalite; }
                           while ($row=mysqli_fetch_assoc($result)) {
                             if($nationalite==$row['pays_id']){
                               echo "<option value='".$row['pays_id']."' selected>".$row["nationalite"]."</option>";
                             }else{
                               echo "<option value='".$row['pays_id']."'>".$row["nationalite"]."</option>";
                             }
                           }
                          ?>
                      </select>
                    </div>
                    <div class="control_table_item">
                      <label for="" class="controllabel">Passport ID</label>
                      <input type="text" name="num_passport" class="controlinput
                         <?php if((isset($_POST["num_passport"]))&&(empty($_POST["num_passport"])))echo "control_input_erreur";?>"
                         value="<?php if(isset($_POST["num_passport"])){ echo $_POST["num_passport"];  }
                                      else{ echo $client->num_passport; }?>">
                    </div>
                    <div class="control_table_item">
                      <label for="" class="controllabel">Emission du Passport</label>
                      <input type="date" name="date_emission_passport" class="controlinput
                        <?php if((isset($_POST["date_emission_passport"]))&&(empty($_POST["date_emission_passport"])))
                                    echo "control_input_erreur";?>"
                        value="<?php if(isset($_POST["date_emission_passport"])){ echo $_POST["date_emission_passport"];  }
                                     else{ echo $client->date_emission_passport; }?>">
                    </div>
                    <div class="control_table_item">
                      <label for="" class="controllabel">Expiration Du Passport</label>
                      <input type="date" name="date_expiration_passport" class="controlinput
                         <?php if((isset($_POST["date_expiration_passport"]))&&(empty($_POST["date_expiration_passport"])))
                                    echo "control_input_erreur";?>"
                         value="<?php if(isset($_POST["date_expiration_passport"])){
                                             echo $_POST["date_expiration_passport"];  }
                                      else{
                                             echo $client->date_expiration_passport;
                                      }?>">
                    </div>
                  </div>
             </fieldset>
           </div>
           <hr>
           <div class="control_div_btn">
             <input type="hidden" name="client_id" value="<?php if(isset($client)) {echo $client->id;}else{ echo "-1";} ?>">
             <button type="submit" class="control_btn" name="control<?php echo $etat; ?>btn"><?php echo $etat; ?></button>
           </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
