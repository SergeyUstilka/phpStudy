<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 02.10.2018
 * Time: 20:35
 */
?>

<div class="content pb-0">
    <h1 class="pb-2 display-4">Добавить новую статью</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body card-block">
                    <form action="?action=page_engine&action_type=add" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Название</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="pageName" placeholder="Text" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Содержание</label></div>
                            <div class="col-12 col-md-9"><textarea name="pageContent" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="checkbox1" name="active" value="1" class="form-check-input">Активна
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
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