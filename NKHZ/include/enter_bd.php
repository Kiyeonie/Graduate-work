<?php
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
  $pass = md5($pass."password123");
  $mysql = new mysqli('localhost','root','root','bd_nkhz');
  $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass'");
  $user = $result->fetch_assoc();
  if(count($user) == 0){
    echo "takoy polzovatel ne nayden";
    exit();
  }
  setcookie('user', $user['id'], time() + 3600 * 24, "/");
  $mysql->close();
  $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index.php';
  header("Location: $redirect");
  exit();
 ?>
