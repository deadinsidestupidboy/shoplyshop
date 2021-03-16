<?php
$name = isset($_GET['name']) ? "WHERE name='".$_GET['name']."'" : "";
?>
<!doctype html>
<html>
<head>
    <title>ShoplyShop</title>
    <link href="css/over.css" rel ="stylesheet" ">
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
            Мат платы
            <ul>
                <li>AM4</li>
                <li>AM3</li>
                <li>LGA 1151</li>
                <li>LGA 1151-v2</li>
                <li>LGA 1200</li>
                <li>LGA 775</li>
            </ul>
        </div>
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
        <div class="category">
            Видеокарты
            <ul>
                <li>AMD</li>
                <li>NVIDIA</li>
            </ul>
        </div>
    </div>
    <div class="products">
        <?php
        require_once ('../logic/Product.php');
        $products = Product::get($name,'');
        $product = mysqli_fetch_array($products)?>
            <div class="product">
                <div class="p-img"><img src="<?php echo $product['img']?>" width="300"></div>
                <div class="p-price"><?php echo $product['price']?></div>
                <?php if(isset($user)){?>
                    <form method="get" action="accept.php">
                        <input type="hidden" name="price" value="<?php echo $product['price']?>">
                        <input type="submit" value="Купить">
                    </form>
                <?php } ?>
                <div class="p-about"><?php echo $product['about']?></div>
            </div>
    </div>
</main>
<footer>

</footer>
</body>
</html>