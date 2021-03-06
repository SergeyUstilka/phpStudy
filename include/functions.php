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
    $newID = (int)$id;
    if (isset($id)){
        $sql = "SELECT * from $tableName where id= $newID";
        $res = mysqli_query($connection, $sql);
        return $pages =  mysqli_fetch_assoc($res);
    }
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

function addNewData($connection, $addData, $tableName, $files){
    if(strlen($files['image']['name'])> 0){
        move_uploaded_file($files['image']['tmp_name'], '../upload/pages/'.$files['image']['name']);
    }
    else{
        $files['image']['name'] = 'no-img.png';
    }
    $sql = " INSERT INTO $tableName( `name`,`active`, `content`, `frontImg` ) VALUES (?,?,?,?)";
    if(!$stmt = mysqli_prepare($connection,$sql)){
        return false;
    }
    mysqli_stmt_bind_param($stmt, "siss", $addData['pageName'],$addData['active'], $addData['pageContent'],$files['image']['name']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $addData;
}

function deleteData($connection, $tableName, $pageId){
    $sql = "DELETE FROM $tableName WHERE  `id` =?";
    if(!$stmt = mysqli_prepare($connection,$sql)){
        return false;
    }
    mysqli_stmt_bind_param($stmt, "i",$pageId );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return '<h1 class="pb-2 display-4">Вы удали данные из таблицы '.$tableName.' c id = '.$pageId.'</h1><a class="btn btn-primary btn-sm" href="?action='.$tableName.'_list" style="margin: 30px 0">Вернуться к списку </a>';
}

function editData($connection, $addData, $tableName, $files){
    if(strlen($files['image']['name'])>0){
        move_uploaded_file($files['image']['tmp_name'], '../upload/pages/'.$files['image']['name']);
        $sql = "UPDATE $tableName SET `name` = ?, `content` = ?, `active` = ?, `frontImg` = ?  WHERE `id` =?;";
        if(!$stmt = mysqli_prepare($connection,$sql)){
            return false;
        }
        mysqli_stmt_bind_param($stmt, "ssisi", $addData['pageName'],$addData['pageContent'],$addData['active'],$files['image']['name'], $addData['updateId']);
    }else {
        $sql = "UPDATE $tableName SET `name` = ?, `content` = ?, `active` = ? WHERE `id` =?;";
        if(!$stmt = mysqli_prepare($connection,$sql)){
            return false;
        }
        mysqli_stmt_bind_param($stmt, "ssii", $addData['pageName'],$addData['pageContent'],$addData['active'], $addData['updateId']);
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $addData;
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
//    if($stmt = mysqli_prepare($connection, "SELECT  id FROM `users` WHERE `email`=?")){
//        mysqli_stmt_bind_param($stmt, "s", $mail);
//        mysqli_stmt_execute($stmt);
//        mysqli_stmt_bind_result($stmt, $res);
//        mysqli_stmt_fetch($stmt);
//    }
//    $sql = "SELECT * FROM `users` WHERE `id` = ";
//    $res1 = mysqli_query($connection, $sql);
//    var_dump($res1);
//    return  mysqli_fetch_assoc($res);
}


// Functions for work with users

function addUser($connection, $addData,$files = NULL){
    if(strlen($files['image']['name'])> 0){
        move_uploaded_file($files['image']['tmp_name'], '../upload/users/'.$files['image']['name']);
    }
    else{
        $files['image']['name'] = 'no-img.png';
    }
    if($addData['user_type'] == NULL){
        $addData['user_type'] =0;
    }
    if ($addData['biography'] == NULL){
        $addData['biography'] = 'Данные о пользователи отсутствуют';
    }
    $mailsql = "SELECT email FROM `users`";
    $mailres = mysqli_query($connection, $mailsql);
    $allUsersMails = mysqli_fetch_all($mailres);
    foreach ($allUsersMails as $value){
        if($value[0] == $addData['email']){
            $addData['allert'] = 'Пользователь с таким email  уже существует';
            return $addData;
        }
    }
    $sql = "INSERT INTO `users`(`name`, `email`, `pass`, `biography`, `user_type`,`user_avatar`) VALUES (?,?,?,?,?,?);";
    if(!$stmt = mysqli_prepare($connection,$sql)){
        return false;
    }
    $pass = md5($addData['password']);
    mysqli_stmt_bind_param($stmt, "ssssis", $addData['name'],$addData['email'], $pass,$addData['biography'], $addData['user_type'],$files['image']['name'] );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $addData['success'] = 'Вы успешно зарегистрированы <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../"> ';
    return $addData;
}

function editUser($connection, $addData,$files){
    if(strlen($files['image']['name'])>0){
        move_uploaded_file($files['image']['tmp_name'], '../upload/users/'.$files['image']['name']);
        $sql = "UPDATE users SET `name` = ?, `email` = ?, `user_type` = ?, `biography` = ?, `user_avatar` = ?  WHERE `id` =?;";
        if(!$stmt = mysqli_prepare($connection,$sql)){
            return false;
        }
        mysqli_stmt_bind_param($stmt, "sssisi", $addData['name'],$addData['email'],$addData['biography'], $addData['user_type'],$files['image']['name'],$addData['updateId']);

    }else{
        $sql = "UPDATE users SET `name` = ?, `email` = ?,  `user_type` = ?, `biography` = ?  WHERE `id` =?;";
        if(!$stmt = mysqli_prepare($connection,$sql)){
            return false;
        }
        mysqli_stmt_bind_param($stmt, "sssii", $addData['name'],$addData['email'],$addData['biography'], $addData['user_type'],$addData['updateId']);

    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $addData;

}