<?php
class Client{
  public $id;
  public $num_passport;
  public $nom;
  public $prenom;
  public $date_naissance;
  public $email;
  public $password ;
  public $phone;
  public $nationalite;
  public $date_emission_passport;
  public $date_expiration_passport;
  public function __construct($id,$num_passport,$nom,$prenom,$date_naissance,$email,$password ,$phone
                                    ,$nationalite,$date_emission_passport,$date_expiration_passport)
  {
    $this->id=$id;
    $this->num_passport=$num_passport;
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->date_naissance=$date_naissance;
    $this->email=$email;
    $this->password =$password ;
    $this->phone=$phone;
    $this->nationalite=$nationalite;
    $this->date_emission_passport=$date_emission_passport;
    $this->date_expiration_passport=$date_expiration_passport;
  }
  public function InsertClient()
  {
    $database=new database();
    $database->query("INSERT INTO `client`(`num_passport`, `nom`, `prenom`, `date_naissance` ,`email`, `password`
                , `phone`,`nationalite`, `date_emission_passport`, `date_expiration_passport`)
                VALUES ('$this->num_passport','$this->nom','$this->prenom','$this->date_naissance','$this->email'
                  ,'$this->password','$this->phone',$this->nationalite
                  ,'$this->date_emission_passport','$this->date_expiration_passport')");
  }
  public function UpdateClient()
  {
    $database=new database();
    $database->query("UPDATE `client` SET `num_passport`='$this->num_passport' , `nom`='$this->nom'
         ,`prenom`='$this->prenom' , `date_naissance`='$this->date_naissance' , `email`='$this->email'
         ,`phone`='$this->phone' ,`nationalite`=$this->nationalite
         , `date_emission_passport`='$this->date_emission_passport'
         , `date_expiration_passport`='$this->date_expiration_passport' WHERE client_id=$this->id");
  }
}
