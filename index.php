
<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 06.09.2018
 * Time: 20:02
 */



echo "<pre>";
$a = 10;
$b = 10;
$l=10;
echo "<style>td{border: 1px solid #000; padding: 10px 15px; font-size: 14px;} .main-diag{background:green; color:#fff; }
.sub-diag{background: red; color:#fff;}</style>";
echo "<table style='font-size: 14px;  margin: 20px auto;'>";
for ($i=1; $i<=$a; $i++){
    echo "<tr>";
    for ($j = 1; $j<=$b; $j++){
        if ($i == $j){
            echo  "<td class='main-diag'>".$i*$j."</td>";
        }elseif($i*$j == $i*$l){
            echo  "<td class='sub-diag'>".$i*$j."</td>";
        }else{
            echo  "<td>".$i*$j."</td>";
        }
    }
    $l--;
    echo "<tr>";
}
echo "<table>";
echo "</pre>";


