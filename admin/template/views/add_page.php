<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 02.10.2018
 * Time: 20:35
 */
?>
<div class="content pb-0">
    <h1 class="pb-2 display-4">Add new page</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Basic Form</strong> Elements
                </div>
                <div class="card-body card-block">
                    <form action="?action=page_engine&action_type=add" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="pageName" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Content</label></div>
                            <div class="col-12 col-md-9"><textarea name="pageContent" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                        </div>
                        <input type="hidden" name="add">
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

