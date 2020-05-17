<?php

$arr = [];
$a = rand(1, 9);
$n = rand(1, 7000);

echo "Операция {$a}^{$n}..." .PHP_EOL;

$str = (string) $a;
// Сложность моего алгоритма получилась O(n^2), я думал показатель степени разбирать рекурсивно, что бы в этом месте уменьшить сложность
// с n до log n, что бы общая была n*log n. Так вот... если идти этим путем, то встает вопрос перемножения длинных чисел,
// где сложность операции вообще O(n^2) и суммарная в итоге получится O(n^2 * log n), что еще хуже на сколько я понимаю
// тут я в ступор и впал, оставив свое O(n^2) решение :)
for ($i = 1; $i < $n; $i++) {
    $flag = false;
    $dozens = 0;
    $arr = str_split($str);
    $arr = array_reverse($arr);
    for ($j = 0; $j < count($arr); $j++) {
        $res = $flag ? $arr[$j] * $a + $dozens : $arr[$j] * $a;
        if ($res >= 10) {
            $arr[$j] = $res % 10;
            $dozens = floor($res / 10);
            $flag = true;
        } else {
            $arr[$j] = $res;
            $flag = false;
            $dozens = 0;
        }
    }
    $str = implode(array_reverse($arr));
    if ($dozens) $str = $dozens . $str;
}

file_put_contents('otvet.txt', $str);


