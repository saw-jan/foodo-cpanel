<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];

    $con = mysqli_connect('localhost','root','','foodo_db') or die("Connection Error");
    
      $query = "SELECT UID,RID,ITEMS,QTY,TOTAL,STATUS FROM orders WHERE ID=".$id."";
      $run = mysqli_query($con,$query);
      $row_num = mysqli_num_rows($run);
      $items="";
      $qty="";
      $cname="";
      $cphone="";
      $rname="";
      $radd="";
      $rphone="";
      $total = 0.00;
      if($row_num>0){
        while($row = mysqli_fetch_assoc($run)){
          $uid = $row['UID'];
          $rid = $row['RID'];
          $items = $row['ITEMS'];
          $qty = $row['QTY'];
          $total = $row['TOTAL'];
          //customer
          $q = "SELECT Username,Phone FROM app_user WHERE ID=".$uid."";
          $run1 = mysqli_query($con,$q);
          $r1 = mysqli_fetch_assoc($run1);
          $cname = $r1['Username'];
          $cphone = $r1['Phone'];
          $qr = "SELECT Name,Address,City,Contact FROM restaurants WHERE ID=".$rid."";
          $run2 = mysqli_query($con,$qr);
          $r2 = mysqli_fetch_assoc($run2);
          $rname = $r2['Name'];
          $radd = $r2['Address'].", ".$r2['City'];
          $rphone = $r2['Contact'];
        }
        }
    }
?>
<style>
.mother{
    display:grid;
    grid-template-columns:2fr 1fr;
}
.orderlist{
    grid-area:3/1;
    background-color:#eee;
    margin-top:20px;
}
.orderlist table{
    border:none;
}
.orderlist table td{
    padding:10px;
}
</style>
<div class="mother">
<div style="background-color:#ddd;blue;padding:10px;">
<span style="font-weight:bold;"><?php echo $cname; ?></span><br>
<span style="font-size:14px;"><?php echo $cphone; ?></span>
</div>
<div style="background-color:#ddd;padding:10px;">
<span style="font-weight:bold;"><?php echo $rname; ?></span><br>
<span style="font-size:14px;"><?php echo $radd; ?></span><br>
<span style="font-size:14px;"><?php echo $rphone; ?></span>
</div>
<span style="padding-top:10px;">ORDER ITEMS</span>
<div class="orderlist">
<table style="width:100%;" cellspacing=0>
<tr style="background-color:#ccc;font-weight:bold;">
<td>Item Name</td>
<td>Quantity</td>
</tr>
<?php 
$item = explode(",",$items);
$q = explode(",",$qty);
$a=0;
while($a < count($item)-1){
echo '<tr><td>'.$item[$a].'</td><td>'.$q[$a].'</td></tr>';
$a++;
}
?>
<tfoot style="font-weight:bold; background-color:#666;color:#fff;">
<td>GRAND TOTAL (WITH VAT)</td>
<td>RS. <?php echo $total; ?></td>
</tfoot>
</table>
</div>
</div>
<input type="button" id="approve" value="Approve" style="padding:10px;margin-top:20px;">
<script>
$(document).ready(function() {
$('#approve').click(()=>{
    <?php echo "var id='{$id}';"; ?>
    $.ajax({
		type: 'GET',
		url: 'approve.php?i='+id,
		async: false,
		success: function(text) {
        $(location).attr('href','neworder.php');
		}
	});
//alert(id);
});
});
</script>