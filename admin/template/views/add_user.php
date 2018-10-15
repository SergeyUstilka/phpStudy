<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 12.10.2018
 * Time: 14:58
 */

?>
<div class="content pb-0">
    <h1 class="pb-2 display-4">Добавить нового пользователя</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body card-block">
                    <form action="?action=user_engine&action_type=add" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Имя</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Имя" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="email" placeholder="Email" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Пароль</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="pass" placeholder="Пароль" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">О себе</label></div>
                            <div class="col-12 col-md-9"><textarea name="biography" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="checkbox1" name="user_type" value="1" class="form-check-input">Права администратора
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