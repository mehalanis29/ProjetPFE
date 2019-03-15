<?php
class database{
  public $connection;
  public function __construct()
  {
    $this->connection=mysqli_connect("localhost","root","","pfe");
    if(mysqli_connect_errno())echo "erreur connect database";
  }
  public function query($sql)
  {
    $result=mysqli_query($this->connection,$sql);
    if(!$result) { die("error query");}
    return $result;
  }
  public function insertid(){
     return mysqli_insert_id($this->connection);
  }
}
