<?php
//session_start();
include 'conn.php';
if(isset($_POST['login'])){
$name = $_POST['user'];
$pass = $_POST['pass'];
$query = "Select Admin,Password From admin Where Admin='".$name."' AND Password='".$pass."'";
$run = mysqli_query($con,$query);
if(mysqli_num_rows($run) > 0){
  header('Location:dash.php');
  //$_SESSION["user"] = $name; 
}else{
  header('Location:index.php');
}
}
?>
