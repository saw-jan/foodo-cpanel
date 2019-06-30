<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include("../conn.php");
  registerUser();
}
function registerUser(){
  global $con;
  $name = $_POST["Name"];
  $contact = $_POST["Contact"];
  $email = $_POST["Email"];
  $password = $_POST["Password"];
//row count
  $q1 = "SELECT * FROM app_user";
  $r1 = mysqli_query($con,$q1);
  $row1 = mysqli_num_rows($r1);
  //check contact
  $qry = "SELECT id FROM app_user WHERE Phone ='".$contact."'";
  $r = mysqli_query($con,$qry) or die("Invalid Query");
  $count = mysqli_num_rows($r);
  if($count==0){
    $query = "INSERT INTO app_user(Username,Phone,Email,Password) VALUES('".$name."','".$contact."','".$email."','".$password."')";
    $run = mysqli_query($con,$query) or die("Invalid Insert");

    $q2 = "SELECT * FROM app_user";
    $r2 = mysqli_query($con,$q2);
    $row2 = mysqli_num_rows($r2);
    if($row2>$row1){
      echo "inserted";
    }
    else{
    echo "";
    }
  }else{
    echo "exist";
  }
  mysqli_close($con);
}
?>
