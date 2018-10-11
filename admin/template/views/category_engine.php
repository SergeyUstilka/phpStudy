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
                echo addNewData($connection, $new_page_data, $tableName);
                break;
            case  'delete':
                echo deleteData($connection,$tableName, $_GET['delete_page_id']);
                break;
            case 'update':
                echo editData($connection, $new_page_data, $tableName);
                break;
            default:   echo 'Вы тут по ошибке';
                break;

        }
        ?>
</div>
