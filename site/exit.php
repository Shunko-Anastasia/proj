<?php
unset($_COOKIE['user_id']); //unset- удаляет перечисленные переменные.
unset($_COOKIE['username']);
setcookie('user_id', '', -1); //setcookie задает cookie, которое будет передано клиенту вместе с другими заголовками. Как и любой другой заголовок, cookie должны передаваться до того как будут выведены какие-либо другие данные скрипта
setcookie('username', '', -1);
$home_url = 'index.php';

 header('Location: ' . $home_url);
exit;