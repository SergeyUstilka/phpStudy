<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 06.09.2018
 * Time: 20:02
 */


$a = 2;
$b = -4;
$c = -3;
echo "Даны числа:<b> $a  $b $c  </b></br>";
// даны три числа - вывести кол-во положительных и отрицательных
$otr = 0;
$pol = 0;
if ($a > 0 and $a!= 0) {
    $pol++;
} else {
    $otr++;
}
if ($b > 0 and $b != 0 ) {
    $pol++;
} else {
    $otr++;
}
if ($c > 0 and $c != 0) {
    $pol++;
} else {
    $otr++;
}
echo "Количество положительных: $pol  </br> Количество отрицательных: $otr  </br>";

//даны три числа - вывести кол-во четных и нечетных
$chet = 0;
$nechet = 0;
if ($a % 2 == 0) {
    $chet++;
} else {
    $nechet++;
}
if ($b % 2 == 0) {
    $chet++;
} else {
    $nechet++;
}
if ($c % 2 == 0) {
    $chet++;
} else {
    $nechet++;
}
echo "Количество четных: $chet </br> Количество нечетных: $nechet  </br>";
//даны три числа - вывести кол-во четных и нечетных
$chet = 0;
$nechet = 0;
if ($a % 2 == 0) {
    $chet++;
} else {
    $nechet++;
}
if ($b % 2 == 0) {
    $chet++;
} else {
    $nechet++;
}
if ($c % 2 == 0) {
    $chet++;
} else {
    $nechet++;
}
echo "Количество четных: $chet </br> Количество нечетных: $nechet  </br>";


//даны три числа - вывести среднее
$mas = [2,-4,-3];
$min = $mas[0];
$max = $mas[0];
for ($i=1;$i<3; $i++){
    if($mas[$i] > $max){
        $max = $mas[$i];
    }
    elseif($mas[$i] < $min){
        $min = $mas[$i];
    }
}
for($i=0;$i<3; $i++){
    if ($mas[$i] != $max  and $mas[$i] != $min){
        echo "Среднее число $mas[$i]";
        break;
    }
}