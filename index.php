<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    body{
        max-width: 500px;
        margin: 0 auto;
    }
    form{
        width: 500px;
    }
    label{
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }
    input{
        width: 100%;
        border-radius: 4px;
        padding: 10px;
        box-sizing: border-box;
    }
    textarea{
        width:100%;
    }
</style>
<h1>Программа для обрезки текста</h1>
<div>
    <h2></h2>
    <form action="#" method="post">
        <label for="">
            <input type="text" name="text_length" placeholder="Количество символов, например 40">
        </label>
        <label for="">
            <textarea name="text" id="" rows="20">I contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.3
            </textarea>
        </label>
        <input type="submit" value="Отправить">
    </form>
</div>
<p>
<?php
$reg_exp = "/^[0-9]{1,3}$/";
$match = [];
 ;
if (preg_match($reg_exp, $_POST['text_length'],$match)){
    $str = $_POST['text'];
    $text_length = $match[0];
    $substr = substr($str, 0, $text_length);// Poluchili obrezannuu no neobrabotannuu stroku

    echo "<h3>На <b>$text_length</b> символов обрезаем текст:</h3> </br> '".$str."'";
    echo '</br></br>';
    $a = strlen(strrchr($substr, ' '));
    echo "<h3>Получаем:</h3> </br>".$lastsubst = substr($substr,  0 , strlen($substr) -  $a)." ...";
}else{
    echo '<h2>Введите число от 10 до 999 в первое поле</h2>';
}
?>
</p>
</body>
</html>



