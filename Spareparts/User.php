<?php
require_once "ConnectionToDB.php";
//require_once "UserType.php";
//require_once "Page.php";
  class User{
  public $id;
  public $firstname;
  public $lastname;
  public $DOB;
  public $mobile;
  public $email;
  public $username;
  public $password;
//  public $usertype_id;

   function __construct(){

    }

   function login($username, $password){
     $db = new dbconnect;
     $sql = "SELECT * FROM user
             WHERE `Username` = '$username'
             AND `password`= '$password'
             ";
     $result = $db->executesql($sql);
     $num_row = mysqli_num_rows($result);
     $row = mysqli_fetch_array($result);
     if( $num_row ==1 )
          {
      $_SESSION['ID']=$row[0];
      header("Location: index.html");

       }
       else
          {
      echo 'Incorrect Username or Password';
       }
      }


     /*//$_SESSION["ID"] = $row['ID'];
     $_SESSION["ID"] = $row[0];
     $_SESSION["FName"] = $row['Fname'];
     $_SESSION["LName"] = $row['Lname'];
     $_SESSION["DOB"] = $row['DateOfBirth'];
     $_SESSION["Mobile"]=$row['Mobile'];

     $_SESSION["Email"] = $row['Email'];
     $_SESSION["Username"]=$row['Username'];
     $_SESSION["Password"] = $row['password'];
     $_SESSION["UserType"] = $row['UserTypeID'];

     $this->id = $row['ID'];

     echo "Your ID :" . $this->id;
     header("Location: index.html");

    */




   function deleteUser($user){
     $db = new dbconnect;
     $sql = "DELETE FROM user
             WHERE `ID` = $user->id
             ";
     $result = $db->executesql($sql);
      if($result){
        echo 'deleted';
      }else{
        echo $result->err;
      }
   }


 function insertInDb($firstname,$lastname,$DOB,$mobile,$email,$username,$password){
   $db = new dbconnect;
   $conn = $db->connect();
   $sql="INSERT INTO user
   (`Fname`,`Lname`,`DateOfBirth`,`Mobile`,
     `Email`/*,`UserTypeID`*/,`Username`,`password`)
     VALUES ('$firstname',
       '$lastname','$DOB','$mobile',
       '$email',/*'$usertype_id',*/
       '$username','$password')";
   $res = mysqli_query($conn,$sql);
   header("Location: index.html");
 }
   }

  /* function updateMyDB(){
     $this->$db->connect();
     $sql = "UPDATE `user`
             SET `Email` = '$email'
             WHERE `id` = '$id'
             ";
     $result = $this->$db->executesql($sql);
     return $result;
   }

   function selectAllUsersInDb(){
     $db = new dbconnect;
     $sql = "SELECT * FROM `user` ";
     $result = $db->executesql($sql);

     if ($row = mysqli_fetch_array($result)){
       $this->firstname = $row['Fname'];
       $this->lastname = $row['Lname'];
       $this->firstname = $row['Fname'];
       $this->DOB = $row['DateOfBirth'];
       $this->mobile = $row['Mobile'];
       $this->email = $row['Email'];
       $this->username = $row['Username'];
       $this->password = $row['Password'];
       $this->usertype_id= $row['UserTypeID'];
     }
   }

 }*/

?>