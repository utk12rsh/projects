<?php
session_start();
session_destroy();
echo "<script>alert('You Have Been Logged Out Successfully!')</script>";
echo "<script>location.href='./index.php'</script>";
?>