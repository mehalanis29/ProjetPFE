<?php
require 'Table.inc';
class ListClient extends Table{
  public $sql="select client_id,nom,prenom from client ";
  public function __construct($GET)
  {
    $this->head=array('client_id','nom','prenom','opperation');
    $this->GET=$this->FilterGET($GET);
    $debut=$this->NumPage($GET)*10-10;
    /* where recherche  */
    $database=new database();
    $result=$database->query($this->sql." limit $debut,10");
    while ($row=mysqli_fetch_assoc($result)) {
      $this->table[]=new Client($row["client_id"],$row["nom"],$row['prenom'],'');
    }
  }
}

class Client{
  public $id;
  public $nom;
  public $prenom;
  public $date_naissance;
  public function __construct($id,$nom,$prenom,$date_naissance)
  {
    $this->id=$id;
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->date_naissance=$date_naissance;
  }

  public function AfficheRow()
  {
    return "<tr><td>$this->id</td><td>$this->nom</td><td>$this->prenom</td><td>".$this->ListBtn()."</td></tr>";
  }
  public function ListBtn(){
     return "<a href=\"ClientControle.php?idclient=".$this->id."\" class=\"produitbtn produitbtnedit\">Detail</a>";
  }
}
