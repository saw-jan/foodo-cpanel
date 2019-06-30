<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include("../conn.php");
  getOrderHistory();
}
function getOrderHistory(){
  global $con;
  $uid = $_POST["UID"];
  $query = "SELECT RID,ITEMS,TOTAL FROM orders Where UID=".$uid." LIMIT 5";
  $run = mysqli_query($con,$query);
  $row_num = mysqli_num_rows($run);
  $t_array = array();
  if($row_num>0){
    while($row = mysqli_fetch_assoc($run)){
        $t_array[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode(array("history"=>$t_array));
  }
  else{
  echo "invalid";
  }
  mysqli_close($con);
}
?>
