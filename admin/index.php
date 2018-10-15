<?php



session_start();

//$user_pass =  password_hash(123, 1);
//echo $user_pass;
//echo "<br>";
//if (password_verify(123, $user_pass)){
//    echo 'правильный пароль';
//}else{
//    echo 'неправильный пароль';
//}

include '../config/config.php';
include '../include/functions.php';
if ($_GET['action'] == 'logout'){
    $_SESSION = array();
}
if ($_SESSION['is_auth'] && $_SESSION['is_admin'] == 1){
    include  "template/layout.php";
}
else{
    if ($_GET['action']== 'registration'){

    }
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