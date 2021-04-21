<?php
$start_x = 20;
$start_encounting =  20;
$start_step = 2;
$start_type = 'A';

$x = isset($_GET['x']) ? (int)$_GET['x'] : $start_x;
$encounting = isset($_GET['encounting']) ? (int)$_GET['encounting'] : $start_encounting;
$step = isset($_GET['step']) ? (int)$_GET['step'] : $start_step;
$type = isset($_GET['type']) ? $_GET['type'] : $start_type;

$max_f = 0;
$min_f = 0;
$mid_f = 0;

function calculate_function ($x, $encounting, $step, $type) {
    global $max_f;
    global $min_f;
    global $mid_f;
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
                $f = null;
                $arr_res[] = $f;
            }
            else {
                $f = (3 / ($x - 25)) + 2;
                $arr_res[] = $f;
            }
        }
        $x += $step;
    }

    // Округление до 3 знаков после запятой
    for ($i = 0; $i < $encounting; $i++) {
        if ($arr_res[$i] != null) {
            $arr_res[$i] = round($arr_res[$i], 3);
        }
    }

    // Вывод мин, макс и ср. знач.
    $max_f = max($arr_res);
    $min_f = min($arr_res);
    $k_err = false;
    for ($i = 0; $i < $encounting; $i++) {
        if ($arr_x[$i] == 25) {
            $k_err = true;
        }
    }
    if ($k_err) {
        $mid_f = array_sum($arr_res) / (count($arr_res) - 1);
        echo $k_err;
    } else {
        $mid_f = array_sum($arr_res) / count($arr_res);
    }

    // Вывод по типу A, B, C, D, E
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
            echo "<ol>";
            for ($i = 0; $i < $encounting; $i++) {
                echo '<li>' . 'f(' . $arr_x[$i] . ') = ' . $arr_res[$i] . "</li>";
            }
            echo "</ol>";
            break;

        case 'D':
            echo "<table>";
            echo "<tr> <th>№</th> <th>x</th> <th>f(x)</th> </tr>";
            for ($i = 1; $i < $encounting + 1; $i++) {
                echo "<tr>";
                    echo "<td>" . $i . "</td>" . "<td>" . $arr_x[$i - 1] . "</td>" . "<td>" . $arr_res[$i - 1] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            break;

        case 'E':
            for ($i = 0; $i < $encounting; $i++) {
                echo '<div class="red">' . 'f(' . $arr_x[$i] . ') = ' . $arr_res[$i] . "</div>";
            }
            break;

    }

   
}



?>