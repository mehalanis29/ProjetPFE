<?php
class image { 
 public $image_id;
 public $id_objet;
 public $img;
 public function __construct ( $image_id , $id_objet , $img) { 
  $this->image_id = $image_id;
  $this->id_objet = $id_objet;
  $this->img = $img;
 }
}