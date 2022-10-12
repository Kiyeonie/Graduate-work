<?php
  if ($_COOKIE['total_amount'] != 0){
	  $id_user = $_COOKIE['user'];
    $total_amount = $_COOKIE['total_amount'];
    $address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
    $delivery_date = $_POST['delivery_date'];
    $credit_card = filter_var($_POST['credit_card'],FILTER_SANITIZE_STRING);
    $credit_card_date = filter_var($_POST['credit_card_date'],FILTER_SANITIZE_STRING);
    $credit_card_cvv = filter_var($_POST['credit_card_cvv'],FILTER_SANITIZE_STRING);
    $cash_payment = $_POST['cash_payment'];
    $date_payment = date("Y-m-d");
    $mysql = new mysqli('localhost','root','root','bd_nkhz');
    if($cash_payment == 'on'){
      $mysql->query("INSERT INTO `orders` (`total_amount`, `id_user`, `address`, `delivery_date`, `cash_payment`, `date_payment`) VALUES('$total_amount', '$id_user', '$address', '$delivery_date', '$cash_payment', '$date_payment')");
    }
    if($cash_payment == '') {
      $cash_payment = 'off';
      $mysql->query("INSERT INTO `orders` (`total_amount`,`id_user`,`address`,`delivery_date`,`credit_card`,`credit_card_date`,`credit_card_cvv`,`cash_payment`,`date_payment`) VALUES('$total_amount','$id_user','$address','$delivery_date','$credit_card','$credit_card_date','$credit_card_cvv','$cash_payment','$date_payment')");
    }
    $result = $mysql->query("SELECT * FROM `orders` ORDER BY `id` DESC LIMIT 1");
    $last_order = $result->fetch_assoc();
    $id_order = $last_order['id'];
    $mysql->query("UPDATE `basket` SET `id_order` = '$id_order' WHERE `checked` = 'images/ok.png' AND `id_order` = '6' AND `id_user` = '$id_user'");
    setcookie('total_amount', 0, time() - 3600 * 24, "/");
  }
  $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index.php';
  header("Location: $redirect");
  exit();
 ?>
