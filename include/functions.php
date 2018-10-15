<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 27.09.2018
 * Time: 20:03
 */


//Funcia dlia ibrezki teksta anonsa statii
function cutText($text, $textLength){
    $substr = substr($text, 0, $textLength);
    $a = strlen(strrchr($substr, ' '));
    return $lastsubst = substr($substr,  0 , strlen($substr) -  $a)."...";
}

//Funcii dlia opredelenia i napolnenia statei/categorii


function getData($connection,$id, $tableName){
    $sql = "SELECT * from $tableName where id= $id";
    $res = mysqli_query($connection, $sql);
    return $pages =  mysqli_fetch_assoc($res);
}

function getList($connection,  $limit = 3, $pageNumber =1){
    $pageNumber = $limit*(--$pageNumber);
    $sql = "SELECT * from pages where active = 1 LIMIT $pageNumber, $limit ";
    $res= mysqli_query($connection, $sql);
   return  $pages = mysqli_fetch_all($res,1);
}
function getListInAdmin($connection, $tableName){
    $sql = "SELECT * from  $tableName";
    $res= mysqli_query($connection, $sql);
    return  $pages = mysqli_fetch_all($res,1);
}

function addNewData($connection, $pageInfo, $tableName){
    $sql = " INSERT INTO $tableName( `name`,`active`, `content` ) VALUES ('{$pageInfo['pageName']}', '{$pageInfo['active']}', '{$pageInfo['pageContent']}')";
    $res = mysqli_query($connection, $sql);

    if($res){
        if($pageInfo['active'] == 1){
            $activeStatus = '<p style="color:green;">Доступно пользователю</p>';
        }else{
            $activeStatus = '<p style="color:red;">Не доступно пользователю</p>';
        }
    }
    return '<h1 class="pb-2 display-4">Вы добавили новые данные  в таблицу '.$tableName.' </h1><div class="card"><h2 class="card-header">'.$pageInfo['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$pageInfo['pageContent'].'</p>'.$activeStatus.'<a class="btn btn-primary btn-sm" href="?action='.$tableName.'_list" style="margin: 30px 0">Вернуться к списку</a></div></div>';
}

function deleteData($connection, $tableName, $pageId){
    $sql = "DELETE FROM $tableName WHERE  `id` =".$pageId;
    $res = mysqli_query($connection, $sql);
    return '<h1 class="pb-2 display-4">Вы удали данные из таблицы '.$tableName.' c id = '.$pageId.'</h1><a class="btn btn-primary btn-sm" href="?action='.$tableName.'_list" style="margin: 30px 0">Вернуться к списку </a>';
}

function editData($connection, $pageInfo, $tableName){
    $sql = "UPDATE $tableName SET `name` = '".$pageInfo['pageName']."', `content` = '".$pageInfo['pageContent']."', `active` = '".$pageInfo['active']."' WHERE `id` = ".$pageInfo['updateId'].";";
    $res = mysqli_query($connection, $sql);
    if($pageInfo['active'] == 1){
        $activeStatus = '<p style="color:green;">Доступна пользователю</p>';
    }else{
        $activeStatus = '<p style="color:red;">Не доступна пользователю</p>';
    }
    return '<h1 class="pb-2 display-4">Данные в таблице '.$tableName.' успешно изменены </h1><div class="card"><h2 class="card-header">'.$pageInfo['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$pageInfo['pageContent'].'</p>'.$activeStatus.'<a class="btn btn-primary btn-sm" href="?action='.$tableName.'_list" style="margin: 30px 0">Вернуться к списку</a></div></div>';
}

//   Pagination functions
function getCountPages($connection, $tableName){
    $sql = "SELECT count(*) from $tableName where active = 1";
    $res= mysqli_query($connection, $sql);
    return  (mysqli_fetch_row($res)[0]);

}


function debug($arr){
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}
// Function for autorization
function login($connection, $mail){
    $sql = "select * from users where email = '$mail'";
    $res = mysqli_query($connection, $sql);
    return  mysqli_fetch_assoc($res);
}


// Functions for work with users

function addUser($connection, $addData){
    $sql = "INSERT INTO `users`(`name`, `email`, `pass`, `biography`, `user_type`) VALUES ('{$addData['name']}', '{$addData['email']}', '".password_hash($addData['pass'],1)."',  '{$addData['biography']}',  '{$addData['user_type']}');";
    $res = mysqli_query($connection, $sql);
    return '<h1 class="pb-2 display-4">Вы добавили нового пользователя </h1><div class="card"><h2 class="card-header">'.$addData['name'].'</h2><div class="card-body"><p class="typo-articles"> Email:'.$addData['email'].'</p><a class="btn btn-primary btn-sm" href="?action=users_list" style="margin: 30px 0">Вернуться к списку пользователей</a></div></div>';
}

function editUser($connection, $addData){
    $sql = "UPDATE users SET `name` = '".$addData['name']."', `email` = '".$addData['email']."', `pass` = '".password_hash($addData['pass'],1)."', `biography` = '".$addData['biography']."', `user_type` = '".$addData['user_type']."' WHERE `id` = ".$addData['updateId'].";";
    $res = mysqli_query($connection, $sql);
    if($res){

        return '<h1 class="pb-2 display-4">Информация о пользователе успешно изменена </h1><a class="btn btn-primary btn-sm" href="?action=users_list">Вернуться к списку пользователей</a></div></div>';
    }

}