<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include("../conn.php");
  getHotRes();
}
function getHotRes(){
    $id = $_POST["rID"];
  global $con;
  $query = "SELECT res_menu.ID AS mID,Item,Price,menu_cat.Category AS mCat FROM res_menu INNER JOIN menu_cat ON res_menu.Category=menu_cat.ID WHERE Restaurant=".$id." ORDER BY mCat";
  $run = mysqli_query($con,$query);
  $row_num = mysqli_num_rows($run);
  $t_array = array();
  if($row_num>0){
    while($row = mysqli_fetch_assoc($run)){
        $t_array[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode(array("resmenu"=>$t_array));
  }
  else{
  echo "invalid";
  }
  mysqli_close($con);
}
?>
