<?php
$array_lenth = (int)$_POST['array-length'];
$elements = [];

for ($i = 0; $i < $array_lenth; $i++)
    $elements[$i] = (int)$_POST['element-' . $i];

$algorithms = [
    'choice' => 'Сортировка выбором',
    'bubble' => 'Пузырьковый алгоритм',
    'shaker' => 'Шейкерная сортировка',
    'insert' => 'Сортировка вставками',
    'gnome' => 'Алгоритм садового гнома',
    'shells' => 'Алгоритм Шелла',
    'quick' => 'Быстрая сортировка'
];

$algorithm_type = $_POST['func'];

include "algorithms.php";

?>

<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><Lab_7></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column h-100">

<?php include 'header.php'; ?>

<main role="main" class="flex-shrink-0 mb-5">
    <div class="container mt-4">
        <h2><?php echo $algorithms[$algorithm_type]; ?></h2>
        <p>Входные данные:
        <?php
        foreach ($elements as $element) {
            echo $element.'; ';
        }
        echo '</p>';
        ?>
        <h2>Процесс сортировки:</h2>
        <?php

        $iterations = 0;
        $start_time = microtime(true);
        switch ($algorithm_type) {
            case 'choice':
                $iterations = sorting_by_choice($elements);
                break;
            case 'bubble':
                $iterations = bubble_sort($elements);
                break;
            case 'shaker':
                $iterations = shaker_sort($elements);
                break;
            case 'insert':
                $iterations = insert_sort($elements);
                break;
            case 'gnome':
                $iterations = gnome_sort($elements);
                break;
            case 'shells':
                $iterations = shells_sort($elements);
                break;
            case 'quick':
                $iterations = quick_sort($elements);
                break;
        }

        echo '<p>Сортировка завершена, проведено '.$iterations.' итераций. Сортировка заняла '.round(microtime(true) - $start_time, 4).' секунд</p>';

        echo '<h2>Результат: </h2>';
        echo '<p>';
        foreach ($elements as $element) {
            echo $element.'; ';
        }
        echo '</p>'
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>