<?php
$start_x = 20;
$start_encounting =  20;
$start_step = 2;
$start_type = 'A';

$x = isset($_GET['x']) ? (int)$_GET['x'] : $start_x;
$encounting = isset($_GET['encounting']) ? (int)$_GET['encounting'] : $start_encounting;
$step = isset($_GET['step']) ? (int)$_GET['step'] : $start_step;
$type = isset($_GET['type']) ? $_GET['type'] : $start_type;

function calculate_function ($x, $encounting, $step, $type) {
    $arr_res = [];
    $arr_x = [];
    for ($i = 0; $i < $encounting; $i++) {
        $arr_x[$i] = $x + $step * $i;
    }
    // Вычисление значений f(x)
    for ($i = 0; $i < $encounting; $i++) {
        if ($x <= 10) {
            $f = 10 * $x - 5;
            $arr_res[] = $f;
        } elseif ($x < 20) {
            $f = ($x + 3) * $x * $x;
            $arr_res[] = $f;
        } else {
            if ($x == 25) {
                $f = 'error';
                $arr_res[] = $f;
            }
            else {
                $f = (3 / ($x - 25)) + 2;
                $arr_res[] = $f;
            }
        }
        $x += $step;
    }

    switch ($type) {
        case 'A':
            for ($i = 0; $i < $encounting; $i++) {
                echo 'f(' . $arr_x[$i] . ') = ' . $arr_res[$i] . "<br>";
            }
            break;
        case 'B':
            echo "<ul>";
            for ($i = 0; $i < $encounting; $i++) {
                echo '<li>' . 'f(' . $arr_x[$i] . ') = ' . $arr_res[$i] . "</li>";
            }
            echo "</ul>";
            break;
        case 'C':

            break;
        case 'D':

            break;
        case 'E':

            break;

    }

   
}



?>