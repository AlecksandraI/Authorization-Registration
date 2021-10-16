<?php
session_start();
if(!$_SESSION['user']){
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!--Форма профиля -->
<form action="inc/signin.php" method="post">
    <p>Hello <?= $_SESSION['user']['name']?></p>
    <a href="inc/logout.php" class="logout">Log out</a>
</form>
</body>
</html>