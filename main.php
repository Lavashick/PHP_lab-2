<?php 

$a = RandNum();
$b = RandNum();
$c = RandNum();

function RandNum() {
    return rand(0, 100);
}

$fio = $_POST['fio'];
$goup_num = $_POST['group-num'];
$method = $_POST['method'];
$otobr = $_POST['otobr'];
$answer = $_POST['answer'];

foreach ($_POST as $key => $value) {
    echo $key.' = '.$value.'<br>';
}



















?>