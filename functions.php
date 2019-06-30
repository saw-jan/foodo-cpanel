<?php
function getResList(){
$con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");

  $query = "SELECT * FROM restaurants ORDER BY Name";
  $run = mysqli_query($con,$query);
  $row_num = mysqli_num_rows($run);
  if($row_num>0){
    while($row = mysqli_fetch_assoc($run)){
      $id = $row['ID'];
      $name = $row['Name'];
      $street = $row['Address'];
      $city = $row['City'];
      $address = $street.", ".$city;
      echo '<tr class="rlists"><td style="width:10px;"><td><a class="res" id="'.$id.'">'.$name.'</a></td><td>'.$address.'</td><td><span id="del" onclick="return deleteQry('.$id.')">X</span></td></tr>';
    }
  }
}
//get categories
function getCategory(){
  $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
  
    $query = "SELECT * FROM menu_cat";
    $run = mysqli_query($con,$query);
    $row_num = mysqli_num_rows($run);
    if($row_num>0){
      while($row = mysqli_fetch_assoc($run)){
        $id = $row['ID'];
        $cat = $row['Category'];
        echo '<option value="'.$cat.'">'.$cat.'</option>';
      }
    }
  }
  //selected restaurant menu
  function getResMenu($id){
    $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
    
      $query = "SELECT * FROM res_menu WHERE Restaurant=".$id." ORDER BY Category";
      $run = mysqli_query($con,$query);
      $row_num = mysqli_num_rows($run);
      if($row_num>0){
        $c="";
        while($row = mysqli_fetch_assoc($run)){
          $id = $row['ID'];
          $rid = $row['Restaurant'];
          $cat = $row['Category'];
          $item = $row['Item'];
          $price = $row['Price'];
          $q = "SELECT Category FROM menu_cat WHERE ID=".$cat."";
          $r = mysqli_query($con,$q);
            $rows = mysqli_fetch_assoc($r);
            $category = $rows['Category'];
          if($c===$cat){
            echo '<tr><td width=70%;><span class="res-ad">'.$item.'</span></td>'.
            '<td><span class="res-ad"> RS. '.$price.'</span></td>'.
            '<td width=10><span class="del" onclick="return deleteMenu('.$id.','.$rid.')">x</span></td></tr>';
          }else{
            $c = $cat;
            echo '<table width=50%><tr><td colspan=3><span class="res-name">'.$category.'</span></td></tr>'.
            '<tr><td width=70%;><span class="res-ad">'.$item.'</span></td>'.
            '<td><span class="res-ad"> RS. '.$price.'</span></td>'.
            '<td width=10><span class="del" onclick="return deleteMenu('.$id.','.$rid.')">x</span></td></tr><br>';
          }
        }
      }
    }
  //selected restaurant
function getSelectedResMenu($id){
  $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
  
    $query = "SELECT * FROM restaurants WHERE ID=".$id."";
    $run = mysqli_query($con,$query);
    $row_num = mysqli_num_rows($run);
    if($row_num>0){
      while($row = mysqli_fetch_assoc($run)){
        $id = $row['ID'];
        $name = $row['Name'];
        $street = $row['Address'];
        $city = $row['City'];
        $address = $street.", ".$city;
        echo '<span class="res-name">'.$name.'</span><br><span class="res-ad">'.$address.'</span>';
      }
    }
  }
  
  //add new restaurant
  if(isset($_GET['adnewres'])){
    $name = $_GET['newresname'];
    $street = $_GET['newresadds'];
    $city = $_GET['newrescity'];
    $contact = $_GET['newrescontact'];
    addNewRes($name,$street,$city,$contact);
  }
  function addNewRes($name,$street,$city,$contact){
    $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
    $qry = "SELECT id FROM restaurants WHERE Name ='".$name."'";
    $r = mysqli_query($con,$qry) or die("Invalid input.");
    $count = mysqli_num_rows($r);
    if($count==0){
      $query = "INSERT INTO restaurants(Name,Address,City,Contact) VALUES('".$name."','".$street."','".$city."','".$contact."')";
      $run = mysqli_query($con,$query) or die("Invalid input.");
    }
  }
  //delete restaurant
  if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    deleteRes($id);
  }
  function deleteRes($id){
    $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
    $qry = "DELETE FROM restaurants WHERE ID=".$id."";
    mysqli_query($con,$qry);
  }
  //delete menu
  if(isset($_GET['menudel'])){
    $id = $_GET['menudel'];
    $rid = $_GET['rid'];
    deleteMenu($id);
    $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
      $q0 = "SELECT Name FROM restaurants WHERE ID ='".$rid."'";
      $r0 = mysqli_query($con,$q0) or die("Invalid input.");
      $rs = mysqli_fetch_assoc($r0);
      $res = $rs['Name'];
      $name = $res;
      $name = str_replace(' ',',',$name);
      $name = str_replace('&','.',$name);
      $name = str_replace(',,',',',$name);
      header('Location:dash.php?rid='.$rid.'&rname='.$name.'');
  }
  function deleteMenu($id){
    $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
    $qry = "DELETE FROM res_menu WHERE ID=".$id."";
    mysqli_query($con,$qry);
    
  }
  //add menu item
  if(isset($_GET['adnewitm'])){
    $item = $_GET['mitem'];
    $res = $_GET['mres'];
    $cat = $_GET['mcat'];
    $price = $_GET['mprice'];
    if($cat!=""){
      addNewMenuItem($res,$cat,$item,$price);
    }else{
      $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
      $qry = "SELECT ID FROM restaurants WHERE Name ='".$res."'";
      $rres = mysqli_query($con,$qry) or die("Invalid input.");
      $rid=0;
      while($row = mysqli_fetch_assoc($rres)){
        $rid = $row['ID'];
      }
      $name = $res;
      $name = str_replace(' ',',',$name);
      $name = str_replace('&','.',$name);
      $name = str_replace(',,',',',$name);
      header('Location:dash.php?rid='.$rid.'&rname='.$name.'');
    }
  }
  function addNewMenuItem($res,$cat,$item,$price){
    $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
    $qry = "SELECT ID FROM restaurants WHERE Name ='".$res."'";
    $rres = mysqli_query($con,$qry) or die("Invalid input.");
    $rid=0;
    while($row = mysqli_fetch_assoc($rres)){
      $rid = $row['ID'];
    }

    $qry1 = "SELECT ID FROM menu_cat WHERE Category ='".$cat."'";
    $rcat = mysqli_query($con,$qry1) or die("Invalid input.");
    $cid=0;
    while($row = mysqli_fetch_assoc($rcat)){
      $cid = $row['ID'];
    }
      $query = "INSERT INTO res_menu(Restaurant,Category,Item,Price) VALUES('".$rid."','".$cid."','".$item."','".$price."')";
      $run = mysqli_query($con,$query) or die("Invalid input.");
      $name = $res;
      $name = str_replace(' ',',',$name);
      $name = str_replace('&','.',$name);
      $name = str_replace(',,',',',$name);
      header('Location:dash.php?rid='.$rid.'&rname='.$name.'');
  }
  function getNewOrder(){
    $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
    
      $query = "SELECT * FROM orders WHERE STATUS='NEW' ORDER BY ID";
      $run = mysqli_query($con,$query);
      $row_num = mysqli_num_rows($run);
      if($row_num>0){
        while($row = mysqli_fetch_assoc($run)){
          $id = $row['ID'];
          $uid = $row['UID'];
          $rid = $row['RID'];
          $qu = "SELECT Username FROM app_user WHERE ID=".$uid."";
          $ru = mysqli_query($con,$qu);
          $r1 = mysqli_fetch_assoc($ru);
          $customer = $r1['Username'];
          $qr = "SELECT Name FROM restaurants WHERE ID=".$rid."";
          $rr = mysqli_query($con,$qr);
          $r2 = mysqli_fetch_assoc($rr);
          $res = $r2['Name'];
          echo '<tr class="rlists"><td style="width:10px;"><td><a class="res" id="'.$id.'">'.$customer.'</a></td><td style="text-align:left;">'.$res.'</td></tr>';
        }
      }
    }
?>