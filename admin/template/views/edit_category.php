<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 03.10.2018
 * Time: 19:35
 */

$page = getCategory($connection,$_GET['id']);
?>
<div class="content pb-0">
    <h1 class="pb-2 display-4">Редактирование статьи</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body card-block">
                    <form action="?action=category_engine&action_type=update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Название</label></div>
                            <div class="col-12 col-md-9"><input value="<?=$page['name']?>" type="text" id="text-input" name="pageName" placeholder="Text" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Содержание</label></div>
                            <div class="col-12 col-md-9"><textarea name="pageContent" id="textarea-input" rows="9" placeholder="Content..." class="form-control"><?=$page['content']?></textarea></div>
                        </div>
                        <input type="text" name="updateId" value="<?=$_GET['id']?>" style="display: none">
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Сохранить</button><a href="?action=pages_list" class="btn btn-danger btn-sm" style="margin-left: 30px">Отмена</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'pageContent' );
</script>