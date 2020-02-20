<?php

session_start();

ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);// это две строчки пишут нам наши оштбки, вмето того чтобы в ини файле менять настройки

require_once __DIR__ . '/../vendor/autoload.php';

// клиентские запросы перенаправляются на данную страницу (настройки сервера .htaccess файл)
// вормируется объект Request - в свойства объекта записываются значения суперглобальных массивов get / post / server и тд, устанавливается метод запроса и request_uri
$request = new \Anastasia\Trip\Core\Request();

// в переменную $config сохраняется имя файла с конфигурацией проекта (допустимые url и настройки подключения к бд)
$config = __DIR__ . '/../config.json';

// вормируется объект Application, в конструктор передается имя файла с настройками
$app = new \Anastasia\Trip\Core\Application($config);
// вызывается метод handleRequest, который принимает ранее созданный (на 6 строке) объект Request
// метод handleRequest возвращает объект Response (объект формируется на основе запрпоса)
$response = $app->handleRequest($request);
// вызывается метод send - отправка ответа клиенту (echo ... )
$response->send();

