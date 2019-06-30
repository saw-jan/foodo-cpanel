<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="plugin/jquery.js"></script>
    <title>Dashboard</title>
<style>
body{
    background-color:#aaa;
}
.container{
    display:grid;
    grid-template-rows:1% 99%;
    padding:1%;
    width:95%;
    height:650px;
}
.top{
    width:95%;
    display:grid;
    grid-template-columns:1fr 1fr 1fr;
    padding:3%;
}
.bottom{
    width:95%;
    display:grid;
    grid-template-columns:30% 70%;
    padding:3%;
}
.res-list{
    background-color:white;
    border:solid 1px #ddd;
    border-radius:5px;
    padding:10px;
}
.res-menu{
    background-color:white;
    border:solid 1px #ddd;
    border-radius:5px;
    padding:5px;
}
.tb-header{
    font-size:14px;
    font-weight:bold;
    height:50px;
}
.rlists{
    font-size:12px;
    height:20px;
}
.rlists a{
    text-decoration:none;
    color:#000;
}
.rlists a:hover{
    color:lightblue;
    cursor:pointer;
}
::-webkit-scrollbar{
    width:0px;
    background:transparent;
}
#del{
    color:#bbb;
}
#del:hover{
    color:red;
    cursor:pointer;
}
</style>
</head>
<?php include('functions.php'); ?>
<body style="padding:0px;margin:0px;">
    <div class="container">
        <div class="top">
        </div>
        <div class="bottom">
        <div class="res-list">
            <div style="height:90%;">
            <div style="padding:5px;font-size:14px;">NEW ORDER 
            <a href="neworder.php" style="text-decoration:none;">
            <span id="order" style="margin-left:5px;background-color:red;color:#fff;border-radius:5px;padding:2px 10px 2px 10px;">0</span>
            </a>
            </div>
            <table cellspacing="0" width="100%" style="border:solid 1px #ddd;background-color:#eee;">
                <tr class="tb-header"><td style="width:10px;"></td><td>RESTAURANTS</td><td>LOCATION</td></tr>
            </table>
            <div style="height:86%;overflow: scroll;">
                <table cellspacing="0" width="100%" style="border:solid 1px #ddd;">
                <tr><td></td><td width="55.5%"></td><td></td></tr>
                <?php
                getResList();
                ?>
                </table>
            </div>
            </div>
            <div style="border-top:dotted 1px #ddd;">
                <span style="font-size:12px;font-weight:bold;">Add New Restaurant</span><br>
                <form method="GET">
                <input type="text" name="newresname" placeholder="Name" style="font-size:12px;border:solid 1px #ddd;" required>
                <input type="number" name="newrescontact" placeholder="Contact" style="font-size:12px;border:solid 1px #ddd;" required>
                <input type="text" name="newresadds" placeholder="Street" style="font-size:12px;border:solid 1px #ddd;" required>
                <!--<input type="text" name="newrescity" placeholder="City" style="font-size:12px;border:solid 1px #ddd;width:100px;">-->
                <select name="newrescity" id="" style="font-size:12px;border:solid 1px #ddd;">
                    <option value="">City</option>
                    <option value="Kathmandu">Kathmandu</option>
                    <option value="Pokhara">Pokhara</option>
                    <option value="Bhaktapur">Bhaktapur</option>
                    <option value="Lalitpur">Lalitpur</option>
                    <option value="Butwal">Butwal</option>
                    <option value="Biratnagar">Biratnagar</option>
                    <option value="Syangja">Syangja</option>

                </select>
                <input type="submit" id="adnewres" name="adnewres" value="Add" style="font-size:12px;border:solid 1px #ddd;width:70px;cursor:pointer">
            </form>
            </div>
        </div>
        <div class="res-menu">
            <div></div>
        </div>
        </div>
    </div>
   <?php 
    if(isset($_GET['rid'])){
        $id = $_GET['rid'];
        $name = $_GET['rname'];
        //echo $name;
    ?>
    <script>
        $('.res-menu').load('resmenu.php?id=<?php echo $id;?>&name=<?php echo $name;?>');
    </script>    
    <?php
    }
    ?>
    <script src="functions.js">
    </script>
</body>
</html>