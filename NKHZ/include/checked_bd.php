<?php
  $basket_id = $_POST['id_basket'];
  $mysql = new mysqli('localhost','root','root','bd_nkhz');
  $result = $mysql->query("SELECT * FROM `basket` WHERE `id_basket` = '$basket_id'");
  $basket = $result->fetch_assoc();
  $basket_check = $basket['checked'];
  if($basket_check == 'images/no.png'){
    $mysql->query("UPDATE `basket` SET `checked` = 'images/ok.png' WHERE `id_basket` = '$basket_id'");
    $cook = $_COOKIE['total_amount'] + $basket['total_price'];
    setcookie('total_amount', $cook, time() + 3600 * 24, "/");
  }
  if($basket_check == 'images/ok.png'){
    $mysql->query("UPDATE `basket` SET `checked` = 'images/no.png' WHERE `id_basket` = '$basket_id'");
    $cook = $_COOKIE['total_amount'] - $basket['total_price'];
    setcookie('total_amount', $cook, time() + 3600 * 24, "/");
  }
  $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index.php';
  header("Location: $redirect");
  exit();
 ?>
