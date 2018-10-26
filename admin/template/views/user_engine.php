<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 12.10.2018
 * Time: 14:57
 */
$new_page_data = $_POST;
$files = $_FILES;

?>

<div class="content pb-0">

    <?php
    switch($_GET['action_type']){
        case 'add':
            $addData = addUser($connection, $new_page_data,$files);
            echo '<h1 class="pb-2 display-4">Вы добавили нового пользователя </h1><div class="card"><h2 class="card-header">'.$addData['name'].'</h2><div class="card-body"><p class="typo-articles"> Email:'.$addData['email'].'</p><a class="btn btn-primary btn-sm" href="?action=users_list" style="margin: 30px 0">Вернуться к списку пользователей</a></div></div>';
            break;
        case  'delete':
            echo deleteData($connection,'users', $_GET['delete_page_id']);
            break;
        case 'update':
            $addData = editUser($connection, $new_page_data,$files);
            if ($addData['name']){
                echo '<h1 class="pb-2 display-4">Информация о пользователе успешно изменена </h1><a class="btn btn-primary btn-sm" href="?action=users_list">Вернуться к списку пользователей</a></div></div>';

            }
            break;
        default:   echo 'Вы тут по ошибке';
            break;

    }
    ?>
</div>
