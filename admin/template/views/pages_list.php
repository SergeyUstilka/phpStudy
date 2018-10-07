<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 02.10.2018
 * Time: 20:55
 */

$pages = getListInAdmin($connection);
?>
<div class="content pb-0">
    <h1 class="pb-2 display-4">Статьи</h1></br>
    <a href="?action=add_page" class="btn btn-success">Add new page</a>
    </br>
    <div class="card-body" style="max-width: 900px;">
        <table class="table table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($pages as $page):?>
            <tr>
                <td><?=$page['id']?></td>
                <td><?=$page['name']?></td>
                <td><?=$page['active']?></td>
                <td><a href="?action=edit_page&id=<?=$page['id']?>" class="btn btn-primary">Edit</a><a href="<?="?action=page_engine&action_type=delete&delete_page_id=".$page['id']?>" class="btn btn-danger" style="margin-left: 15px">Delete</a></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>