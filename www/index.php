<!doctype html>
<html>
<head>
    <title>ShoplyShop</title>
    <link href="css/main.css" rel ="stylesheet" ">
</head>
<body>
<header>
<div class="icon">
<h1>ShoplyShop</h1>
</div>
<div class="user">
    <?php
    require_once ('../logic/User.php');

    $id = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
    if($id == null){ ?>
        <a href="login.php">Login</a>
    <?php }
    else{ $user = new User($id); ?>
        <div class = "user-name">
            <a href="user.php">
                <?php echo $user->getName() . "  "; echo $user->getMoney()?>
            </a>
        </div>
    <?php }?>
</div>
</header>
<main>
<div class="menu">
    <div class="category">
        Процессоры
        <ul>
            <li><a href="index.php?tag=AM4&type=proc">AM4</a></li>
            <li><a href="index.php?tag=AM3">AM3</a></li>
            <li><a href="index.php?tag=LGA1151">LGA 1151</a></li>
            <li><a href="index.php?tag=LGA1151-v2">LGA 1151-v2</a></li>
            <li><a href="index.php?tag=LGA1200">LGA 1200</a></li>
            <li><a href="index.php?tag=LGA775">LGA 775</a></li>
        </ul>
    </div>
</div>
<div class="products">
<?php
require_once ('../logic/Product.php');
$tag = isset($_GET['tag']) ? "WHERE tag = '".$_GET['tag']."'" : '';
$type = isset($_GET['type']) ? " AND  type = '".$_GET['type']."' " : '';
$products = Product::get($tag.$type,'');
while($product = mysqli_fetch_array($products)){ ?>
    <div class="product">
        <div class="p-img"><img src="<?php echo $product['img']?>" width="220"></div>
        <div class="p-info">
            <div class="p-name"><a href="overview.php?name=<?php echo $product['name']?>"><?php echo $product['name'] ?></a></div>
            <div class="p-about"><?php echo $product['about']?></div>
            <div class="p-price"><?php echo $product['price']?></div>
        </div>
    </div>
<?php } ?>
</div>
</main>
<footer>

</footer>
</body>
</html>