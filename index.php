
<?php
echo "<pre>";
$a = 15;
$b = 15;
$l=15;
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



