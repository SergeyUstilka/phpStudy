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

//Funcii dlia opredelenia i napolnenia stranici


function getPage($connection,$id){
    $sql = "SELECT * from pages where id= $id";
    $res = mysqli_query($connection, $sql);
    return $pages =  mysqli_fetch_assoc($res);
}

function getList($connection,  $limit = 3, $pageNumber =1){
    $pageNumber = $limit*(--$pageNumber);
    $sql = "SELECT * from pages where active = 1 LIMIT $pageNumber, $limit ";
    $res= mysqli_query($connection, $sql);
   return  $pages = mysqli_fetch_all($res,1);
}
function getListInAdmin($connection){
    $sql = "SELECT * from pages";
    $res= mysqli_query($connection, $sql);
    return  $pages = mysqli_fetch_all($res,1);
}

function addNewPage($connection){
    $sql = " INSERT INTO `pages` ( `name`,`active`, `content` ) VALUES ('{$_POST['pageName']}', '{$_POST['active']}', '{$_POST['pageContent']}')";
    $res = mysqli_query($connection, $sql);

    if($res){
        if($_POST['active'] == 1){
            $activeStatus = '<p style="color:green;">Доступна пользователю</p>';
        }else{
            $activeStatus = '<p style="color:red;">Не доступна пользователю</p>';
        }
        return '<h1 class="pb-2 display-4">Вы добавили новую статью </h1><div class="card"><h2 class="card-header">'.$_POST['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$_POST['pageContent'].'</p>'.$activeStatus.'<a class="btn btn-primary btn-sm" href="?action=pages_list" style="margin: 30px 0">Вернуться к списку статей</a></div></div>';
    }else{
        return 'Ошибка при добавлении';
    }
}

function deletePage($connection, $pageId){
    $sql = "DELETE FROM `pages` WHERE `pages`.`id` =".$pageId;
    $res = mysqli_query($connection, $sql);
    return '<h1 class="pb-2 display-4">Вы удали статью c id = '.$pageId.'</h1><a class="btn btn-primary btn-sm" href="?action=pages_list" style="margin: 30px 0">Вернуться к списку статей</a>';
}

function editPage($connection){
    $sql = "UPDATE `pages` SET `name` = '".$_POST['pageName']."', `content` = '".$_POST['pageContent']."', `active` = '".$_POST['active']."' WHERE `pages`.`id` = ".$_POST['updateId'].";";
    $res = mysqli_query($connection, $sql);
    if($_POST['active'] == 1){
        $activeStatus = '<p style="color:green;">Доступна пользователю</p>';
    }else{
        $activeStatus = '<p style="color:red;">Не доступна пользователю</p>';
    }
    return '<h1 class="pb-2 display-4">Статья успешно изменена </h1><div class="card"><h2 class="card-header">'.$_POST['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$_POST['pageContent'].'</p>'.$activeStatus.'<a class="btn btn-primary btn-sm" href="?action=pages_list" style="margin: 30px 0">Вернуться к списку статей</a></div></div>';
}

//   Pagination functions
function getCountPages($connection){
    $sql = "SELECT count(*) from pages where active = 1";
    $res= mysqli_query($connection, $sql);
    return  (mysqli_fetch_row($res)[0]);

}

//          Category functions
function getCategoryList($connection){
    $sql = "SELECT * from category";
    $res = mysqli_query($connection, $sql);
    return mysqli_fetch_all($res, 1);
}

function getCategory($connection,$id){
    $sql = "SELECT * from category where id= $id";
    $res = mysqli_query($connection, $sql);
    return $pages =  mysqli_fetch_assoc($res);
}

function addNewCategory($connection){
    $sql = " INSERT INTO `category` ( `name`, `content` ) VALUES ('{$_POST['pageName']}', '{$_POST['pageContent']}')";
    $res = mysqli_query($connection, $sql);

    if($res){
         return '<h1 class="pb-2 display-4">Вы добавили новую категорию </h1><div class="card"><h2 class="card-header">'.$_POST['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$_POST['pageContent'].'<a class="btn btn-primary btn-sm" href="?action=category_list" style="margin: 30px 0">Вернуться к списку категорий</a></div></div>';
    }else{
        return 'Ошибка при добавлении';
    }
}

function editCategory($connection){
    $sql = "UPDATE `category` SET `name` = '".$_POST['pageName']."', `content` = '".$_POST['pageContent']."' WHERE `category`.`id` = ".$_POST['updateId'].";";
    $res = mysqli_query($connection, $sql);
    return '<h1 class="pb-2 display-4">Категория успешно изменена </h1><div class="card"><h2 class="card-header">'.$_POST['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$_POST['pageContent'].'</p><a class="btn btn-primary btn-sm" href="?action=category_list" style="margin: 30px 0">Вернуться к списку категорий</a></div></div>';
}

function deleteCategory($connection, $pageId){
    $sql = "DELETE FROM `category` WHERE `category`.`id` =".$pageId;
    $res = mysqli_query($connection, $sql);
    return '<h1 class="pb-2 display-4">Вы удали категорию c id = '.$pageId.'</h1><a class="btn btn-primary btn-sm" href="?action=category_list" style="margin: 30px 0">Вернуться к списку категорий</a>';
}
