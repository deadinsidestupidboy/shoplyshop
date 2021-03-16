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
    <div class="login">
        <form method="get" action="login.php">
            <input placeholder="name" name="name" type="text">
            <input placeholder="password" name="pass" type="text">
            <input type="submit" value="Войти">
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
    $query = "SELECT * from users WHERE name =  '".$name."'  AND pass =  '".$pass."'";
    $result = mysqli_query($link, $query);
    $id = 0;
    while ($user = mysqli_fetch_array($result))
    {
        $id = $user['id'];
    }
    setcookie('id', $id);
    if(isset($result))
    {
        header('Location: index.php');
        exit(1);

    }
    mysqli_close();
}
?>