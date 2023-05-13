<?php
session_start();

if (isset($_SESSION['emails']) && isset($_SESSION['password1'])) {
    ?>
    <div class="container">
        <nav>
            <img src="images/home.jpg" class="logo">
            <ul id="sidemenu">
                <li><a href="./index.php">HOME</a></li>
                <li><a href="./logout.php">LOG OUT</a></li>
                <li><a href="./addblog.php">ADD BLOGS</a></li>
                <li><a href="./contact.php">CONTACT US</a></li>
                <i class="fas fa-times menu" onclick="closemenu()"></i>
            </ul>
            <i class="fas fa-bars menu" onclick="openmenu()"></i>
        </nav>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <nav>
            <img src="images/background.jpg" class="logo">
            <ul id="sidemenu">
                <li><a href="./index.php">HOME</a></li>
                <li><a href="./register.php">REGISTER</a></li>
                <li><a href="./login.php">LOG IN</a></li>
                <li><a href="./addblog.php">ADD BLOGS</a></li>
                <li><a href="./contact.php">CONTACT US</a></li>
                <i class="fas fa-times menu" onclick="closemenu()"></i>
            </ul>
            <i class="fas fa-bars menu" onclick="openmenu()"></i>
        </nav>
    </div>
    <?php
}
?>