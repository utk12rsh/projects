<?php
include_once './navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here</title>
    <link rel="icon" type="image/jpg" href="images/favicon.jpg" sizes="16x16">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/all.css">
</head>

<body>
    <div class="row">
        <div class="contact-right" style="margin-top: 50px;">
            <h2 style="text-align: center;margin-bottom: 10px;" class="con-head">REGISTER HERE</h2>
            <hr>
            <form method="post" action="db.php" style="padding:10px;margin-top: 20px;">
              <input type="text" id="user-name" name="user-name" placeholder="Enter Your Name">
              <input type="email" id="user-email" name="user-email" placeholder="Enter Your Email">
              <input type="tel" name="user-tel"  pattern="[0-9]{10}"  placeholder="Enter Your Phone"/>
              <input type="password" minlength="6" maxlength="8" name="user-pass1" placeholder="Enter Your Password"/>
              <input type="password" minlength="6" maxlength="8" name="user-pass2" placeholder="Confirm Your Password"/>
              <input type="submit" name="register" class="butn2" id="btn-reg" value="REGISTER">
            </form>
        </div>
    </div>
</body>

</html>