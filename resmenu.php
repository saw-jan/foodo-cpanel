<head>
    <style>
    .res-name{
        font-size:18px;
        font-weight:bold;
    }
    .res-ad{
        font-size:14px;
    }
    .del{
        color:#aaa;
    }
    .del:hover{
        color:red;
        cursor:pointer;
    }
    </style>
</head>
<?php
$id = $_GET['id'];
$name = $_GET['name'];
$name = str_replace(',',' ',$name);
$name = str_replace('.','&',$name);
//echo $id;
include('functions.php');
getSelectedResMenu($id);
?>
<h3>MENU</h3>
<form method="GET" style="border:solid 1px #ddd;padding:10px;background-color:#eee;">
<span style="font-size:12px;font-weight:bold;">Add New Item</span><br>
<input type="text" name="mitem" id="" placeholder="Item" required style="font-size:12px;border:solid 1px #ddd;">
<input type="text" name="mres" id="mres" value="<?php echo $name; ?>" style="font-size:12px;border:solid 1px #ddd;">
<select name="mcat" id="" style="font-size:12px;border:solid 1px #ddd;">
    <option value="">Category</option>
    <?php
        getCategory();
    ?>
</select>
<input type="number" name="mprice" id="" placeholder="Price" required style="font-size:12px;border:solid 1px #ddd;">
<input type="submit" name="adnewitm" id="adnewitm" value="Add" style="font-size:12px;border:solid 1px #aaa;width:70px;cursor:pointer">
</form>
<div style="height:350px;overflow: scroll;border:solid 1px #ddd;border-radius:10px;">
<?php
    getResMenu($id)
?>
</div>
<?php

?>
<script>
//res-name
$(document).ready(function() {
    
});
</script>