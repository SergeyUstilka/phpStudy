<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 02.10.2018
 * Time: 20:53
 */

//echo '<pre>';
//print_r(getCategoryList($connection));
//echo '</pre>';

$pages = getListInAdmin($connection, 'category');

?>
<div class="content pb-0">
    <h1 class="pb-2 display-4">Категории</h1></br>
    <a href="?action=add_category" class="btn btn-success">Add new category</a>
    </br>
    <div class="card-body" style="max-width: 900px;">
        <table class="table table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($pages as $page):?>
                <tr>
                    <td><?=$page['id']?></td>
                    <td><?=$page['name']?></td>
                    <td><?=$page['active']?></td>
                    <td><a href="?action=edit_category&id=<?=$page['id']?>" class="btn btn-primary">Edit</a><a href="<?="?action=category_engine&action_type=delete&delete_page_id=".$page['id']?>" class="btn btn-danger" style="margin-left: 15px">Delete</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>