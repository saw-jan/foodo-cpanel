<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include("../conn.php");
  newOrder();
}
function newOrder(){
  global $con;
  $uid = $_POST["UID"];
  $rid = $_POST["RID"];
  $items = $_POST["ITEMS"];
  $qty = $_POST["QTY"];
  $total = $_POST["TOTAL"];

  $query = "INSERT INTO orders(UID,RID,ITEMS,QTY,TOTAL) VALUES(".$uid.",".$rid.",'".$items."','".$qty."',".$total.")";
  $run = mysqli_query($con,$query) or die("Invalid Insert");
  mysqli_close($con);
}
?>
