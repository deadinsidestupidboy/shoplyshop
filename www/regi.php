<!doctype html>
<html>
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="css/regi.css.css">
</head>
<body>
<header>
    <h1>ShoplyShop</h1>
</header>
<main>
    <div class="regi">
        <form method="get" action="regi.php">
            <input placeholder="name" name="name" type="text">
            <input placeholder="password" name="pass" type="text">
            <input type="submit" value="Зарегестрироваться">
        </form>
    </div>
</main>
<footer>

</footer>
</body>
</html>

<?php

require '../core/DB.php';

if(isset($_GET['name']) && isset($_GET['pass']))
{
    $name = $_GET['name'];$pass = $_GET['pass'];
    $link = mysqli_connect('localhost', 'root', '', 'shoplyshop');
    $query = "INSERT INTO users (name, pass, money) VALUES ('".$name."' , '".$pass."',  100000)";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    if(isset($result))
    {
        header('Location: index.php');
    }

}
?>