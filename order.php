<?php
  include("conn.php");
  Order();
function Order(){
  global $con;
  $query = "SELECT COUNT(ID) AS NEW FROM orders WHERE STATUS='NEW'";
  $run = mysqli_query($con,$query);
  $row = mysqli_fetch_assoc($run);
  $num = $row['NEW'];
  echo $num;
  mysqli_close($con);
}
?>
