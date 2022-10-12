<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/menu-footer.css">
	<link rel="stylesheet" href="CSS/account.css">
	<link rel="icon" href="images/koloski.ico" type="image/x-icon">
	<title>Акаунт</title>
    <meta name="description" content="Ваш акаунт на сайті Новокаховського хлібзаводу">
    <meta name ="keywords" content="Новокаховський хлібзавод, акаунт, ПІБ, підприємство, телефон, адреса, e-mail, пароль, фото">
</head>
<body>
	<div class="dpbody">
	<div id="header">
 		 <?php
         include("include/menu.php");
 		 ?>
  </div>
  <br>
	<div id="content">
		<?php
		$mysql = new mysqli('localhost','root','root','bd_nkhz');
		$cookie_id = $_COOKIE['user'];
		$result = $mysql->query("SELECT * FROM `users` WHERE `id` = '$cookie_id'");
		$user = $result->fetch_assoc();
		$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	  $company = filter_var($_POST['company'],FILTER_SANITIZE_STRING);
	  $telephone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
	  $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
		$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
	  $pass = md5($pass."password123");
		if(isset($_POST['save'])){
			$mysql->query("UPDATE `users` SET `name` = '$name', `company` = '$company', `telephone` = '$telephone', `email` = '$email', `pass` = '$pass' WHERE `id` = '$cookie_id'");
			header("Refresh:0");
		}
		if(isset($_POST['cansell'])){
			header("Refresh:0");
		}
		?>
	  <div id="right-content">
			<form method="POST">
				<div class="label-account"><b>Прізвище та ім'я</b></div>
				<input oninput="document.getElementById('save-cansel-buttons').style.display='block'" class="input-account" type="text" placeholder="Введіть прізвище та ім'я" name="name" value="<?php echo ''.$user["name"].'';?>" required><br>
				<div class="label-account"><b>Назва підприємства</b></div>
				<input oninput="document.getElementById('save-cansel-buttons').style.display='block'" class="input-account" type="text" placeholder="Введіть назву підприємства" name="company" value="<?php echo ''.$user["company"].'';?>"><br>
				<div class="label-account"><b>Телефон</b></div>
				<input oninput="document.getElementById('save-cansel-buttons').style.display='block'" class="input-account" type="text" id="phone" placeholder="+38(012)-345-67-89" name="phone" value="<?php echo ''.$user["telephone"].'';?>" required><br>
				<div class="label-account"><b>e-mail</b></div>
				<input oninput="document.getElementById('save-cansel-buttons').style.display='block'" class="input-account" type="text" placeholder="Введіть e-mail" name="email" value="<?php echo ''.$user["email"].'';?>" required><br>
				<div class="label-account"><b>Пароль</b></div>
				<input oninput="document.getElementById('save-cansel-buttons').style.display='block'" id="pass" class="input-account" type="password" placeholder="Натисніть, щоб змінити пароль" name="pass" minlength="4" maxlength="10"><br>
				<input type="checkbox" onclick="show_password()" name="show-pass"><b>  Показати пароль</b>
				<div id="save-cansel-buttons">
				  <button id="cansel-button" class="save" name="cansell" style="background:red">Скасувати</button>
				  <button class="save" type="submit" name="save" style="background:#4CAF50">Зберегти зміни</button>
			  </div>
			</form>
		</div>
		<div id="left-content" align="center">
			<img id="avatarka-account" src="images/avatarka-account.png" width="180px"><br>
			<a id="button-korzina" href="Кошик.php"><img src="images/korzina.png" width="100px" title="Кошик"></a>
		</div>

	</div>
	<script>
	  function show_password() {
      var x = document.getElementById("pass");
      if (x.type === "password") {
          x.type = "text";}
			else {
          x.type = "password";}}
	</script>
  <script src="js/imask.js"></script>
  <script>
	  document.addEventListener('DOMContentLoaded', () => {
      const inputElement = document.querySelector('#phone')
      const maskOptions = {
        mask: '+{38}({0}00)-000-00-00'}
      IMask(inputElement, maskOptions)})
  </script>
	<footer>
		<?php
			 include("include/foot-info.php");
		?>
	</footer>
</div>
</body>
</html>
