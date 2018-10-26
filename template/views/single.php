<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 29.09.2018
 * Time: 13:39
 */

$page =  getData($connection, $_GET['id'], 'pages');

?>

<div class="single">
    <div class="container">
        <div class="col-md-8 single-main">
            <div class="single-grid">
                <img src="/upload/pages/<?=$page['frontImg']?>" style="max-width: 300px" alt=""/>
                <h1><?=$page['name']?></h1>
                <p><?=$page['content']?></p>
            </div>
            <ul class="comment-list">
                <h5 class="post-author_head">Written by <a href="#" title="Posts by admin" rel="author">admin</a></h5>
                <li><img src="/images/avatar.png" class="img-responsive" alt="">
                    <div class="desc">
                        <p>View all posts by: <a href="#" title="Posts by admin" rel="author">admin</a></p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
</div>
