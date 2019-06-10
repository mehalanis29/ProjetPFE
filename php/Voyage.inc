<?php
require "Endroit.inc";
require 'image.inc';
class Voyage{
  public $voyage_id;
  public $nom;
  public $ville;
  public $nbr_jour;
  public $hotel_id;
  public $description;
  public $img;
  public function __construct($voyage_id,$nom,$ville,$nbr_jour,$hotel_id, $description,$img)
{
  $this->voyage_id=$voyage_id;
  $this->nom=$nom;
  $this->ville=$ville;
  $this->nbr_jour=$nbr_jour;
  $this->hotel_id=$hotel_id;
  $this->description=$description;
  $this->img=$img;
}
public function InsertVoyage()
{
  $database=new database();
  $result=$database->query("INSERT INTO `voyage`( nom,`ville_id`,
                                         `nbr_jour` ,`hotel_id`,
                                         `description`,  `cover`)
                      VALUES ('$this->nom',$this->ville
                              ,$this->nbr_jour,$this->hotel_id,'$this->description'
                              ,'$this->img')");
  return $database->insertid($result);
}

public function UpdateVoyage()
{
  $database=new database();
  $database->query("UPDATE `voyage` SET  nom='$this->nom' ,`ville_id`=$this->ville
                                         ,`nbr_jour`=$this->nbr_jour,`hotel_id`=$this->hotel_id,`description`='$this->description'
                                         , `cover`='$this->img' WHERE voyage_id=$this->voyage_id");

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
