<?php

include '../config/config.php';
include '../include/functions.php';

if (!empty($_GET['action']) && $_GET['action'] == 'logout'){
    $_SESSION = array();
}
if ( !empty($_SESSION['is_auth']) && $_SESSION['is_admin'] == 1){
    include  "template/layout.php";
}
else{
//    if (!empty($_GET['action']) && $_GET['action']== 'registration'){
//
//    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = login($connection, $_POST['email']);
        if($user){
            if (password_verify( $_POST['password'],$user['pass'])){
                $_SESSION['is_auth'] = 1;
                if ($user['user_type'] == '1'){
                    $_SESSION['is_admin'] = 1;
                    $_SESSION['userName'] = $user['name'];
                    $_SESSION['userMail'] = $user['email'];
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin">';
                }else{
                    $_SESSION['is_admin'] = 0;
                    $_SESSION['userName'] = $user['name'];
                    $_SESSION['userMail'] = $user['email'];
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../">';
                }
            }
        }
    }
    include 'template/views/login.php';
}
?>