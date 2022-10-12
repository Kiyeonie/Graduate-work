<?php
echo $id_basket = $_GET['id_basket'];
$mysql = new mysqli('localhost','root','root','bd_nkhz');
$result = $mysql->query("DELETE FROM `basket` WHERE `id_basket` = '$id_basket'");
$mysql->close();
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index.php';
header("Location: $redirect");
exit();
?>
