<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 11.10.2018
 * Time: 20:42
 */
//
//if ($_SERVER['REQUEST_URI'] == '/' || !empty($_GET['pag'])){
//    $pagetype ='main';
//}elseif(parse_url($_SERVER['REQUEST_URI'])['path'] == '/single'){
//    $pagetype = 'single';
//}else{
//    $pagetype= $_SERVER['REQUEST_URI'];
//}

//print_r(explode('/',parse_url($_SERVER['REQUEST_URI'])[path])[1]);
if($_SERVER['REQUEST_URI'] == '/'){
    $pagetype='main';
}else{
    $section = explode('/',parse_url($_SERVER['REQUEST_URI'])[path])[1];

   switch ($section){
       case 'single':
            $pagetype= 'single';
                break;
       default:
           $pagetype= '404';
                break;

   }
}
