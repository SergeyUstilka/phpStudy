<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 12.10.2018
 * Time: 14:57
 */
$new_page_data = $_POST;
?>

<div class="content pb-0">

    <?php
    switch($_GET['action_type']){
        case 'add':
            echo addUser($connection, $new_page_data);
            break;
        case  'delete':
            echo deleteData($connection,'users', $_GET['delete_page_id']);
            break;
        case 'update':
            echo editUser($connection, $new_page_data);
            break;
        default:   echo 'Вы тут по ошибке';
            break;

    }
    ?>
</div>
