<?php

include_once (__DIR__."/config/config.php");

if ($_SERVER['REQUEST_URI'] == '/' || !empty($_GET['pag'])){
    $pagetype ='main';
}elseif(parse_url($_SERVER['REQUEST_URI'])['path'] == '/single'){
    $pagetype = 'single';
}else{
    $pagetype= $_SERVER['REQUEST_URI'];
}
include_once (__DIR__."/include/functions.php");
include_once (__DIR__."/template/layout.php");
?>



