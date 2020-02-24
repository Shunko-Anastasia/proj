<?php 
session_start(); 
$connect = mysqli_connect('localhost', 'root', 'root', 'form') OR DIE('Ошибка подключения к базе данных');/*подключение к базе данных */ 

if(isset($_POST["add_to_cart"])) ////isset- определяет установлена ли переменная, отличная от 0 
// Метод запроса POST предназначен для запроса, при котором веб-сервер принимает данные, заключённые в тело сообщения, для хранения. 
{ 
if(isset($_SESSION["shopping_cart"])) 
// запись товара в корзину и его количество, создание массива 
//сессии - это механизм, позволяющий однозначно идентифицировать браузер и создающий для этого браузера файл на сервере, в котором хранятся переменные 

{ 
$item_array_id = array_column ($_SESSION["shopping_cart"], "id_product"); 
if(!in_array($_GET["id_product"], $item_array_id)) 
// если товар еще не добален в корзину 
//array_column — Возвращает массив из значений одного столбца входного массива

{ 
$count = count($_SESSION["shopping_cart"]); 
$item_array = array( 
'id_product' => $_GET["id_product"], 
'prod_name' => $_POST["prod_name"], 
'price' => $_POST["price"], 
'kol' => $_POST["kol"] 
); 
//Метод GET служит для передачи данных и взаимодействия с сервером.
// Метод запроса POST предназначен для запроса, при котором веб-сервер принимает данные, заключённые в тело сообщения, для хранения. 

$_SESSION["shopping_cart"][$count] = $item_array; 
} 
else // если товар добален в корзину, то вывести сообщение на экран
{ 
echo '<script>alert("Товар уже добавлен")</script>'; 
echo '<script>window.location="catalog.php"</script>'; 
} 
} 
else 
{ 
$item_array = array( 
'id_product' => $_GET["id_product"], 
'prod_name' => $_POST["prod_name"], 
'price' => $_POST["price"], 
'kol' => $_POST["kol"] 
); 
$_SESSION["shopping_cart"][0] = $item_array; 
} 
} 
if(isset($_GET["action"])) //isset — Определяет, была ли установлена переменная значением, отличным от NULL
{ 
if($_GET["action"] == "delete") // если нужно удалить товар,есть кнопка удалить и после выводится сообщение товар удален 
{ 
foreach($_SESSION["shopping_cart"] as $keys => $values) 
//Конструкция foreach предоставляет простой способ перебора массивов. Foreach работает только с массивами и объектами и будет генерировать ошибку при попытке использования с переменными других типов или неинициализированными переменными. 
{ 
if($values["id_product"] == $_GET["id_product"]) 
{ 
unset($_SESSION["shopping_cart"][$keys]); //unset — Удаляет переменную
echo '<script>alert("Товар удален")</script>'; 
echo '<script>window.location="catalog.php"</script>'; 
} 
} 
} 
} 
?> 

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Shosho-Каталог</title>


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

<? 
$sql = "SELECT * FROM `product`"; // Подключение к таблице товаров из бд 
$result = mysqli_query($connect,$sql); 
echo "<h2>Товары:</h2>"; 

while($user = mysqli_fetch_assoc($result)) { ?> 

<div class="col-md-4"> 
<form method="post" action="catalog.php?action=add&id=<?php echo $user["id"]; ?>"> 
<div style=" margin-bottom: 20px; 
border:1px solid #FEA698; background-color:#FFEFEF; border-radius:5px; padding:16px;" align="center"> 

<img src="<?php echo $user["image"]; ?>" class="img-responsive" /> <!— Выводим фото тавара из бд —> <br /> 

<h4 class="text-info"><?php echo $user["prod_name"]; ?></h4> <!— Выводим название товара из бд —> 

<h4 class="text-danger"><?php echo $user["price"]; ?></h4> <!— Выводим цену товара из бд —> 

<input type="text" name="kol" class="form-control" value="1" /> 
<input type="hidden" name="prod_name" value="<?php echo $user["prod_name"]; ?>" /> 
<input type="hidden" name="price" value="<?php echo $user["price"]; ?>" /> 
<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Добавить в корзину" /> 
</div> 
</form> 


<?php
?> 


<button type="button" ><a href="basket.php">Перейти в корзину</a></button> 

<div class="gradient"></div>

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