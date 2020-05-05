<?php
/*1. Определить сложность следующих алгоритмов:
- Поиск элемента массива с известным индексом - O(1)
- Дублирование одномерного массива через foreach - O(n)
- Рекурсивная функция нахождения факториала числа - O(n)
- Удаление элемента массива с известным индексом - кажется, что O(n),
 ведь нужно будет сдвинуть индексы всех оставшихся элементов массива в худшем случае.

2.Определить сложность следующих алгоритмов. Сколько произойдет итераций?
1)

$n = 100;
$array[]= [];

for ($i = 0; $i < $n; $i++) { --- O(n)
for ($j = 1; $j < $n; $j *= 2) {  --- O(log(n))
$array[$i][$j]= true;  --- O(1)
} }

В результатае сложность алгоритма O(n*log(n))

2)

$n = 100;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) { --- O(n/2) = O(n)
for ($j = $i; $j < $n; $j++) {  ---  O(n)
$array[$i][$j]= true;  --- O(1)
} }

В результатае сложность алгоритма O(n^2)

*/


//Требуется написать метод, принимающий на вход размеры двумерного массива и выводящий массив в виде инкременированной
// цепочки чисел, идущих по спирали.

class MatrixBuilder
{
    protected $rows;
    protected $columns;

    protected function _initMatrix($x, $y)
    {
        if ($x == 0 || $y == 0) {
            return 'ERROR';
        }
        $matrix = [];
        for ($i = 0; $i < $y; $i++) {
            for ($j = 0; $j < $x; $j++) {
                $matrix[$i][] = 0;
            }
        }
        return $matrix;
    }

    protected function _render($matrix)
    {
        if ($matrix == 'ERROR') return $matrix . PHP_EOL;
        for ($i = 0; $i < count($matrix); $i++) {
            $matrix[$i] = implode(' ', $matrix[$i]) . PHP_EOL;
        }
        return implode($matrix) . PHP_EOL;
    }

    protected function _fillMatrix($matrix, $allRows, $allColumns, $rowCounter, $columnCounter, $counter, $exitRows, $exitCols)
    {
// Правильно ли я понимаю, что если все сократить, то в итоге сложность этого алгоритма составит O(n)?
        for ($column = $columnCounter; $column < $allColumns; $column++) {
            $matrix[$rowCounter][$column] = ($counter >= 10) ? $counter++ : '0' . $counter++;
            $columnCounter = $column;
        }

        $rowCounter++;
        $exitRows--;

        if ($exitRows == 0 || $exitCols == 0) return $matrix;

        for ($row = $rowCounter; $row < $allRows; $row++) {
            $matrix[$row][$columnCounter] = ($counter >= 10) ? $counter++ : '0' . $counter++;
            $rowCounter = $row;
        }

        $columnCounter--;
        $exitCols--;

        if ($exitRows == 0 || $exitCols == 0) return $matrix;

        for ($column = $columnCounter; $column >= count($matrix) - $allRows; $column--) {
            $matrix[$rowCounter][$column] = ($counter >= 10) ? $counter++ : '0' . $counter++;
            $columnCounter = $column;
        }

        $rowCounter--;
        $exitRows--;

        if ($exitRows == 0 || $exitCols == 0) return $matrix;

        for ($row = $rowCounter; $row > count($matrix[$rowCounter]) - $allColumns; $row--) {
            $matrix[$row][$columnCounter] = ($counter >= 10) ? $counter++ : '0' . $counter++;
            $rowCounter = $row;
        }
        $columnCounter++;
        $exitCols--;

        if ($exitRows == 0 || $exitCols == 0) return $matrix;

        $allColumns--;
        $allRows--;

        return $this->_fillMatrix($matrix, $allRows, $allColumns, $rowCounter, $columnCounter, $counter, $exitRows, $exitCols);
    }

    public function drawMatrix($x, $y)
    {
        $this->rows = $y;
        $this->columns = $x;
        $matrix = $this->_initMatrix($x, $y);
        if ($matrix != 'ERROR') {
            $allRows = count($matrix);
            $allColumns = count($matrix[0]);
            $exitRows = $allRows;
            $exitCols = $allColumns;
            $rowCounter = 0;
            $columnCounter = 0;
            $counter = 1;
            $matrix = $this->_fillMatrix($matrix, $allRows, $allColumns, $rowCounter, $columnCounter, $counter, $exitRows, $exitCols);
        }
        echo $this->_render($matrix);
    }
}

$obj = new MatrixBuilder();
$obj->drawMatrix(3, 3);
$obj->drawMatrix(5, 5);
$obj->drawMatrix(2, 2);
$obj->drawMatrix(2, 5);
$obj->drawMatrix(4, 2);
$obj->drawMatrix(10, 3);
$obj->drawMatrix(7, 10);
$obj->drawMatrix(8, 8);
$obj->drawMatrix(0, 5);
$obj->drawMatrix(1, 10);

