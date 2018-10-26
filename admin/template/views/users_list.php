<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 11.10.2018
 * Time: 16:05
 */

$users = getListInAdmin($connection, 'users');
?>


<div class="content pb-0">
    <h1 class="pb-2 display-4">Пользователи</h1></br>
    <a href="?action=add_user" class="btn btn-success">Добавить нового пользователя</a>
    <div class="row">
        <div class="col-md-12>
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Пользователи </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="avatar">Avatar</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach ($users as $user):?>
                            <tr>
                                <td class="avatar">
                                    <div class="round-img">
                                        <img class="rounded-circle" src="../upload/users/<?=$user['user_avatar']?>" alt="">
                                    </div>
                                </td>
                                <td><?=$user['id']?></td>
                                <td>  <span class="name"><?=$user['name']?></span> </td>
                                <td>  <span class="name"><?=$user['email']?></span> </td>
                                <td> <span class="product">
                                        <?php switch ($user['user_type']){
                                            case 1:
                                                $userType = 'Admin';
                                                break;
                                            case 0:
                                                $userType = 'Пользователь';
                                                break;
                                        }
                                        echo $userType;
                                        ?>
                                    </span>
                                </td>
                                <td><a href="?action=edit_user&id=<?=$user['id']?>" class="btn btn-primary">Edit</a><a href="<?="?action=user_engine&action_type=delete&delete_page_id=".$user['id']?>" class="btn btn-danger" style="margin-left: 15px">Delete</a></td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
</div>
