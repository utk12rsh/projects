<?php
include_once './navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here</title>
    <link rel="icon" type="image/jpg" href="images/favicon.jpg" sizes="16x16">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/all.css">
</head>

<body>
    <div class="row">
        <div class="contact-right" style="margin-top: 50px;">
            <h2 style="text-align: center;margin-bottom: 10px;" class="con-head">LOGIN HERE</h2>
            <hr>
            <form method="post" action="db.php" style="padding:10px;margin-top: 20px;">
              <input type="email" id="user-email2" name="user-email2" placeholder="Enter Your Email">
              <input type="password" minlength="6" maxlength="8" name="user-pass3" placeholder="Enter Your Password"/>
              <input type="submit" name="login" class="butn2" id="btn-login" value="LOGIN">
            </form>
        </div>
    </div>
</body>

</html>