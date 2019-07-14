<?php
class agence{
  public $compte_agence_id;
  public $nom;
  public $adress;
  public $telephone;
  public $fax;
  public $email;
  public $password;

    public function __construct($compte_agence_id,$nom,$adress,$telephone,$fax,$email,$password)
    {
      $this->compte_agence_id=$compte_agence_id;
      $this->nom=$nom;
      $this->adress=$adress;
      $this->telephone=$telephone;
      $this->fax=$fax;
      $this->email=$email;
      $this->password=$password;
    }

    public function UpdateAgence()
    {
      echo  $this->password;
      $password="";
      if(!empty($this->password)){
        $password=",`password`=md5('$this->password')";
      }
      $database=new database();
      $database->query("UPDATE `compte_agence` SET `nom`='$this->nom',`adresse`='$this->adress',`telephone`='$this->telephone',`fax`='$this->fax',`email`='$this->email' $password WHERE compte_agence_id=$this->compte_agence_id");
    }
}
