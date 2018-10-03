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

function getList($connection){
    $sql = "SELECT * from pages";
    $res= mysqli_query($connection, $sql);
   return  $pages = mysqli_fetch_all($res,1);
}

function addNewPage($connection, $new_page_data){
//    print_r($_GET['type']);
    $sql = " INSERT INTO `pages` (`id`, `name`, `content`, `active`) VALUES (NULL, '".$new_page_data['pageName']."', '".$new_page_data['pageContent']."', '0')";
    $res = mysqli_query($connection, $sql);

    if($res){
        return '<h1 class="pb-2 display-4">Вы добавили новую статью </h1><div class="card"><h2 class="card-header">'.$new_page_data['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$new_page_data['pageContent'].'</p><a class="btn btn-primary btn-sm" href="?action=pages_list" style="margin: 30px 0">Вернуться к списку статей</a></div></div>';
    }else{
        return 'Ошибка при добавлении';
    }
}

function deletePage($connection, $pageId){
    $sql = "DELETE FROM `pages` WHERE `pages`.`id` =".$pageId;
    $res = mysqli_query($connection, $sql);
    return '<h1 class="pb-2 display-4">Вы удали статью c id = '.$pageId.'</h1><a class="btn btn-primary btn-sm" href="?action=pages_list" style="margin: 30px 0">Вернуться к списку статей</a>';
}

function editPage($connection,$new_page_data){
    $sql = "UPDATE `pages` SET `name` = '".$new_page_data['pageName']."', `content` = '".$new_page_data['pageContent']."' WHERE `pages`.`id` = ".$new_page_data['updateId'].";";
    $res = mysqli_query($connection, $sql);
    return '<h1 class="pb-2 display-4">Вы добавили новую статью </h1><div class="card"><h2 class="card-header">'.$new_page_data['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$new_page_data['pageContent'].'</p><a class="btn btn-primary btn-sm" href="?action=pages_list" style="margin: 30px 0">Вернуться к списку статей</a></div></div>';
}