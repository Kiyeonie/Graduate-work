<?php
  $id_user = $_COOKIE['user'];
  $id_product = $_POST['id_product'];
  $mysql = new mysqli('localhost','root','root','bd_nkhz');
  $info_product_dp = $mysql->query("SELECT * FROM `products` WHERE `id` = '$id_product'");
  $info_product = $info_product_dp->fetch_assoc();
  $name_product = $info_product["name"];
  $price_product = $info_product["price"];
  $number = filter_var(trim($_POST['number']),FILTER_SANITIZE_STRING);
  $total_price = $number * $info_product["price"];
  $photo = $info_product["photo"];
  $mysql->query("INSERT INTO `basket` (`checked`, `id_order`, `id_user`, `id_product`, `name_product`, `price_product`, `number_product`, `total_price`, `photo`) VALUES('images/no.png', '6', '$id_user', '$id_product', '$name_product', '$price_product', '$number', '$total_price', '$photo')");
  $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index.php';
  header("Location: $redirect");
  exit();
?>
