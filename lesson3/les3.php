<?php

$array = [];

$end =  100;

$random = rand(0, $end-2);

for ($i = 1; $i < $end; $i++) {
    if ($i == $random + 1) {
        $i++;
    }
    $array[] = $i;
}

foreach ($array as $value) {
    echo $value . PHP_EOL;
}

function binarySearch($arr) {
    $start = 0;
    $end = count($arr) - 1;

    while ($start < $end) {
      $base = floor(($start + $end) / 2);

      if ($arr[$base] == $base + 1) {
          $start = $base + 1;
      } else {
          $end = $base - 1;
      }
      if ($end == $start) {
          return $arr[$end] - 1;
      }
    }
}


echo "Недостающий элемент: " . binarySearch($array) . PHP_EOL;