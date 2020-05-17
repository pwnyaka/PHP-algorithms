<?php

$filename = 'chisla.txt';
$end = 1000;

$a = [];
$b = [];

$result = [];

for ($i = 0; $i < $end; $i++) {
    $a[$i] = rand(0, 9);
    $b[$i] = rand(0, 9);
}

file_put_contents($filename, implode($a));
file_put_contents($filename, PHP_EOL . implode($b), FILE_APPEND);

$aReverse = array_reverse($a);
$bReverse = array_reverse($b);


$flag = false;


$start = microtime(true);

for ($i = 0; $i < $end; $i++) {
    $sum = $flag ? $aReverse[$i] + $bReverse[$i] + 1 : $aReverse[$i] + $bReverse[$i];
//    var_dump($sum);
    if ($sum >= 10) {
        $flag = true;
        $result[] = $sum % 10;
    } else {
        $flag = false;
        $result[] = $sum;
    }
}
$result = array_reverse($result);
if ($flag) {
    file_put_contents($filename, '*' . implode($a));
    file_put_contents($filename, PHP_EOL . '*' . implode($b), FILE_APPEND);
    file_put_contents($filename, PHP_EOL . '1' . implode($result), FILE_APPEND);
} else {
    file_put_contents($filename, PHP_EOL . implode($result), FILE_APPEND);
}








