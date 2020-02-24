<main>
	<div align="center"><h4>Личный кабинет</h4></div>
  
	<div class= "form"> 
			<?php 
			if(empty($_COOKIE['user_id'])) 
			?> 

		<section>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
				<label for="username">Логин:</label> 
				<input type="text" name="name"> 
				<label for="password">Пароль:</label> 
				<input type="password" name="password"> 
				<button type="submit" name="submit">Вход</button> 
				<a href="/registration">Регистация</a> 
			</form> 
		</section>
		<?php 
		} 
		else { 
		?> 
		<h1>Здравствуйте <?php echo $_COOKIE['login']; ?>!</h1>
		<h3>Ваши персональные данные:</h3> 
		<p>Логин: <?php echo $_COOKIE['login']; ?></p> 
		<p>Номер телефона: <?php echo $_COOKIE['phone']; ?></p> 
		<p>E-mail: <?php echo $_COOKIE['email']; ?></p>
	</div>
  
</main>


 	</section>
</main>