<?php 

$a = isset($_POST['num-a']) ? $_POST['num-a'] : RandNum();
$b = isset($_POST['num-b']) ? $_POST['num-b'] : RandNum();
$c = isset($_POST['num-c']) ? $_POST['num-c'] : RandNum();

function RandNum() {
    return rand(0, 100);
}

$fio = isset($_POST['fio']);
$goup_num = isset($_POST['group-num']);
$method = isset($_POST['method']);
$otobr = isset($_POST['otobr']);

function Square($a, $b, $c) {
    $p = Perimeter($a, $b, $c) / 2;
    $res = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
    if (is_nan($res)) {
        return "Такого треугольника не существует";
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

echo "a = " . $a . "; b = " . $b . "; c = " . $c . "<br><br>";
echo "Square = " . Square($a, $b, $c) . "<br>";
echo "Perimeter = " . Perimeter($a, $b, $c) . "<br>";
echo "Arithmetic = " . Arithmetic($a, $b, $c) . "<br>";
echo "Multiplication = " . Multiplication($a, $b, $c) . "<br>";
echo "Minimum = " . Minimum($a, $b, $c) . "<br>";
echo "Maximum = " . Maximum($a, $b, $c) . "<br>";

?>