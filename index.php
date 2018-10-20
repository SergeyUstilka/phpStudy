<?php
//
//function sieve($n){
//    $S = [];
//    $S[1] = 0; // 1 - не простое число
//    // заполняем решето единицами
//    for($k=2; $k<=$n; $k++)
//		$S[$k]=1;
//
//    for($k=2; $k*$k<=$n; $k++){
//        // если k - простое (не вычеркнуто)
//        if($S[$k]==1){
//            // то вычеркнем кратные k
//            for($l=$k*$k; $l<=$n; $l+=$k){
//                $S[$l]=0;
//            }
//        }
//    }
//    return $S;
//}
//echo '<pre>';
////print_r(sieve(100));
//foreach (sieve(10000) as $number => $value){
//    if($value == 1){
//        echo "$number </br>";
//    }
//}
//echo '</pre>';
include_once (__DIR__."/config/config.php");

if ($_SERVER['REQUEST_URI'] == '/' || !empty($_GET['pag'])){
    $pagetype ='main';
}elseif(parse_url($_SERVER['REQUEST_URI'])['path'] == '/single'){
    $pagetype = 'single';
}else{
    $pagetype= $_SERVER['REQUEST_URI'];
}
include_once (__DIR__."/include/functions.php");
include_once (__DIR__."/template/layout.php");


//dsadasd askldjkasbj dbkasjd as



//123