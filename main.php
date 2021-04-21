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
    // Вычисление значений f(x)
    for ($i = 0; $i < $encounting; $i++, $x += $step) {
        if ($x <= 10)
            $f = 10 * $x - 5;
        else 
            if ($x < 20)
            $f = ($x + 3) * $x * $x;
        else {
            if ($x == 25)
                $f = 'error';
            else
                $f = (3 / ($x - 25)) + 2;
        }
    }

    if ($type == 'A') // если тип верстки А
    {
        echo 'f(' . $x . ')=' . $f; // выводим аргумент и значение функции
        if ($i < $encounting - 1) // если это не последняя итерация цикла
            echo '<br>'; // выводим знак перевода строки
    } else 
        if ($type == 'B') // если тип верстки В
    {
        // выводим данные как пункт списка
        echo '<li>f(' . $x . ')=' . $f . '</li>';
    }
    if ($type == 'B') // если тип верстки В
        echo '</ul>'; // закрываем тег списка
}



?>