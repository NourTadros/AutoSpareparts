<?php


  class CorruptedModel{

      public $ID;
      public $Type;



      public function __construct(){

      }

      public function Add(){
          $db = ConnectionToDB::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `iscorrupted` (`ID`, `Type`) VALUES (NULL, '$this->Type')

                  ";


          $result = $mysqli->query($sql);
          if ($result){
                //echo "result";
          }else{
              echo $mysqli->error;
          }
      }

      public function Edit(){

      }

      public function View(){

  $db = ConnectionToDB::getInstance();
  $mysqli = $db->getConnection();

  $sql = "SELECT * FROM `iscorrupted`";
  $result = $mysqli->query($sql);
  $i=-1;

  while($row =mysqli_fetch_array($result)){
  $i++;
  $this->ID[$i]=$row['ID'];
  $this->Type[$i]=$row['Type'];

  }
return $i;
}




  }
?>
