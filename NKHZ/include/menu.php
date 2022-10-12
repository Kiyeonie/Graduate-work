<div id="menu">
	<?php
	  if($_COOKIE['user'] == ''):
	 ?>
	<button onclick="document.getElementById('id01').style.display='block'" id="button-enter">Вхід</button>
	<div id="id01" class="modal">
		<form class="modal-content animate form-enter-registration" action="include/enter_bd.php" method="post">
			<div class="title-form">
			  <span onclick="document.getElementById('id01').style.display='none'" class="close">×</span>
			  <p class="buttons-title" align="center">Вхід</p>
	  	</div>
      <div class="container">
        <label class="label-menu" for="email"><b>e-mail</b></label><br>
        <input class="input-menu" type="text" placeholder="Введіть e-mail" name="email" required><br>
        <label class="label-menu" for="pass"><b>Пароль</b></label><br>
        <input class="input-menu" type="password" placeholder="Введіть пароль" name="pass" required>
        <button id="enter" type="submit">Увійти</button>
      </div>
      <div class="container" style="background-color:#f1f1f1">
				<a id="link-registration" href="Реєстрація.php">Реєстрація</a>
      </div>
    </form>
	</div>
	<script>
    var modal = document.getElementById('id01');
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";}}
  </script>
  <?php else: ?>
	<a id="link-exit" href="include/exit.php">Вихід</a>
  <a id="button-avatar" href="Акаунт.php"><img src="images/avatarka.png" width="48px" height="48px" align="left" title="Акаунт"></a>
  <a id="button-korzinka" href="Кошик.php"><img src="images/korzinka.png" width="43px" height="48px" align="left" title="Кошик"></a>
	<?php endif;?>
  <a id="button-to-main" href="index.php" title="Головна сторінка">Новокаховський хлібзавод</a>
</div>
