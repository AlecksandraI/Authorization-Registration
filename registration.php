<?php
session_start();
if($_SESSION['user']){
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!--Форма регистраци-->
<form action="inc/signup.php" method="post">
    <input name="login" type="text" placeholder="Login" minlength="6">
    <input name="password" type="Password" placeholder="Password" pattern="[а-яА-ЯёЁa-zA-Z0-9]+$" minlength="6">
    <input name="confirm_password" type="Password" placeholder="Confirm Password">
    <input name="email" type="email" placeholder="Email">
    <input name="name" type="text" placeholder="Name" pattern="[A-Za-zА-Яа-яЁё]{2}">
    <button type="submit" name="do_signup">Sign Up</button>
    <p>
        <a href="index.php">Already have an account?</a>
    </p>
    <p class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </p>
</form>
</body>
</html>