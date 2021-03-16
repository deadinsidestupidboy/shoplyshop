<?php
require_once ('../core/DB.php');
class User{
    protected $id;
    protected $name;
    public $img;
    protected $money;
    function __construct($id){
        $link = mysqli_connect('localhost', 'root', '', 'shoplyshop');
        $query = "SELECT*FROM users WHERE id = $id";
        $result = mysqli_query($link, $query);
        $user = mysqli_fetch_array($result);
        $this->id = $id;
        $this->money = $user['money'];
        $this->name = $user['name'];
        $this->img = $user['img'];
    }
    public function getName()
    {
        return $this->name;
    }
    public function getMoney()
    {
        return $this->money;
    }
    public function changeMoney($change){
        $link = mysqli_connect('localhost', 'root', '', 'shoplyshop');
        $query = "UPDATE users money = $change WHERE id = $this->id";
    }
    public function getImg()
    {
        return $this->img;
    }
    public function buy($price)
    {
        if($this->money > $price)
        {
            $this->changeMoney($this->money - $price);
            echo "Операция прошла успешно";
            header('Location : index.php');
            exit(1);
        }
        else echo "недостаточно средств";
    }

}