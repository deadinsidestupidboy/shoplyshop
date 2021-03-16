<?php
require_once ('../logic/User.php');
$id = $_COOKIE['id'];
$price = $_GET['price'];
$user = new User($id);
$user->buy($price);