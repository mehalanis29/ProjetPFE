<?php
require 'Admin/Table.inc';
require "Endroit.inc";
require 'image.inc';
class Voyage{
  public $voyage_id;
  public $ville_id;
  public $nbr_jour;
  public $hotel_id;
  public $description;
  public $prix;
  public $capacite;
  public $img;
  public function __construct($voyage_id,
   $ville_id,$nbr_jour,$hotel_id,
  $description,$prix,$capacite,$img)
{
  $this->voyage_id=$voyage_id;
  $this->ville_id=$ville_id;
  $this->nbr_jour=$nbr_jour;
  $this->hotel_id=$hotel_id;
  $this->description=$description;
  $this->prix=$prix;
  $this->capacite=$capacite;
  $this->img=$img;
}
public function InsertVoyage()
{
  $database=new database();
  $database->query("INSERT INTO `voyage`( `ville_id`,
                                         `nbr_jour` ,`hotel_id`,
                                         `description`, `prix`, `capacite`, `img`)
                      VALUES ($this->ville_id
                              ,$this->nbr_jour,$this->hotel_id,'$this->description'
                              ,$this->prix,$this->capacite,'$this->img')");

}

public function UpdateVoyage()
{
  $database=new database();
  $database->query("UPDATE `voyage` SET   `ville_id`=$this->ville_id
                                         ,`nbr_jour`=$this->nbr_jour,`hotel_id`=$this->hotel_id,`description`='$this->description'
                                         , `prix`=$this->prix, `capacite`=$this->capacite
                                         , `img`='$this->img' WHERE voyage_id=$this->voyage_id");

}

public function AfficheRow()
{
  return "<tr><td width='10'><input type=\"checkbox\" class=\"remove_list\" name=\"remove_list[]\" value=\"$this->voyage_id\"/>
  </td><td>$this->voyage_id</td><td>$this->ville_id</td><td>$this->prix</td><td>".$this->ListBtn()."</td></tr>";
}
public function ListBtn()
{
   return "<a href=\"VoyageControl.php?voyage_id=".$this->voyage_id."\" class=\"produitbtn produitbtnedit\">Detail</a>";
}
public function LoadListEndroit()
{
  $list=array();
  $database=new database();
  $result=$database->query("select nbr_jour,endroit_nom,description from voyage_jour join endroit on voyage_jour.endroit_id=endroit.endroit_id
                                where voyage_id=".$this->voyage_id );
  while($row=mysqli_fetch_assoc($result)){
    $list[]=new Endroit($row["nbr_jour"],$row["endroit_nom"],'',$row["description"],"");
  }
  return $list;
}
public function LoadListPhoto()
{
  $list=array();
  $database=new database();
  $result=$database->query("select * from voyage_image where voyage_id=".$this->voyage_id );
  while($row=mysqli_fetch_assoc($result)){
    $list[]=new image($row["image_voyage_id"],$row["voyage_id"],$row["img"]);
  }
  return $list;
}
}

class ListVoyage extends Table{
  public $sql="select voyage_id,nom_ville,prix from voyage join ville on voyage.ville_id=ville.ville_id ";
  public $page="Voyage.php";

  public function __construct($GET)
  {
    $this->head=array('<input type="checkbox" id="checkbox_all"
     onclick="SelecteAll()" />','Id','Nom','prix','Operation');
    $this->GET=$this->FilterGET($GET);
    $where="";
    if(isset($GET["rech"])){
      $where="where nom like '".$GET["rech"]."%'";
    }
    $database=new database();
    $debut=$this->NumPage($GET)*10-10;
    $result=$database->query($this->sql." $where limit $debut,10");
    while ($row=mysqli_fetch_assoc($result)) {
      $this->table[]=new Voyage($row["voyage_id"],$row["nom_ville"],'nbr_jour','hotel_id','description',$row["prix"],'capacite','img');
}

}}
