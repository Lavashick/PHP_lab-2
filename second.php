<?php
$browser = 'БРАУЗЕР';
$printer = 'ПЕЧАТЬ';

$a = $_POST['num-a'];
$b = $_POST['num-b'];
$c = $_POST['num-c'];

$fio = $_POST['fio'];
$goup_num = $_POST['group-num'];
$method = $_POST['method'];
$answer = $_POST['answer'];

//foreach ($_POST as $key => $val) {
 //   echo '[ ' . $key . ' ] => ' . $val . "<br />";
//}

function PrintHTML($view, $browser, $printer) {
    if (isset($_POST['answer'])) {
        if ($_POST['view'] == "Версия для просмотра в браузере") {
            echo $browser;
        } else {
            echo $printer;
        }
    }
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
            return "Площадь треугольника = " . Square($a, $b, $c);
        case 'Периметр треугольника':
            if (!is_nan(Square($a, $b, $c))) {
                return "Периметр треугольника = " . Perimeter($a, $b, $c);
            } else {
                return "такого треугольника не существует";
            }
        case 'Среднее арифметическое':
            return "Среднее арифметическое = " . Arithmetic($a, $b, $c);
        case 'Найти минимум':
            return "Минимальное число = " . Minimum($a, $b, $c);
        case 'Найти максимум':
            return "Максимальное число = " . Maximum($a, $b, $c);
        case 'Произведение чисел':
            return "Произведение чисел = " . Multiplication($a, $b, $c);
    }
}

function ResultAnswer($a, $b, $c, $method) {
    switch ($method) {
        case 'Площадь треугольника':
            return Square($a, $b, $c);
        case 'Периметр треугольника':
            return "такого треугольника не существует";
        case 'Среднее арифметическое':
            return Arithmetic($a, $b, $c);
        case 'Найти минимум':
            return Minimum($a, $b, $c);
        case 'Найти максимум':
            return Maximum($a, $b, $c);
        case 'Произведение чисел':
            return Multiplication($a, $b, $c);
    }
}

function CheckAnswer($answer, $res) {
    if ($answer == $res) {
        return "тест пройден!";
    } else {
        return "тест не пройден!";
    }
}

function AboutMe() {
    if ($_POST['about-me'] != '') {
        $about_me = $_POST['about-me'];
        $res = '<p>О себе: ' . $about_me . '<p>';
        return $res;
    }
}

function AboutMeBrowser() {
    if ($_POST['about-me'] != '') {
        $about_me = $_POST['about-me'];
        $res = '
        <div class="form-group row">
                <label for="goup-num" class="col-sm-2 col-form-label">Немного о себе</label>
                <div class="col-sm-10">
                    <input name="group-num" type="text" class="form-control" id="goup-num" value="'. $about_me.'" readonly>
                </div>
            </div>
        ';
        return $res;
    }
}

function EMail() {
    if ($_POST['email'] != '') {
        $email = $_POST['email'];
        $res = '<p>Результат был отправлен на почту ' . $email . '<p>';
        return $res;
    }
}

$href_btn = 'index.php?fio=' . $fio . '&group-num=' . $goup_num;

$printer = 
'
<!doctype html>
<html lang="en">
<head>
    <title>Сметанина, 201-321, lab_6</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <div class="row justify-content-around">
            <div class="col-9">
                <p>ФИО: ' . $_POST["fio"] . '</p>
                <p>Номер группы: ' . $_POST["group-num"] . ' </p>
                <p>Число A: ' . $_POST["num-a"] . '</p>' . AboutMe() . 
                '<p>Число B: ' . $_POST["num-b"] . '</p>
                <p>Число C: ' . $_POST["num-c"] . '</p>
                <p>Метод вычисления: ' . $_POST["method"] . '</p>
                <p>Ваш ответ: ' . $_POST["answer"] . ' </p> ' . EMail() . '
                <h4>Правильный ответ: <span style="color: #3F702E;">' . ResultOfSelectionMethod($a, $b, $c, $method) . '</span></h4>
                <h1 style="color: #C04B1F;">Результат: ' . CheckAnswer($answer, ResultAnswer($a, $b, $c, $method)) . '</h1>
            </div>
        </div>
    </main>
    
</body>
</html>
';




$browser = 
'
<!doctype html>
<html lang="en">
<head>
    <title>Сметанина, 201-321, lab_6</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="" height=80 class="d-inline-block align-text-top">
            </a>
            
            <form class="d-flex signature">
                Сметанина Александра<br>
                Группа: 201-321 <br>
                Лабораторная: 6
            </form>

        </div>
    </nav>
</header>
<main>

<div class="row justify-content-around">
    <div class="col-9">

        <form class="main-form" action="index.php" method="post">
            <div class="form-group row">
                <label for="fio" class="col-sm-2 col-form-label">ФИО</label>
                <div class="col-sm-10">
                    <input name="fio" type="text" id="fio" value="'. $fio .'" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="fio" class="col-sm-2 col-form-label">Номер группы</label>
                <div class="col-sm-10">
                    <input name="fio" type="text" id="fio" value="'. $goup_num .'" readonly>
                </div>
            </div>


            

            '. AboutMeBrowser() .'

            <div class="form-group row">
                <label for="goup-num" class="col-sm-2 col-form-label">Значение A</label>
                <div class="col-sm-10">
                    <input name="group-num" type="text" class="form-control" id="goup-num" value="'. $a .'" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="goup-num" class="col-sm-2 col-form-label">Значение B</label>
                <div class="col-sm-10">
                    <input name="group-num" type="text" class="form-control" id="goup-num" value="'. $b .'" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="goup-num" class="col-sm-2 col-form-label">Значение C</label>
                <div class="col-sm-10">
                    <input name="group-num" type="text" class="form-control" id="goup-num" value="'. $c .'" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="goup-num" class="col-sm-2 col-form-label">Метод вычисления</label>
                <div class="col-sm-10">
                    <input name="group-num" type="text" class="form-control" id="goup-num" value="'. $method .'" readonly>
                </div>
            </div>


            <div class="form-group row">
                <label for="goup-num" class="col-sm-2 col-form-label">Ваш ответ</label>
                <div class="col-sm-10">
                    <input name="group-num" type="text" class="form-control" id="goup-num" value="'. $answer.'" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="goup-num" class="col-sm-2 col-form-label">Правильный ответ</label>
                <div class="col-sm-10">
                    <input name="group-num" type="text" class="form-control" id="goup-num" value="'. ResultAnswer($a, $b, $c, $method) .'" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="goup-num" class="col-sm-2 col-form-label">Результат</label>
                <div class="col-sm-10">
                    <input name="group-num" type="text" class="form-control" id="goup-num" value="'. CheckAnswer($answer, ResultAnswer($a, $b, $c, $method)) .'" readonly>
                </div>
            </div>

            ' . EMail() . '

            
            <a href="'. $href_btn .'" class="btn btn-secondary mt-4" style="color: white;">Повторить тест</a>

        </form>



    </div>
</div>


</main>
<footer>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="" height=50 class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
    </footer>
</body>
</html>





';




PrintHTML($view, $browser, $printer);
?>


