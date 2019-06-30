<?php 
if(isset($_GET['i'])){
    $id = $_GET['i'];
$con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
$qupdate = "UPDATE orders SET STATUS='APPROVED' WHERE ID=".$id."";
$rupdate = mysqli_query($con,$qupdate);
}
?>