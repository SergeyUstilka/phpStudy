<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 06.10.2018
 * Time: 18:10
 */

?>
<div class="content pb-0">

        <?php
        switch($_GET['action_type']){
            case 'add':
                echo addNewCategory($connection);
                break;
            case  'delete':
                echo deleteCategory($connection, $_GET['delete_page_id']);
                break;
            case 'update':
                echo editCategory($connection);
                break;
            default:   echo 'Вы тут по ошибке';
                break;

        }
        ?>
</div>
