<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 02.10.2018
 * Time: 20:42
 */


$view = $_GET['action'];

if (!isset($_GET['action'])){
    $view ='main';
}
if (file_exists('template/views/'.$view.'.php')){
    include 'template/views/'.$view.'.php';
}
