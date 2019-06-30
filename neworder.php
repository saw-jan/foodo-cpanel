<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="plugin/jquery.js"></script>
    <title>New Orders</title>

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
</style>
</head>
<?php include('functions.php'); ?>
<body style="padding:0px;margin:0px;">
    <div class="container">
        <div class="top">
        </div>
        <div class="bottom">
        <div class="res-list">
            <table cellspacing="0" width="100%" style="border:solid 1px #ddd;background-color:#eee;">
                <tr class="tb-header"><td style="width:10px;"></td><td>Customer</td><td>Restaurant</td></tr>
            </table>
            <div style="height:86%;overflow: scroll;">
                <table cellspacing="0" width="100%" style="border:solid 1px #ddd;">
                <tr><td></td><td width="55.5%"></td><td></td></tr>
                <?php
                getNewOrder();
                ?>
                </table>
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
    ?>
    <script>
        $('.res-menu').load('thisorder.php?id=<?php echo $id;?>');
    </script>    
    <?php
    }
    ?>
    <script>
    $(document).ready(function() {
    	$('.res').click((event) => {
		var id = event.target.id;
		$('.res-menu').load('thisorder.php?id=' + id);
    });
});
    </script>
</body>
</html>