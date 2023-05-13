
<?php
include_once "./navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blogs Here</title>
    <link rel="icon" type="image/jpg" href="images/favicon.jpg" sizes="16x16">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
<div class="row">
        <div class="contact-right" style="margin-top: 50px;">
            <h2 style="text-align: center;margin-bottom: 10px;" class="con-head">ADD BLOGS HERE</h2>
            <hr>
            <form method="post" action="db.php" enctype="multipart/form-data" style="padding:10px;margin-top: 20px;">
              <input type="text" id="writer-name" name="writer-name" placeholder="Enter Your Name">
              <input type="email" id="writer-email" name="writer-email" placeholder="Enter Your Email">
              <input type="text" id="blog-title" name="blog-title" placeholder="Enter Blog's Title" >
              <textarea name="blog-quote" placeholder="Write Blog's Quote/Short Description"></textarea>
              <textarea name="blog-desc" placeholder="Write Blog's Description"></textarea>
              <input type="file" name="uploadfile" value="" title="Upload Blog's Image ">
              <input type="hidden" name="customer-id">
              <input type="submit" name="add-blogs" class="butn2" id="btn-login" value="ADD BLOG">
            </form>
        </div>
    </div>
</body>
</html>