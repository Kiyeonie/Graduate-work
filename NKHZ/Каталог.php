<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/menu-footer.css">
	<link rel="stylesheet" href="CSS/catalog.css">
	<link rel="icon" href="images/koloski.ico" type="image/x-icon">
	<title>Каталог продукції</title>
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
	<div id="type-blocks">
		<?php
		$mysql = new mysqli('localhost','root','root','bd_nkhz');
	  $result = $mysql->query("SELECT * FROM `types_products`");
	  $types_products = $result->fetch_assoc();
		  do{
		    echo '<a class="types-of-products" href="Критерії вибору.php?type='.$types_products["type_product"].'">
								<img src="'.$types_products["photo"].'" class="photo">
			          <p class="name-of-type" align="center">'.$types_products["type_product"].'</p>
		          </a>';}
		  while ($types_products = $result->fetch_assoc());
		?>
	</div>
	<footer>
		<?php
      include("include/foot-info.php");
		?>
	</footer>
</div>
</body>
</html>
