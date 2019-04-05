<?php
require 'Admin/Table.inc';

class Client{
  public $id;
  public $num_passport;
  public $nom;
  public $prenom;
  public $date_naissance;
  public $pays;
  public $email;
  public $password ;
  public $phone;
  public $address;
  public $city;
  public $nationalite;
  public $date_emission_passport;
  public $date_expiration_passport;
  public function __construct($id,$num_passport,$nom,$prenom,$date_naissance,$pays,$email,$password ,$phone,$address,
                                     $city,$nationalite,$date_emission_passport,$date_expiration_passport)
  {
    $this->id=$id;
    $this->num_passport=$num_passport;
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->date_naissance=$date_naissance;
    $this->pays=$pays;
    $this->email=$email;
    $this->password =$password ;
    $this->phone=$phone;
    $this->address=$address;
    $this->city=$city;
    $this->nationalite=$nationalite;
    $this->date_emission_passport=$date_emission_passport;
    $this->date_expiration_passport=$date_expiration_passport;
  }
  public function InsertClient()
  {
    $database=new database();
    $database->query("INSERT INTO `client`(`num_passport`, `nom`, `prenom`, `date_naissance`,`pays` ,`email`, `password`
                , `phone`, `address`, `city`, `nationalite`, `date_emission_passport`, `date_expiration_passport`)
                VALUES ('$this->num_passport','$this->nom','$this->prenom','$this->date_naissance',$this->pays,'$this->email'
                  ,'$this->password','$this->phone','$this->address','$this->city',$this->nationalite
                  ,'$this->date_emission_passport','$this->date_expiration_passport')");
  }
  public function UpdateClient()
  {
    $database=new database();
    $database->query("UPDATE `client` SET `num_passport`='$this->num_passport' , `nom`='$this->nom'
         ,`prenom`='$this->prenom' , `date_naissance`='$this->date_naissance', `pays`=$this->pays , `email`='$this->email'
         ,`phone`='$this->phone' , `address`='$this->address' , `city`='$this->city'
         ,`nationalite`=$this->nationalite , `date_emission_passport`='$this->date_emission_passport'
         , `date_expiration_passport`='$this->date_expiration_passport' WHERE client_id=$this->id");
  }
  public function AfficheRow()
  {
    return "<tr><td width='10'><input type=\"checkbox\" class=\"remove_list\" name=\"remove_list[]\" value=\"$this->id\"/></td><td>$this->id</td><td>$this->nom</td><td>$this->prenom</td><td>".$this->ListBtn()."</td></tr>";
  }
  public function ListBtn(){
     return "<a href=\"ClientControle.php?idclient=".$this->id."\" class=\"produitbtn produitbtnedit\">Detail</a>";
  }
}
class ListClient extends Table{
  public $sql="select client_id,nom,prenom from client ";
  public $page="Client.php";
  public function __construct($GET)
  {
    $this->head=array('<input type="checkbox" id="checkbox_all" onclick="SelecteAll()" />','Id','Nom','Prenom','Operation');
    $this->GET=$this->FilterGET($GET);
    $where="";
    if(isset($GET["rech"])){
      $where="where nom like '".$GET["rech"]."%' or prenom like '%".$GET["rech"]."%'";
    }
    $database=new database();
    $debut=$this->NumPage($GET)*10-10;
    $result=$database->query($this->sql." $where limit $debut,10");
    while ($row=mysqli_fetch_assoc($result)) {
      $this->table[]=new Client($row["client_id"],'numpass',$row["nom"],$row['prenom'],'datenais','pays'
                                    ,'email','password','phone','adress','cite','nation','dateemiss','dateexpi');
    }
  }
}
