<?php
//
function sieve($n)
{
    $S = [];
    $S[1] = 0; // 1 - не простое число
    // заполняем решето единицами
    for ($k = 2; $k <= $n; $k++)
        $S[$k] = 1;

    for ($k = 2; $k * $k <= $n; $k++) {
        // если k - простое (не вычеркнуто)
        if ($S[$k] == 1) {
            // то вычеркнем кратные k
            for ($l = $k * $k; $l <= $n; $l += $k) {
                $S[$l] = 0;
            }
        }
    }
    return $S;
}

echo '<pre>';
$a = sieve(99999);
$arr = [];
$iii = 1;
foreach ($a as $number => $value) {

    if ($number > 10000 && $value == 1) {
        array_push($arr, $number);
    }
}
//print_r($arr);
// Нашли все простые числа в диапазоне от 10 000 до 99 999

$arr3 = [];
for ($i = 0; $i < count($arr); $i++) {
    for ($j = $i + 1; $j < count($arr); $j++) {
        $b = strval($arr[$i] * $arr[$j]);
        $l = strlen($b);
// перемножаем числа и паралельно проверяем их
        if ($l % 2 != 0) {
            $c = str_split(substr($b, 0, floor($l / 2)));
            $d = str_split(substr($b, floor($l / 2) + 1));
            $sum1 = 0;
            $sum2 = 0;
            for ($s = 0; $s < count($c); $s++) {
                $sum1 += $c[$s];
            }
            for ($s = 0; $s < count($d); $s++) {
                $sum2 += $d[$s];
            }
            if ($sum1 == $sum2) {
                $sovpadd = 0;
                for ($ii = 0, $jj = (count($d) - 1); $ii < count($c); $ii++, $jj--) {
                    if ($c[$ii] == $d[$jj]) {
                        $sovpadd++;
                    } else break;
                }
                if ($sovpadd == count($c)) {
                    array_push($arr3, $arr[$i] * $arr[$j]);
                    $res = $arr[$i] * $arr[$j];
                    echo ($iii++).") $arr[$i] * $arr[$j] ==  $res <br>";
                }
            }

        }else{
            $c = str_split(substr($b, 0, floor($l / 2)));
            $d = str_split(substr($b, floor($l / 2)));
            $sum1 = 0;
            $sum2 = 0;
            for ($s = 0; $s < count($c); $s++) {
                $sum1 += $c[$s];
            }
            for ($s = 0; $s < count($d); $s++) {
                $sum2 += $d[$s];
            }
            if ($sum1 == $sum2) {
                $sovpadd = 0;
                for ($ii = 0, $jj = (count($d) - 1); $ii < count($c); $ii++, $jj--) {
                    if ($c[$ii] == $d[$jj]) {
                        $sovpadd++;
                    } else break;
                }
                if ($sovpadd == count($c)) {
                    array_push($arr3, $arr[$i] * $arr[$j]);
                    $res = $arr[$i] * $arr[$j];
                    echo ($iii++).") $arr[$i] * $arr[$j] ==  $res <br>";
                }
            }
        }
    }
}
//print_r($arr3);

echo '</pre>';
//include_once (__DIR__."/config/config.php");
//
//if ($_SERVER['REQUEST_URI'] == '/' || !empty($_GET['pag'])){
//    $pagetype ='main';
//}elseif(parse_url($_SERVER['REQUEST_URI'])['path'] == '/single'){
//    $pagetype = 'single';
//}else{
//    $pagetype= $_SERVER['REQUEST_URI'];
//}
//include_once (__DIR__."/include/functions.php");
//include_once (__DIR__."/template/layout.php");


//123