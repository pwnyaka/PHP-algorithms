<?php
//Простые делители числа 13195 - это 5, 7, 13 и 29.
// Каков самый большой делитель числа 600851475143, являющийся простым числом?
const NUM = 600851475143;
$result = NUM;
$divider = 1;
$flag = true;

$start = microtime(true);
while  ($flag) {
    for ($i = $divider + 1; $i < $result; $i++) {
        if ($i == $result - 1) {
            $flag = false;
            break;
        }
        if ($result % $i == 0) {
            $simple = true;
            for ($j = 2; $j < $i; $j++) {
                if ($i % $j == 0) $simple = false;
            }
            if ($simple) {
                $divider = $i;
                $result = $result / $divider;
            }

            echo "DONE, divider:" . $divider . PHP_EOL;
            echo "division result:" . $result . PHP_EOL;
        }
    }
}

echo "RESULT: " . $result . PHP_EOL;
echo microtime(true) - $start;






//for ($i = 2; $i < NUM; $i++) {
//    if (NUM % $i == 0) {
//        $simple = true;
//        for ($j = 2; $j < $i; $j++) {
//            if ($i % $j == 0) $simple = false;
//        }
//        if ($simple) $divider = $i;
//    }
//}
//
//echo $divider;