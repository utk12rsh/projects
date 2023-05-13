<?php
include_once "./navbar.php";
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

<body>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $conn = new mysqli('localhost', 'root', 'developer', 'warriorsDB');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM registerDetails INNER JOIN blogsDetails ON registerDetails.id = blogsDetails.customerId";
    $result = $conn->query($sql);
    $obj = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($obj as $value) {
        $image='./images/'.$value['images'];
        $id=$value['id'];
        ?>
        <div class="home-blog">
            <div><img src="<?php echo $image; ?>" alt="Something Went Wrong!" class="blog-image"></div><br>
            <?php
            echo $value['title']."<br><br>";
            echo "AUTHOR : " . $value['names']."<br><br>";
            ?>
            <a href="showblog.php?id=<?php echo $id ?>" style="text-decoration:none;color:#FF5C5C;">SEE MORE !</a>
        </div>
        <?php
    }
    ?>
</body>

</html>