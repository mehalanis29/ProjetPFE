<?php
class hotel{
  public $id;
  public $nom;
  public $telephone;
  public $ville_id;
  public $address;
  public $class;
  public $img;
  public function __construct($id,$nom,$telephone,$ville_id,$address,$class,$img)
  {
    $this->id=$id;
    $this->nom=$nom;
    $this->telephone=$telephone;
    $this->ville_id=$ville_id;
    $this->address=$address;
    $this->class=$class;
    $this->img=$img;
  }
}
