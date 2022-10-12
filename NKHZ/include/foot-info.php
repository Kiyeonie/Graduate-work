<div id="foot-info">
  <div id="time-work" align="center">
    <h3>Графік роботи:</h3>
    <p>Пн 8:00 - 17:00</p>
    <p>Вт 8:00 - 17:00</p>
    <p>Ср 8:00 - 17:00</p>
    <p>Чт 8:00 - 17:00</p>
    <p>Пт 8:00 - 16:00</p>
    <p>Сб, Нд вихідні</p>
  </div>
  <div id="adress-info" align="center">
    <h3>Фізична адреса:</h3>
    <p>Україна, 74900, Херсонська обл., місто Нова Каховка, вулиця Латиських Стрільців, будинок 1</p>
  </div>
  <div id="contact-info" align="center">
    <h3>Контактна інформація:</h3>
    <p>Телефон (05549) 42514</p>
    <p>Факс (05549) 72800</p>
    <p>Керівник:</p>
    <p>Худницька Валентина Василівна</p>
  </div>
  <div id="gps" align="center">
    <h3>Навігація сайтом:</h3>
    <p class="link-nav-p"><a class="link-nav" href="index.php">Головна сторінка</a></p>
    <p class="link-nav-p"><a class="link-nav" href="Каталог.php">Види продукції</a></p>
    <p class="link-nav-p"><a class="link-nav" href="Реєстрація.php">Реєстрація</a></p>
    <?php if($_COOKIE['user'] != ''):?>
      <p class="link-nav-p"><a class="link-nav" href="Акаунт.php">Акаунт</a></p>
      <p class="link-nav-p"><a class="link-nav" href="Кошик.php">Кошик</a></p>
    <?php endif;?>
  </div>
</div>
