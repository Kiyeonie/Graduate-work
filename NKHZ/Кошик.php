<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/menu-footer.css">
	<link rel="stylesheet" href="CSS/korzina.css">
	<link rel="icon" href="images/koloski.ico" type="image/x-icon">
	<title>Кошик</title>
  <meta name="description" content="Новокаховський хлібзавод">
  <meta name ="keywords" content="Новокаховський хлібзавод, продукція, каталог, хліб, батон, булочка, печіво, тістечко, бублики, кекс, торти">
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
		<div id="right-content">
			<?php
			if (empty($_COOKIE['total_amount'])){
			  setcookie('total_amount', 0, time() + 3600 * 24, "/");}
			$id_user = $_COOKIE['user'];
			$mysql = new mysqli('localhost','root','root','bd_nkhz');
			$result = $mysql->query("SELECT * FROM `basket`");
			$basket = $result->fetch_assoc();
			$today = date("Y-m-d");
			$min_date = date("Y-m-d", strtotime($today.'+ 1 days'));
			$max_date = date("Y-m-d", strtotime($today.'+ 30 days'));
			?>
			<form action="include/order_bd.php" method="POST">
				<p align="center" class="p-height">Замовлення</p>
				<p class="otstup p-height">Загальна сума: <?php echo $_COOKIE['total_amount']; ?> грн.</p>
				<label class="label-basket" for="address">Адреса</label><br>
				<input class="input-basket" type="text" name="address" placeholder="Введіть адресу для доставлення" required><br>
				<label class="label-basket" for="delivery_date">Дата доставлення товару</label><br>
				<input class="input-basket" type="date" name="delivery_date" id="delivery_date" placeholder="00.00.0000" maxlength="10" minlength="10" min="<?=$min_date?>" max="<?=$max_date?>" required><br>
				<div id="hid">
				<label class="label-basket" for="credit_card">Номер картки</label><br>
				<input class="input-basket" type="text" name="credit_card" id="card" placeholder="0000 0000 0000 0000" maxlength="19" minlength="19"><br>
				<label class="label-basket" for="credit_card_date">Дата закінчення дії картки</label><br>
				<input class="input-basket" type="text" name="credit_card_date" id="card_date" placeholder="00/00" maxlength="5" minlength="5"><br>
				<label class="label-basket" for="credit_card_cvv">CVV</label><br>
				<input class="input-basket" type="text" name="credit_card_cvv" id="card_cvv" placeholder="000" maxlength="3" minlength="3"><br>
				<p align="center" class="p-height">або</p>
			  </div>
				<input class="otstup" type="checkbox" name="cash_payment" onclick="ifchecked()" id="check_cash_payment"><label for="cash_payment"> Сплата готівкою</label><br>
				<p align="center"><button type="submit" id="pay" style="display: none;">Сплaтити</button></p>
		  </form>
		</div>
		<div id="left-content">
			<?php
			do{
				if($basket["id_user"] == $id_user && $basket["id_order"] == '6'){
				echo '<div class="info-of-product">
				        <form action="include/checked_bd.php" method="POST" class="checkbox-form">
								  <input type="hidden" name="id_basket" value="'.$basket["id_basket"].'">
								  <button type="submit" class="checkbox-product"><img class="img-okno" src="'.$basket["checked"].'"></button>
								</form>
								<img class="photo-product" src="'.$basket["photo"].'" width="100px">
								<div class="product-description">
									<p class="title-product"><b>'.$basket["name_product"].'</b></p>
									<p align="left">Ціна за одиницю: <span class="price_for_one">'.$basket["price_product"].'</span> грн.</p>
									<p align="left">Кількість: <span id="count">'.$basket["number_product"].'</span></p>
									<p align="left">Загальна ціна: <span id="total_price">'.$basket["total_price"].'</span> грн.</p>
								</div>
								<a class="delete" title="Видалити" href="include\delete_from_basket.php?id_basket='.$basket["id_basket"].'">×</a>
						  </div>';
						}}
			while($basket = $result->fetch_assoc());
			?>
		</div>
	</div>
	<script>
  var btn = document.getElementById("pay");
	var card = document.getElementById("card");
	var card_date = document.getElementById("card_date");
	var card_cvv = document.getElementById("card_cvv");
	var hid = document.getElementById("hid");
	card.oninput = function (){
		if (card.value != '' && card_date.value != '' && card_cvv.value != ''){
	    btn.style.display = "block";
		}
	};
	card_date.oninput = function (){
		if (card.value != '' && card_date.value != '' && card_cvv.value != ''){
	    btn.style.display = "block";
		}
	};
	card_cvv.oninput = function (){
		if (card.value != '' && card_date.value != '' && card_cvv.value != ''){
	    btn.style.display = "block";
		}
	};
	function ifchecked() {
  var checkBox = document.getElementById("check_cash_payment");
  if (checkBox.checked == true){
    btn.style.display = "block";
		hid.style.display = "none";
  } else {
    btn.style.display = "none";
		hid.style.display = "block";
  }}
	</script>
	<script src="js/imask.js"></script>
  <script>
	  document.addEventListener('DOMContentLoaded', () => {
      const inputElement = document.querySelector('#card')
      const maskOptions = {
        mask: '0000 0000 0000 0000'}
      IMask(inputElement, maskOptions)})
  </script>
	<script>
	  document.addEventListener('DOMContentLoaded', () => {
      const inputElement = document.querySelector('#card_date')
      const maskOptions = {
        mask: '00/00'}
      IMask(inputElement, maskOptions)})
  </script>
	<script>
	  document.addEventListener('DOMContentLoaded', () => {
      const inputElement = document.querySelector('#card_cvv')
      const maskOptions = {
        mask: '000'}
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
