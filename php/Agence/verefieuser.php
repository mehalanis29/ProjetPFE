<?php
if((!isset($_SESSION['email']))||(!isset($_SESSION['password']))){ header("location: Login.php");}
else{
    $database=new database();
    $result=$database->query("select * from compte_agence where email='".$_SESSION['email']."' and password='".$_SESSION['password']."'");
    $cpt=0;
    while ($row=mysqli_fetch_assoc($result)) {
    	$cpt++;
    }
    if($cpt==0){ header("location: Login.php"); }
}
?>
