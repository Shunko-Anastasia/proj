<?php 
$dbc = mysqli_connect('localhost', 'root', 'root' , 'form') OR DIE('Ошибка подключения к базе данных'); //устанавливает соединение с сервером 
if(isset($_POST['submit']))// отправляет переменную 
  // Метод запроса POST предназначен для запроса, при котором веб-сервер принимает данные, заключённые в тело сообщения, для хранения. 
{ 
$username = mysqli_real_escape_string($dbc, trim($_POST['username'])); 
$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1'])); 
$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2'])); 
$name = mysqli_real_escape_string($dbc, trim($_POST['name'])); 
$fam = mysqli_real_escape_string($dbc, trim($_POST['fam'])); 
$tnumber = mysqli_real_escape_string($dbc, trim($_POST['tnumber'])); 
// делаем запрос к БД 
// функция используется для создания допустимых строк, которые можно использовать в SQL выражениях. trim удаляет пустые пробелы в строке. 
if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2) && !empty($name) && !empty($fam) && !empty($tnumber)) //empty— проверяет, пуста ли переменная
{ 
$query = "SELECT * FROM `user` WHERE username = '$username'"; 
$data = mysqli_query($dbc, $query); // query — выполняет запрос. select — выбирает записи из базы данных
if (mysqli_num_rows($data) == 0)
{ 
$query ="INSERT INTO `user` (username, password, name, fam, tnumber) VALUES ('$username', SHA('$password2'), '$name', '$fam', '$tnumber')"; // заполняем данные
mysqli_query($dbc,$query); 
echo 'Успешно'; 
mysqli_close($dbc); 
exit(); 
} 
else { 
echo 'Ошибка'; 
} 
} 
} 
?>

<!DOCTYPE html> 
<html lang="ru"> 
<head> 
<meta charset="UTF-8"> 
<link rel="stylesheet" type="text/css" href="style.css">
<title>Shosho-Регистрация</title> 

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

<div class="gradient"></div>

<main>
  <div class="promo">
   <div class="container">
      <p class="promo-title">Добро пожаловать!</p>
      <h1 class="promo-slogan">Регистрация</h1>
      <content> 
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
			<table border="0" width="100%" align="center" > 
			<tr><td align="center"><label for="username">Логин:</label> 
			<input type="text" name="username"> </td><td> 
			<tr><td align="center"><label for="name">Имя:</label> 
			<input type="text" name="name"> </td><td> 
			<tr><td align="center"><label for="fam">Фамилия:</label> 
			<input type="text" name="fam"> </td><td> 
			<tr><td align="center"><label for="tnumber">Номер телефона:</label> 
			<input type="text" name="tnumber"> </td><td> 
			<tr><td align="center"><label for="password">Пароль:</label> 
			<input type="password" name="password1"> </td><td> 
			<tr><td align="center"><label for="password">Повторите пароль:</label> 
			<input type="password" name="password2"> </td><td> 
			<tr><td align="center"><button type="submit" name="submit">Вход</button> </td><td> 
		</form> 
	</content> 
    </div>
   </div>
  </div>
</main>




</body> 