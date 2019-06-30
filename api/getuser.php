<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include("../conn.php");
  getUser();
}
function getUser(){
  global $con;
  $contact = $_POST["Contact"];
  $password = $_POST["Password"];

  $query = "SELECT ID,Username,Phone,Email FROM app_user WHERE Phone='".$contact."' AND Password='".$password."'";
  $run = mysqli_query($con,$query);
  $row_num = mysqli_num_rows($run);
  $t_array = array();
  if($row_num>0){
    $row = mysqli_fetch_assoc($run);
    $t_array[] = $row;
    header('Content-Type: application/json');
    echo json_encode(array("user"=>$t_array));
  }
  else{
  echo "invalid";
  }
  mysqli_close($con);
}
?>
