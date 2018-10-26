<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 06.10.2018
 * Time: 18:10
 */
$new_page_data = $_POST;
$tableName = 'category';
?>
<div class="content pb-0">

        <?php
        switch($_GET['action_type']){
            case 'add':
                $addData = addNewData($connection, $new_page_data, $tableName);
                if($addData['active'] == 1){
                    $activeStatus = '<p style="color:green;">Доступно пользователю</p>';
                }else{
                    $activeStatus = '<p style="color:red;">Не доступно пользователю</p>';
                }
                echo '<h1 class="pb-2 display-4">Вы добавили новые данные  в таблицу '.$tableName.' </h1><div class="card"><h2 class="card-header">'.$addData['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$addData['pageContent'].'</p>'.$activeStatus.'<a class="btn btn-primary btn-sm" href="?action='.$tableName.'_list" style="margin: 30px 0">Вернуться к списку</a></div></div>';
                break;
            case  'delete':
                echo deleteData($connection,$tableName, $_GET['delete_page_id']);
                break;
            case 'update':
                $addData = editData($connection, $new_page_data, $tableName);
                if($addData['active'] == 1){
                    $activeStatus = '<p style="color:green;">Доступно пользователю</p>';
                }else{
                    $activeStatus = '<p style="color:red;">Не доступно пользователю</p>';
                }
                echo '<h1 class="pb-2 display-4">Данные в таблице '.$tableName.' успешно изменены </h1><div class="card"><h2 class="card-header">'.$pageInfo['pageName'].'</h2><div class="card-body"><p class="typo-articles">'.$pageInfo['pageContent'].'</p>'.$activeStatus.'<a class="btn btn-primary btn-sm" href="?action='.$tableName.'_list" style="margin: 30px 0">Вернуться к списку</a></div></div>';
                break;
            default:   echo 'Вы тут по ошибке';
                break;

        }
        ?>
</div>
