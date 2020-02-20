<?php  if (isset($result)): ?>
    <p><?php echo $result; ?></p>
<?php endif; ?>
<h3>Заполните форму регистрации</h3>
<form method="post" action="/registration">
    <div class="form-group">
        <label for="login">Введите логин</label>
        <input name="login" type="text" class="form-control" id="login"  placeholder="логин">
    </div>
    <div class="form-group">
        <label for="password">Введите пароль</label>
        <input name="password" type="text" class="form-control" id="password"  placeholder="пароль">
    </div>
    <div class="form-group">
        <label for="address">Введите адрес</label>
        <input name="address" type="text" class="form-control" id="address"  placeholder="адрес">
    </div>
    <div class="form-group">
        <label for="phone">Введите телефон</label>
        <input name="phone" type="tel"  class="form-control" id="phone"  placeholder="телефон">
    </div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</form>