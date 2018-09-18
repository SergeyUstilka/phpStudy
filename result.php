<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 17.09.2018
 * Time: 11:22
 */


echo "<pre>";
$a = $_POST;
$L = 6.28/12;
if (is_numeric($a[chislo])){
    echo 'Ввели число '.$a[chislo].'</br>';
//    for ($i=0; $i< strlen($a[chislo]); $i++){
//        $sum+=$a[chislo][$i];
//    }
//    echo "</br>Cумма цифр числа $a[chislo] = $sum";
$l=(3.14*1*intval($a[chislo]))/180;
$x = $l/$L;
echo "Сейчас $x часов";
}
else{
    echo 'Вы ввели строку';
}
echo "</pre>";

?>

<a href="index.php">Назад</a>
