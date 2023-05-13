<?php
include_once "./db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Great Warriors!</title>
    <link rel="icon" type="image/jpg" href="images/home.jpg" sizes="16x16">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/all.css">
</head>

<body style="background-color:#ffb366;text-align:center">
    <div class="show-blog">
    <?php
    $id=$_GET['id'];
    $sql="SELECT * FROM blogsDetails WHERE id='$id'";
    $result = $conn->query($sql);
    $obj = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($obj as $value) {
        $image='./images/'.$value['images'];
        $id=$value['id'];
        ?>
        <div class="blog-info">
            <div><img src="<?php echo $image; ?>" alt="Something Went Wrong!" class="blog-image-content"></div><br>
            <?php
            echo $value['title']."<br><br>";
            ?>
        </div>
        <div class="blog-content">
            <?php
         echo $value['descriptions'];
         echo "<hr><br>";
         ?>
        </div>
        <div class="blog-auth-info">
            <h2 style="text-align:center;color:red;"></h2>CONTACT AUTHOR</h2>
         <?php
         echo "<br><br>";
         echo "AUTHOR : ".$value['names']."<br><br>";
         echo "E-MAIL : ".$value['emails']."<br><br>";
         ?>
        </div>
        <?php
    }
   ?>
    </div>
</body>

</html>