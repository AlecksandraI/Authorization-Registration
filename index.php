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
    <title>Authorization</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!--Форма авторизации -->
<form>
    <input name="login" type="text" required placeholder="Login">
    <input name="password" type="Password" required placeholder="Password">
    <button type="submit" class="login-btn">Log in</button>
    <p>
        <a href="registration.php">Sign up</a>
    </p>
    <p class="msg none">/p>
    <p>
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </p>
</form>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
