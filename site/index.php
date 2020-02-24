<?php
$dbc = mysqli_connect('localhost', 'root', 'root', 'form'); //устанавливает соединение с сервером 
if(!isset($_COOKIE['user_id'])) //isset- определяет установлена ли переменная, отличная от 0 
// Cookies - это механизм хранения данных браузером удаленной машины для отслеживания или идентификации возвращающихся посетителей.
{ 
	if(isset($_POST['submit'])) // отправляет переменную 
  // Метод запроса POST предназначен для запроса, при котором веб-сервер принимает данные, заключённые в тело сообщения, для хранения. 
  { 
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username'])); 
    // делаем запрос к БД 
// функция используется для создания допустимых строк, которые можно использовать в SQL выражениях. trim удаляет пустые пробелы в строке. 
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    // делаем запрос к БД 
// и ищем юзера с таким логином и паролем 
		if(!empty($user_username) && !empty($user_password)) //empty— проверяет, пуста ли переменная
    {
			$query = "SELECT `user_id` , `username` FROM `user` WHERE username = '$user_username' AND password = SHA('$user_password')"; // query — выполняет запрос. select — выбирает записи из базы данных
			$data = mysqli_query($dbc,$query); //mysqli_query — выполняет запрос к базе данных
			if(mysqli_num_rows($data) == 1) { // если такой пользователь нашелся 
				$row = mysqli_fetch_assoc($data); // то мы ставим об этом метку в куки (допустим мы будем ставить ID пользователя) 
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30)); // 60 дней; 60 часов; 24 минут; 30 секунд  time — Возвращает текущую метку системного времени 
				//setcookie задает cookie, которое будет передано клиенту вместе с другими заголовками. Как и любой другой заголовок, cookie должны передаваться до того как будут выведены какие-либо другие данные скрипта
				setcookie('username', $row['username'], time() + (60*60*24*30));
				$home_url = 'index.php';
				header('Location: '. $home_url); //header — Отправка HTTP-заголовка
			}
			else {
				echo 'Извините, вы должны ввести правильные имя пользователя и пароль'; //echo — Выводит одну или более строк
			}
		}
		else {
			echo 'Извините вы должны заполнить поля правильно';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Shosho-Главная</title>



</head>
<body>

<header class="page-header">
  <div class="container">
    <a href="#" class="logo">
      <img src="img/logo.jpg" alt="Логотип" class="logo-img" height="50"
      width="47">
      <span class="logo-brand">
        <b>Shosho</b>
      </span>
    </a>

    <nav class="main-nav">
      <ul>
        <li><a class="active-btn-menu" href="index.php">Главная</a></li>
        <li><a href="catalog.php">Католог</a></li>
        <li><a href="contacs.php">Контакты</a></li>
        <li><a href="myprofile.php" class="btn-order">Личный кабинет</a></li>
        <li><a href="basket.php" class="btn-order">Корзина</a></li>
      </ul>
    </nav>

  </div>
</header>

<main>
  <div class="gradient"></div>
  <div class="promo">
   <div class="container">
      <p class="promo-title">Shosho</p>
      <h1 class="promo-slogan">Место обитания очарователтных вещей!</h1>
    </div>
   </div>
  </div>

  <div class="gradient"></div>


    <div class="information">
      	<img src="img/1.jpg" alt="Слоник" class="product-one">
      	<img src="img/2.jpg" alt="Мишка" class="product-two">
      	<img src="img/3.jpg" alt="Зайка" class="product-three">
      </div>


<section class= "form">
<?php
	if(empty($_COOKIE['username'])) //empty — Проверяет, пуста ли переменная
	 {
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> <!- $_SERVER - это массив, содержащий информацию, такую как заголовки, пути и местоположения скриптов.-> <!-Метод post посылает на сервер данные в запросе браузера. Это позволяет отправлять большее количество данных ->

		<label for="username">Логин</label>
	<input type="text" name="username">
	<label for="password">Пароль</label>
	<input type="password" name="password">
	<button type="submit" name="submit">Вход</button>
	<a href="checkin.php">Регистрация</a>
	</form>
<?php
}
else {
	?>
	<p><a href="myprofile.php">Личный кабинет</a></p>
	<p><a href="exit.php">Выйти(<?php echo $_COOKIE['username']; ?>)</a></p>
<?php	
}
?>
</section>


<div class="gradient"></div>

  
</main>

<footer class="page-footer">
  <div class="container">
    <a href="#" class="logo">
      <img src="img/logo.jpg" alt="Логотип" class="logo-img" height="50"
      width="47">
      <span class="logo-brand">
        <b>Shosho</b>
      </span>
    </a>

    <nav class="main-nav">
      <ul>
        <li><a class="active-btn-menu" href="#">Главная</a></li>
        <li><a href="catalog.php">Католог</a></li>
        <li><a href="contacs.php">Контакты</a></li>
        <li><a href="myprofile.php" class="btn-order">Личный кабинет</a></li>
        <li><a href="basket.php" class="btn-order">Корзина</a></li>
      </ul>
    </nav>

  </div>
</footer>

</body>
</html>