<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/registration.css">
	<link rel="icon" href="images/koloski.ico" type="image/x-icon">
	<title>Реєстрація</title>
    <meta name="description" content="">
    <meta name ="keywords" content="">
</head>
<body>
	<div id="menu">
		<a id="button-to-main" href="index.php">Новокаховський хлібзавод</a>
	</div>
	<br><br>
	<div id="id02" class="modal">
		<form class="modal-content form-enter-registration" action="include\registration_bd.php" method="post">
			<p class="buttons-title" align="center">Реєстрація</p>
			<div class="container">
				<label for="name"><b>Прізвище та ім'я</b></label>
				<input type="text" placeholder="Введіть прізвище та ім'я" name="name" required>
				<label for="company"><b>Назва підприємства</b></label>
				<input type="text" placeholder="Введіть назву підприємства" name="company">
				<label for="telephone"><b>Телефон</b></label>
				<input type="tel" id="phone" placeholder="+38(012)-345-67-89" name="telephone" required>
				<label for="email"><b>e-mail</b></label>
				<input type="text" placeholder="Введіть e-mail" name="email" required>
				<label for="pass"><b>Пароль</b></label>
				<input type="password" placeholder="Введіть пароль" name="pass" minlength="4" maxlength="10" required>
				<button type="submit">Зареєструватися</button>
			</div>
		</form>
	</div>
	<script src="js/imask.js"></script>
  <script>
	  document.addEventListener('DOMContentLoaded', () => {
      const inputElement = document.querySelector('#phone')
      const maskOptions = {
        mask: '+{38}({0}00)-000-00-00'}
      IMask(inputElement, maskOptions)})
  </script>
</body>
</html>
