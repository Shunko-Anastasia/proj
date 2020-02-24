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
				<a class="header_item" href="/construct">Конструктор</a>
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

 	<<footer class="header">
		<div class="header_section">
 			<div class="logo line">
 				  <p>Bird</p>
 			</div>
 			<nav class="header_menu">
				<p class="header_item">Связаться с нами:</a>
				<p class="header_item">ms.shunko@mail.ru</a>
 			</nav>
 		</div>

 		<div class="header_section">
			<nav class="header_menu">
				<p class="header_item">Мы находимся:</a>
				<p class="header_item">Большая Подьяческая, д. 22</a>
 			</nav>
 		</div>
	</footer>
 	
 </body>
 </html>