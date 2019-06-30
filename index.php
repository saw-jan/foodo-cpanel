<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | FoodCart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body style="background-color:#eee;height:100%;width:100%;">
    <div class="container">
        <div style="width:40%;position:relative;left:20%;top:100px;text-align:center;background-color:#fff;padding:50px;">
        <h1>FOODCART</h1>
        <form action="check.php" method="post">
        <input type="text" name="user" id="username" placeholder="Username" style="padding:10px;margin:10px;border:solid 1px #ddd;"><br>
        <input type="password" name="pass" id="password" placeholder="Password" style="padding:10px;margin:10px;border:solid 1px #ddd;"><br>
        <input type="submit" name="login" id="login" style="padding:10px;margin:10px;border:none;width:30%;cursor:pointer;">
        </form>
        </div>
    </div>
</body>
</html>