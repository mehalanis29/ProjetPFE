<?php
class Endroit { 
 public $id;
 public $nom;
 public $ville_id;
 public $description;
 public $prix;
 public function __construct ( $id , $nom , $ville_id , $description , $prix) { 
  $this->id = $id;
  $this->nom = $nom;
  $this->ville_id = $ville_id;
  $this->description = $description;
  $this->prix = $prix;
 }
}