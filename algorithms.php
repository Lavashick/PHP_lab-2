<?php

function arrayToString(array $arr) {
    $str = '';
    for ($j = 0; $j < count($arr); $j++)
        $str .= $arr[$j].' ';
    return $str;
}

function swap(&$first, &$second) {
    $temp = $first;
    $first = $second;
    $second = $temp;
}

function printIterationStart($num, array $arr) {
    return '<p><b>'.$num.':</b> '.arrayToString($arr);
}

function printIterationEnd(array $arr) {
    return ' <b>--></b> '.arrayToString($arr).'</p>';
}

function sorting_by_choice(array &$data)
{
    for ($i = 0; $i < count($data) - 1; $i++) {
        echo printIterationStart($i + 1, $data);
        $min = $i;
        for ($j = $i + 1; $j < count($data); $j++)
            if ($data[$j] < $data[$min])
                $min = $j;

        if ($min != $i)
            swap($data[$i], $data[$min]);

        echo printIterationEnd($data);
    }
    return $i;
}

function bubble_sort(array &$data)
{
    for ($i = 0; $i < count($data) - 1; $i++) {
        echo printIterationStart($i + 1, $data);
        for ($j = 0; $j < count($data) - $i - 1; $j++)
            if ($data[$j] > $data[$j + 1])
                swap($data[$j], $data[$j + 1]);

        echo printIterationEnd($data);
    }
    return $i;
}

function shaker_sort(array &$data) {
    $left = 1;
    $right = count($data) - 1;
    $iter = 0;
    while($left <= $right)
    {
        echo printIterationStart(++$iter, $data);
        for($i = $right; $i >= $left; $i--)
            if($data[$i - 1] > $data[$i])
                swap($data[$i - 1], $data[$i]);
        $left++;

        if ($left > $right) {
            echo printIterationEnd($data);
            break;
        }

        for($i = $left; $i <= $right; $i++)
            if($data[$i - 1] > $data[$i])
                swap($data[$i - 1], $data[$i]);
        $right--;
        echo printIterationEnd($data);
    }
    return $iter;
}

function insert_sort(array &$data)
{
    for($i = 1; $i < count($data); $i++) {
        echo printIterationStart($i, $data);
        $val = $data[$i];
        $j = $i - 1;
        while($j >= 0 && $data[$j] > $val) {
            $data[$j + 1] = $data[$j];
            $j--;
        }
        $data[$j + 1] = $val;
        echo printIterationEnd($data);
    }
    return $i - 1;
}

function gnome_sort(array &$data) {
    $i = 1;
    $j = 2;
    $iteration = 1;
    while($i < count($data)) {
        echo printIterationStart($iteration++, $data);
        if(!$i || $data[$i - 1] <= $data[$i]) {
            $i = $j;
            $j++;
        } else {
            swap($data[$i], $data[$i - 1]);
            $i--;
        }
        echo printIterationEnd($data);
    }
    return $iteration - 1;
}

function shells_sort(array &$data){
    $sort_length = count($data) - 1;
    $step = ceil(($sort_length + 1) / 2);

    $iteration = 1;
    do {
        echo printIterationStart($iteration++, $data);
        $i = ceil($step);
        do
        {
            $j = (int)$i - $step;
            $c = 1;
            do
            {
                if($data[$j] <= $data[$j + $step])
                    $c = 0;
                else
                {
                    $tmp=$data[$j];
                    $data[$j]=$data[$j + $step];
                    $data[$j + $step] = $tmp;
                }
                $j = $j - 1;
            }
            while($j >= 0 && $c == 1);
            $i++;
        }
        while($i <= $sort_length);
        $step = $step / 2;
        echo printIterationEnd($data);
    }
    while($step > 0);
    return $iteration - 1;
}

function quick_sort(array &$arr) {
    $iteration = 0;
    q_sort($arr, 0, count($arr) - 1, $iteration);
    return $iteration - 1;
}


function q_sort(array &$data, $left, $right, &$iteration) {
    if($left < $right)
    {
        $q = partition($data, $left, $right, $iteration);
        q_sort($data, $left, $q - 1, $iteration);
        q_sort($data, $q + 1, $right, $iteration);
    }
}

function partition(array &$data, $left, $right, &$iteration)
{
    echo printIterationStart($iteration++, $data);
    $q = $left;

    for($i = $left; $i < $right; $i++)
        if($data[$i] <= $data[$right])
            swap($data[$i], $data[$q++]);

    swap($data[$q], $data[$right]);

    echo printIterationEnd($data);
    return $q;
}