<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
$conn = new mysqli('localhost', 'root', 'developer', 'warriorsDB');
if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

// CREATING THE DATABASE NAMED 'myTestDB'

// $sql="CREATE DATABASE warriorsDB";
// if($conn->query($sql)){
//     echo "<script>alert('Database Created Successfully')</script>";
// }
// else {
//     echo "<script>alert('Database Is Not Created')</script>";
// }

// CREATING THE TABLE NAME 'registerDetails'

// $sql="CREATE TABLE registerDetails(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     names VARCHAR(30) NOT NULL,
//     emails  VARCHAR(30) NOT NULL,
//     phone VARCHAR(10) NOT NULL,
//     password1 VARCHAR(6) NOT NULL,
//     password2 VARCHAR(6) NOT NULL,
//     created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
//  if($conn->query($sql)){
//         echo "Table Created Successfully";
//     }
//     else {
//         echo "Table Is Not Created";
//     }

// CREATING THE TABLE NAME 'queryDetails'

// $sql="CREATE TABLE queryDetails(
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   names VARCHAR(30) NOT NULL,
//   emails  VARCHAR(30) NOT NULL,
//   messages VARCHAR(800) NOT NULL,
//   created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//   )";
//   if($conn->query($sql)){
//             echo "Table Created Successfully";
//         }
//         else {
//             echo "Table Is Not Created";
//         }

// $sql="CREATE TABLE blogsDetails(
//      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      names VARCHAR(30) NOT NULL,
//      emails  VARCHAR(30) NOT NULL,
//      title VARCHAR(100) NOT NULL,
//      quote VARCHAR(100) NOT NULL,
//      descriptions VARCHAR(4000) NOT NULL,
//      images VARCHAR(50) NOT NULL,
//      customerId INT(6) UNSIGNED NOT NULL,
//      FOREIGN KEY (customerId) REFERENCES registerDetails(id),
//      created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//      )";
//      if($conn->query($sql)){
//                echo "Table Created Successfully";
//            }
//            else {
//                echo "Table Is Not Created";
//            }

if (isset($_POST['register'])) {
  $name = $_POST['user-name'];
  $email = $_POST['user-email'];
  $phone = $_POST['user-tel'];
  $pas1 = $_POST['user-pass1'];
  $pas2 = $_POST['user-pass2'];
  if ($name == "" || $email == "" || $phone == "" || $pas1 == "" || $pas2 == "") {
    header("Location: ./register.php");
  } else if ($pas1 !== $pas2) {
    echo "<script>alert('Password Did Not Match Try Again!')</script>";
    echo "<script>location.href = './register.php'</script>";
  } else {
    $sql = "SELECT `emails`,`phone` FROM registerDetails";
    $result = $conn->query($sql);
    $obj = $result->fetch_all(MYSQLI_ASSOC);
    $countEntry = 0;
    foreach ($obj as $value) {
      if ($value['emails'] == $email || $value['phone'] == $phone) {
        $countEntry++;
      }
    }
    if ($countEntry == 0) {
      $sql = "INSERT INTO registerDetails(names,emails,phone,password1,password2)VALUES('$name','$email','$phone','$pas1','$pas2')";
      if ($conn->query($sql)) {
        echo "<script>alert('Your Account Has Been Created!')</script>";
        echo "<script>location.href = './login.php'</script>";
      } else {
        echo "<script>alert('Your Account Is Not Created!')</script>";
        echo "<script>location.href = './register.php'</script>";
      }
    } else {
      echo "<script>alert('This Email Or Phone Registered Already.Try New One!')</script>";
      echo "<script>location.href='./register.php'</script>";
    }
  }
}
if (isset($_POST['login'])) {
  $email2 = $_POST['user-email2'];
  $password3 = $_POST['user-pass3'];
  if ($email2 == "" || $password3 == "") {
    echo "<script>alert('Please Enter All The Credentials!')</script>";
    echo "<script>location.href = './login.php'</script>";
  } else {
    $sql = "SELECT `emails`,`password1` FROM registerDetails";
    $result = $conn->query($sql);
    $obj = $result->fetch_all(MYSQLI_ASSOC);
    $countEntry2 = 0;
    foreach ($obj as $value) {
      if (($value['emails'] == $email2) && ($value['password1'] == $password3)) {
        $countEntry2++;
        $_SESSION['emails'] = $email2;
        $_SESSION['password1'] = $password3;
      }
    }
    if ($countEntry2 == 1) {
      echo "<script>alert('You Have Been Logged In Successful!')</script>";
      header("Location: index.php");
    } else {
      echo "<script>alert('Invalid Email Or Password.Try Again!')</script>";
      echo "<script>location.href = './login.php'</script>";
    }
  }
}
if (isset($_POST['ask'])) {
  $name = $_POST['query-name'];
  $email = $_POST['query-email'];
  $message = $_POST['query-message'];
  if ($name == "" || $email == "" || $message == "") {
    header("Location: ./contact.php");
  } else {
    $sql = "INSERT INTO queryDetails(names,emails,messages)VALUES('$name','$email','$message')";
    if ($conn->query($sql)) {
      echo "<script>alert('Your Message Is Saved.We Will Get You Back Soon!')</script>";
      echo "<script>location.href='./index.php'</script>";
    } else {
      echo "<script>alert('Your Message Is Not Saved.Try Again!')</script>";
      echo "<script>location.href='./contact.php'</script>";
    }
  }
}
if (isset($_POST['add-blogs'])) {
  $sql = "SELECT `id` FROM registerDetails ORDER BY ID DESC LIMIT 1";
  $result = $conn->query($sql);
  $obj = $result->fetch_assoc();
  $_SESSION['id'] = $obj['id'];
  $custId = $_SESSION['id'];
  $name = $_POST['writer-name'];
  $email = $_POST['writer-email'];
  $title = $_POST['blog-title'];
  $quote = $_POST['blog-quote'];
  $desc = $_POST['blog-desc'];
  $image = $_FILES['uploadfile']['name'];
  $extension = pathinfo($image, PATHINFO_EXTENSION);
  $val_extension = array('jpg', 'jpeg', 'png', 'gif');
  if (in_array($extension, $val_extension)) {
    $rand = rand() . "." . $extension;
    $path = "./images/" . $rand;
    if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path)) {
      echo "<script>alert('Image is uploaded successfully!')</script>";
    } else {
      echo "<script>alert('Image is not uploaded, try again !')</script>";
    }
  }
  $sql = "INSERT INTO blogsDetails(names,emails,title,quote,descriptions,images,customerId)VALUES('$name','$email','$title','$quote','$desc','$rand','$custId')";
  if ($conn->query($sql)) {
    echo "<script>alert('Your blog has been saved!')</script>";
    echo "<script>location.href = './index.php'</script>";
  } else {
    echo "<script>alert('Your blog has not been saved!')</script>";
    echo "<script>location.href = './addblog.php'</script>";
  }
}
?>