<?php
require "Endroit.inc";
require 'image.inc';
class Voyage{
  public $voyage_id;
  public $nom;
  public $ville_id;
  public $nbr_jour;
  public $hotel_id;
  public $description;
  public $img;
  public function __construct($voyage_id,$nom,$ville_id,$nbr_jour,$hotel_id, $description,$img)
{
  $this->voyage_id=$voyage_id;
  $this->nom=$nom;
  $this->ville_id=$ville_id;
  $this->nbr_jour=$nbr_jour;
  $this->hotel_id=$hotel_id;
  $this->description=$description;
  $this->img=$img;
}
public function InsertVoyage()
{
  $database=new database();
  $database->query("INSERT INTO `voyage`( `ville_id`,
                                         `nbr_jour` ,`hotel_id`,
                                         `description`,  `img`)
                      VALUES ($this->ville_id
                              ,$this->nbr_jour,$this->hotel_id,'$this->description'
                              ,'$this->img')");

}

public function UpdateVoyage()
{
  $database=new database();
  $database->query("UPDATE `voyage` SET   `ville_id`=$this->ville_id
                                         ,`nbr_jour`=$this->nbr_jour,`hotel_id`=$this->hotel_id,`description`='$this->description'
                                         , `img`='$this->img' WHERE voyage_id=$this->voyage_id");

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
