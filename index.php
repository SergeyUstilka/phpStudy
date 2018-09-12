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