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
        if($_GET['action_type'] == 'add'){
            echo addNewPage($connection, $new_page_data);
        }elseif ($_GET['action_type'] == 'delete'){
            echo deletePage($connection, $_GET['delete_page_id']);
        }elseif ($_GET['action_type'] = 'update'){
           echo editPage($connection,$new_page_data);
        }else{
            echo 'Вы тут по ошибке';
        }
        ?>
    </h1>
</div>
