<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/menu-footer.css">
	<link rel="stylesheet" href="CSS/product-choice.css">
	<link rel="icon" href="images/koloski.ico" type="image/x-icon">
	<title>Продукція</title>
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
		<div id="content">
	  	<div id="right-content">
				<?php
				$type=$_GET['type'];
				if($_COOKIE['user'] == ''){
					$disabled = "disabled";
					$textbtn = "Щоб додати до кошику, увійдіть в акаунт";
					echo '<style>
					        .button-add-to-korzina{
										background: radial-gradient(#31313D, rgba(120, 91, 90, 0.8));
									}
									.button-add-to-korzina:hover{
										background: radial-gradient(#31313D, rgba(120, 91, 90, 0.8));
										box-shadow: none;
									}
					      </style>';
				}
		  	else{
					$disabled = "";
					$textbtn = "Додати до кошику";
				}
				$sort = "id DESC";
				if (isset($_POST['sort'])){
					$sort = $_POST['sort'];}
				$mysql = new mysqli('localhost','root','root','bd_nkhz');
			  $result = $mysql->query("SELECT * FROM `products` WHERE `type` = '$type' ORDER BY {$sort}");
			  $products = $result->fetch_assoc();
				$ot = 0;
				$do = 5000;
				if (isset($_POST['ot'])||isset($_POST['do'])){
					$ot = $_POST['ot'];
					$do = $_POST['do'];}
				if($products != ''){
				do{
					if($products["price"] >= $ot && $products["price"] <= $do){
		  	  echo '<div class="info-of-product">
  								<div class="right-info" >
										<p class="title-product"><b>'.$products["name"].'</b></p>
										<p  class="consist">Склад: '.$products["consist"].'</p><br>
										<p>Вага: '.$products["weight"].' г</p><br>
	  							</div>
									<div class="left-info" align="center">
										<img class="photo-product" src="'.$products["photo"].'" width="200px"><br>
										<p align="left">Ціна за одиницю: <span class="price-for-one" id="price">'.$products["price"].'</span> грн.</p>
										<form action="include/add_to_basket.php" method="POST">
										  <p align="left">Кількість: <span id="demo"><label class="ot-do-label"><input class="ot-do-input" type="number" min="'.$products["min_amount"].'" max="200" name="number" value="'.$products["min_amount"].'"></label></span></p>
											<input type="hidden" name="id_product" value="'.$products["id"].'">
										  <button type="submit" class="button-add-to-korzina" name="button-add-to-korzina" '.$disabled.'>'.$textbtn.'</batton>
										</form>
									</div>
								</div>';}}
				while ($products = $result->fetch_assoc());}
				else{
					echo '<p class="title-product" align="center"><b>Товару такого виду немає в наяіності</b></p>';
				}
				?>
  		</div>
	  	<div id="left-content">
		    <div id="сriterias-of-choice">
					<form action="" method="POST" name="choice">
			  		<p class="name-choice">Ціна: <p>
				  	<label class="name-choice" for="ot">від</label>
  					<label class="ot-do-label ot-otstup"><input class="ot-do-input prise" type="text" name="ot" value="0"></label>
	  				<label class="name-choice" for="do">до</label>
		  			<label class="ot-do-label"><input class="ot-do-input price" type="text" name="do" value="5000"></label>
			  		<label class="name-choice">грн.</label>
				  	<p class="name-choice" id="measure">Сортувати: <p>
						<p class="name-choice"><font color="#4909AB">- за алфавітом</font><p>
	  				<input type="radio" id="a-z" name="sort" value="name ASC">
  					<label class="name-choice" for="a-z">від А до Я</label><br><br>
			  		<input type="radio" id="z-a" name="sort" value="name DESC">
		  			<label class="name-choice" for="z-a">від Я до А</label>
						<p class="name-choice"><font color="#4909AB">- за ціной</font><p>
						<input type="radio" id="min-max" name="sort" value="price ASC">
	  		  	<label class="name-choice" for="min-max">за зростанням</label><br><br>
			 	  	<input id="max-min" type="radio" name="sort" value="price DESC">
		  	  	<label class="name-choice" for="max-min">за спаданням</label><br>
						<p align="center" id="p-btn"><button type="submit" id="button-sort">Сортувати</button></p>
					</form>
					<script>
    var radio = document.choice.sort;
    for (var i = 0; i < radio.length; ++i) {
        radio[i].onchange = function () {
            document.myForm.submit();
        }
    }
</script>
  		  </div>
	    </div>
		</div>
	  <footer>
		  <?php
        include("include/foot-info.php");
		  ?>
	  </footer>
  </div>
</body>
</html>
