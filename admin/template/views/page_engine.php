<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 02.10.2018
 * Time: 21:32
 */

$new_page_data = $_POST;
?>

<div class="content pb-0">

        <?php
        switch($_GET['action_type']){
            case 'add':
                echo addNewPage($connection);
                break;
            case  'delete':
                echo deletePage($connection, $_GET['delete_page_id']);
                break;
            case 'update':
                echo editPage($connection);
                break;
            default:   echo 'Вы тут по ошибке';
                break;

        }
        ?>
</div>
