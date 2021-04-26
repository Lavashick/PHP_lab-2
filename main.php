<?php 

$a = RandNum();
$b = RandNum();
$c = RandNum();

function RandNum() {
    return rand(0, 100);
}

$fio = $_GET['fio'];
$group_num = $_GET['group-num'];

?>