<?php
include_once "./navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="icon" type="image/jpg" href="images/favicon.jpg" sizes="16x16">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/all.css">
</head>

<body>
  <div class="row">
    <div class="contact-left">
      <h2 style="text-align: center;margin-bottom: 10px;" class="con-head">CONTACT DETAILS</h2>
      <hr><br>
      <p class="para"><i class="fa-solid fa-paper-plane"></i> UTKARSHTRIPATHI855@GMAIL.COM</p>
      <p class="para"><i class="fa-solid fa-square-phone"></i></i> +918303107405</p>
      <a href="https://www.facebook.com/utkarsh.tripathi.9809672/" class="facebook" target="_blank"><i
          class="fa-brands fa-square-facebook"></i></a>
      <a href="https://www.instagram.com/utk12rsh/" class="insta" target="_blank"><i
          class="fa-brands fa-square-instagram"></i></a>
      <a href="https://wa.me/918303107405" class="whatsapp" target="_blank"><i
          class="fa-brands fa-square-whatsapp"></i></a>
      <a href="https://www.linkedin.com/mwlite/in/utkarsh-tripathi-97894321a" target="_blank"><i
          class="fa-brands fa-linkedin"></i></a><br />
    </div>
    <div class="contact-right">
      <h2 style="text-align: center;margin-bottom: 10px;" class="con-head">ASK QUESTIONS</h2>
      <hr><br>
      <form method="post" action="db.php">
        <input type="text" name="query-name" placeholder="Enter Your Name">
        <input type="email" name="query-email" placeholder="Enter Your Email">
        <textarea name="query-message" rows="6" placeholder="Write Your Message"></textarea>
        <input type="submit" name="ask" class="butn2" id="ask" value="SUBMIT">
      </form>
    </div>
  </div>
</body>

</html>