<?php 

$a = isset($_POST['num-a']) ? $_POST['num-a'] : RandNum();
$b = isset($_POST['num-b']) ? $_POST['num-b'] : RandNum();
$c = isset($_POST['num-c']) ? $_POST['num-c'] : RandNum();

function RandNum() {
    return rand(0, 100);
}

$fio = isset($_POST['fio']);
$goup_num = isset($_POST['group-num']);
$method = $_POST['method'];
$otobr = isset($_POST['otobr']);

foreach ($_POST as $key => $value) {
    echo $key.' = '.$value.'<br>';
}

function Square($a, $b, $c) {
    $p = Perimeter($a, $b, $c) / 2;
    $res = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
    if (is_nan($res)) {
        return "такого треугольника не существует";
    } else {
        return round($res, 2);
    }
}

function Perimeter($a, $b, $c) {
    return $a + $b + $c;
}

function Arithmetic($a, $b, $c) {
    $res = ($a + $b +$c) / 3;
    return round($res, 2);
}

function Multiplication($a, $b, $c) {
    return $a * $b * $c;
}

function Minimum($a, $b, $c) {
    return min($a, $b, $c);
}

function Maximum($a, $b, $c) {
    return max($a, $b, $c);
}

function ResultOfSelectionMethod($a, $b, $c, $method) {
    switch ($method) {
        case 'Площадь треугольника':
            return "Площадь треугольника: " . Square($a, $b, $c);
        case 'Периметр треугольника':
            if (!is_nan(Square($a, $b, $c))) {
                return "Периметр треугольника: " . Perimeter($a, $b, $c);
            } else {
                return "такого треугольника не существует";
            }
        case 'Среднее арифметическое':
            return "Среднее арифметическое: " . Arithmetic($a, $b, $c);
        case 'Найти минимум':
            return "Минимальное число: " . Minimum($a, $b, $c);
        case 'Найти максимум':
            return "Максимальное число: " . Maximum($a, $b, $c);
        case 'Произведение чисел':
            return "Произведение чисел: " . Multiplication($a, $b, $c);
    }
}

echo "<br><br><br><br><h1>". ResultOfSelectionMethod($a, $b, $c, $method) . "</h1><br><br><br><br>"



?>