<?php
class Table{
  public $table=array();
  public $head;
  public $GET;
  function __construct()
  {

  }
  public function head()
  {
    foreach ($this->head as $k => $v) {
      echo "<th>$v</th>";
    }
  }
  public function Table()
  {
    foreach ($this->table as $k => $v) {
      echo $v->AfficheRow();
    }
  }
  public function NumPage($GET)
  {
    if(isset($GET['page'])){
      $page=$GET['page'];
    }else{
     $page=1;
    }
    return $page;
  }
  public function printitem($id,$style,$get)
  {
     echo "<li class='$style'><a href='$this->page?".$get."page=$id'>$id</a></li>";
  }
  public function FilterGET($GET)
  {
    if(isset($GET["rech"])){ $k=$GET["rech"];}else{$k ="";}
    return $k;
  }
  public function bar(){
    $page=$this->NumPage($this->GET);
    echo "<li class='suivprec'>";
    if($page>1){
          $precedant=$page-1;
          echo "<a href='$this->page?".$this->GET."page=$precedant'><img src='../img/Admin/icon/precedant.png'/></a></li>";
          $this->printitem($precedant,"listitem",$this->GET);
          $this->printitem($_GET['page'],"itemactiv",$this->GET);
    }else{
        echo "<a href='$this->page?".$this->GET."page=1'><img src='../img/Admin/icon/precedant.png'/></a></li>";
        $this->printitem(1,"itemactiv",$this->GET);
    }
    $suivant=$page*10;
    /*
    $database=new database();
    $result=$database->query($this->sql." limit $suivant ,2");
    */
    if($page>1){$suivant=$page;}else{$suivant=1;}
    /*
    if(mysqli_num_rows($result)>0){
    $suivant++;
    $this->printitem($suivant,"listitem",$this->GET,$nom);
    }
    */
      echo "<li class='suivprec'><a href='$this->page?".$this->GET."page=$suivant'><img src='../img/Admin/icon/suivant.png'/></a></li>";
  }
}
