<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 06.09.2018
 * Time: 20:02
 */

$a = 2;
$b = 4;
$c = -3;

echo "Даны числа:<b> $a  $b $c  </b></br>";
// даны три числа - вывести кол-во положительных и отрицательных
$otr= 0;
$pol = 0;

if ($a >0){$pol++;}else{$otr++;}
if ($b >0){$pol++;}else{$otr++;}
if ($c >0){$pol++;}else{$otr++;}
echo "Количество положительных: $pol  </br> Количество отрицательных: $otr  </br>";

//даны три числа - вывести кол-во четных и нечетных
$chet = 0;
$nechet = 0;

if ($a%2 ==0){$chet++;}else{$nechet++;}
if ($b%2 ==0){$chet++;}else{$nechet++;}
if ($c%2 ==0){$chet++;}else{$nechet++;}

echo "Количество четных: $chet </br> Количество нечетных: $nechet  </br>";

//даны три числа - вывести среднее

$middle = ($a +$b + $c)/3;

echo "Среднее: $middle";

