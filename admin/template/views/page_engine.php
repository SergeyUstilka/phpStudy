<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 02.10.2018
 * Time: 21:32
 */

$new_page_data = $_POST;
$tableName = 'pages';
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
