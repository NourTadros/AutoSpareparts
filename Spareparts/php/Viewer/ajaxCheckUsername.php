<?php

$username = $_REQUEST["q"];
require_once "../ConnectionToDB.php";
require_once "../Model/UserModel.php";


$user = new UserModel();

if ($user->checkForAvailableUsername($username) == 0){
    echo "<input type='text' name='fname' placeholder='Firstname' value='$username' required><br>";
}else{
    echo "<h4 style='color: red'>Please choose another username</h4>";
    echo "<input type='text' name='fname' placeholder='Firstname' onblur='checkForAvailableUsername(this.value)' required><br>";
}
?>

