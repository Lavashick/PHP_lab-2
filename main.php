<?php 

$a = RandNum();
$b = RandNum();
$c = RandNum();

function RandNum() {
    return rand(0, 100);
}

$fio = $_GET['fio'];
$group_num = $_GET['group-num'];

foreach ($_POST as $key => $value) {
    echo $key.' = '.$value.'<br>';
}



















?>