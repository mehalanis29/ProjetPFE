<?php
class ville{
  public $id;
  public $nom;
  public $pays_id;
  public $img;
  public function __construct($id,$nom,$pays_id,$img)
  {
    $this->id=$id;
    $this->nom=$nom;
    $this->pays_id=$pays_id;
    $this->img=$img;
  }
}
