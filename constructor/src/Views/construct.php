<!-- <? 
$sql = "SELECT * FROM `travel`"; // Подключение к таблице товаров из бд 
$result = mysqli_query($connect,$sql); 
echo "<h2>Путешествия:</h2>"; 

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
?>  -->