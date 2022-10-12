<?php
  $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
  $company = filter_var($_POST['company'],FILTER_SANITIZE_STRING);
  $telephone = filter_var(trim($_POST['telephone']),FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
  $pass = md5($pass."password123");
  $mysql = new mysqli('localhost','root','root','bd_nkhz');
  $mysql->query("INSERT INTO `users` (`name`, `company`, `telephone`, `email`, `pass`) VALUES('$name', '$company', '$telephone', '$email', '$pass')");
  $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
  $user = $result->fetch_assoc();
  setcookie('user', $user['id'], time() + 3600 * 24, "/");
  $mysql->close();
  header('Location: ../Акаунт.php');
 ?>
