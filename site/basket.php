<?php 
session_start(); 
$connect = mysqli_connect('localhost', 'root', 'root', 'form') OR DIE('Ошибка подключения к базе данных');/*подключение к базе данных */ 
if(isset($_POST["add_to_cart"])) //isset- определяет установлена ли переменная, отличная от 0 
// Метод запроса POST предназначен для запроса, при котором веб-сервер принимает данные, заключённые в тело сообщения, для хранения. 
// добавляем в корзину 
{ 
if(isset($_SESSION["shopping_cart"])) // запись товара в корзину и его количество, создание массива 
  //сессии - это механизм, позволяющий однозначно идентифицировать браузер и создающий для этого браузера файл на сервере, в котором хранятся переменные 

{ 
$item_array_id = array_column($_SESSION["shopping_cart"], "id_product"); //array_column — Возвращает массив из значений одного столбца входного массива 

if(!in_array($_GET["id_product"], $item_array_id)) //in_array — Проверяет, присутствует ли в массиве значение
// если товар еще не добален в корзину 

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
echo '<script>window.location="basket.php"</script>'; 
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
if($_GET["action"] == "delete")  // если нужно удалить товар,есть кнопка удалить и после выводится сообщение товар удален 
{ 
foreach($_SESSION["shopping_cart"] as $keys => $values) 
  //Конструкция foreach предоставляет простой способ перебора массивов. Foreach работает только с массивами и объектами и будет генерировать ошибку при попытке использования с переменными других типов или неинициализированными переменными. 
{ 
if($values["id_product"] == $_GET["id_product"]) 
{ 
unset($_SESSION["shopping_cart"][$keys]); //unset — Удаляет переменную
echo '<script>alert("Товар удален")</script>'; 
echo '<script>window.location="basket.php"</script>'; 
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
  <title>Shosho-Корзина</title>



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

<div style="clear:both"></div> 
<br /> 
 <p class="promo-title">Корзина</p>
   
<div class="table-responsive"> 
<table border="1" bordercolor="#C71585"> 
<tr> 
<th>Название товара</th> 
<th>Колличество</th> 
<th>Цена за штуку</th> 
<th>Итоговая цена</th> 
<th>Редактировать</th> 
</tr> 
<?php 
if(!empty($_SESSION["shopping_cart"])) //empty — Проверяет, пуста ли переменная
{ 
$total = 0; 
foreach($_SESSION["shopping_cart"] as $keys => $values) 
  //Конструкция foreach предоставляет простой способ перебора массивов. Foreach работает только с массивами и объектами и будет генерировать ошибку при попытке использования с переменными других типов или неинициализированными переменными. 
{ 
?> 
<tr> 
<td><?php echo $values["prod_name"]; ?></td> 
<td><?php echo $values["kol"]; ?></td> 
<td><?php echo $values["price"]; ?>рублей</td> 
<td><?php echo number_format($values["kol"] * $values["price"], 2); ?>рублей</td> 
<td><a href="basket.php?action=delete&id=<?php echo $values["id_product"]; ?>"><span class="text-danger">Удалить</span></a></td> 
</tr> 
<?php 
$total = $total + ($values["kol"] * $values["price"]); 
} 
?> 
<tr> 
<td colspan="3" align="right">Всего</td> 
<td align="right"><?php echo number_format($total, 2); ?>рублей</td> 
<td></td> 
</tr> 
<?php 
} 
?> 
</table> 
</div> 
</div> 
<br /> 

<button type="button" ><a href="catalog.php">Каталог</a></button> 


<div id="checkout"> 
<div id="okno"> 
Ваш заказ зарегистрирован.В ближайшее время специалисты свяжутся с вами!
<br> 
<a href="#" class="close">Закрыть</a> 
</div> 
</div> 

<button type="button" ><a href="#checkout">Оформить заказ</a></button> 


</body> 
</html>

 