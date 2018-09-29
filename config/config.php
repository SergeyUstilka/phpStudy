<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 25.09.2018
 * Time: 20:43
 */

define('DB_HOST','localhost');
define('DB_NAME','test');
define('DB_USER','test_user');
define('DB_USER_PASS','sg2008');

$connection =  mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS,DB_NAME);


// Проверка на подключение к базе данных

if (!$connection){
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    die();
}
