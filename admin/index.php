<?php

include '../config/config.php';
include '../include/functions.php';
//var_dump($_SESSION);
if ( $_SESSION['is_auth'] == 1){
    if (!empty($_GET['action']) && $_GET['action'] == 'logout'){
        $_SESSION = array();
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/">';
    }
    switch ($_SESSION['is_admin']){
        case 1:
            include  "template/layout.php";
            break;
        case 0:
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../">';
            break;
    }
}else{
    if(!empty($_GET['action']) && $_GET['action']== 'registration'){
        include 'template/views/registration.php';
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $user = login($connection, $_POST['email']);
        if($user){
           $userpass =  $_POST['password'];
//            var_dump( $userpass);
//            echo '<br>';
//            var_dump($user['pass']);
            if (md5($_POST['password']) == $user['pass']){
                $_SESSION['is_auth'] = 1;
                echo  'Совпали';
                if ($user['user_type'] == 1){
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