<!DOCTYPE html>
 <html lang="ru">
 <head>
 	<meta charset="UTF-8">
 	<title><?php echo $title; ?></title>
 	<link rel="stylesheet" href="/static/css/style.css">
 </head>
 <body>

 	<header class="header">
		<div class="header_section">
 			<div class="logo line">
 				  <p>Bird</p>
 			</div>
 			<nav class="header_menu">
				<a class="header_item" href="/">Главная</a>
				<a class="header_item" href="/construct">Путешествия</a>
 			</nav>
 		</div>

 		<div class="header_section">
			<nav class="header_menu">
				<a class="header_item" href="/account">Личный кабинет</a>
				<a class="header_item" href="/registration">Регистрация</a>
 			</nav>
 		</div>
 	</header>

	<!-- подгружаем сранички с инфой -->
    <?php include_once $content; ?> 

 	<footer class="header">
		<div class="header_section">
 			<div class="logo line">
 				  <p>Bird</p>
 			</div>
 			<nav class="header_menu">
				<a class="header_item" href="/">Связаться с нами:</a>
				<a class="header_item" href="/construct">ms.shunko@mail.ru</a>
 			</nav>
 		</div>

 		<div class="header_section">
			<nav class="header_menu">
				<a class="header_item" href="/account">Мы находимся:</a>
				<a class="header_item" href="/registration">Большая Подьяческая, д. 22</a>
 			</nav>
 		</div>
 		<!-- личная инфа о нас типо телефоны и емэйлы -->
	</footer>
 	
 </body>
 </html>