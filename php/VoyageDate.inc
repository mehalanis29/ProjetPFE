<?php
class VoyageDate { 
 public $voyage_date_id;
 public $date_depart;
 public $date_retour;
 public $prix_A_S;
 public $prix_A_D;
 public $prix_A_T;
 public $prix_E;
 public $prix_B;
 public function __construct ( $voyage_date_id , $date_depart , $date_retour , $prix_A_S , $prix_A_D , $prix_A_T , $prix_E , $prix_B) { 
  $this->voyage_date_id = $voyage_date_id;
  $this->date_depart = $date_depart;
  $this->date_retour = $date_retour;
  $this->prix_A_S = $prix_A_S;
  $this->prix_A_D = $prix_A_D;
  $this->prix_A_T = $prix_A_T;
  $this->prix_E = $prix_E;
  $this->prix_B = $prix_B;
 }
}