<?php
require 'Table.inc';

class Client{
  public $id;
  public $num_passport;
  public $nom;
  public $prenom;
  public $date_naissance;
  public $email;
  public $password ;
  public $phone;
  public $address;
  public $city;
  public $country;
  public $date_emission_passport;
  public $date_expiration_passport;
  public function __construct($id,$num_passport,$nom,$prenom,$date_naissance,$email,$password ,$phone,$address,
                                     $city,$country,$date_emission_passport,$date_expiration_passport)
  {
    $this->id=$id;
    $this->num_passport=$num_passport;
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->date_naissance=$date_naissance;
    $this->email=$email;
    $this->password =$password ;
    $this->phone=$phone;
    $this->address=$address;
    $this->city=$city;
    $this->country=$country;
    $this->date_emission_passport=$date_emission_passport;
    $this->date_expiration_passport=$date_expiration_passport;
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
    $this->head=array('<input type="checkbox" onclick="SelecteAll()" />','Id','Nom','Prenom','Operation');
    $this->GET=$this->FilterGET($GET);
    $where="";
    if(isset($GET["rech"])){
      $where="where nom like '".$GET["rech"]."%' or prenom like '%".$GET["rech"]."%'";
    }
    $database=new database();
    $debut=$this->NumPage($GET)*10-10;
    $result=$database->query($this->sql." $where limit $debut,10");
    while ($row=mysqli_fetch_assoc($result)) {
      $this->table[]=new Client($row["client_id"],'numpass',$row["nom"],$row['prenom'],'datenais'
                                    ,'email','password','phone','adress','cite','contry','dateemiss','dateexpi');
    }
  }
}
