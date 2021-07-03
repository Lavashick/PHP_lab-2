<?php

include "analysis.php";

?>

<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><Lab_8></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column h-100">

<?php include 'header.php'; ?>

<main role="main" class="flex-shrink-0 mb-5">
    <div class="container col-7 mt-4 mb-4">
        <?php
        if (isset($_POST['data']) && $_POST['data']) {
            echo '
            <h2>Исходный текст</h2>
            <p id="sourse-text">'.$_POST['data'].'</p>
            <h2>Информация о тексте</h2>
            ';
            $analysis_result = new AnalysisResult;
            $analysis_result->start(iconv("utf-8", "cp1251", $_POST['data']));

            echo '<table class="table table-striped">';

            echo '<thead class="thead-inverse">';
            echo '<tr><th>Значение</th><th>Результат</th></tr>';
            echo '</thead>';

            echo '<tbody>';
            echo '<tr><td>Количество символов</td>' . '<td>'.$analysis_result->symbol_amount . '</td></tr>';
            echo '<tr><td>Количество букв</td>' . '<td>'.$analysis_result->letter_amount . '</td></tr>';
            echo '<tr><td>Количество строчных букв</td>' . '<td>'.$analysis_result->lower_amount . '</td></tr>';
            echo '<tr><td>Количество заглавных букв</td>' . '<td>'.$analysis_result->upper_amount . '</td></tr>';
            echo '<tr><td>Количество знаков препинания</td>' . '<td>'.$analysis_result->prep_mark_amount . '</td></tr>';
            echo '<tr><td>Количество цифр</td>' . '<td>'.$analysis_result->digit_amount . '</td></tr>';
            echo '<tr><td>Количество слов</td>' . '<td>'.$analysis_result->word_amount . '</td></tr>';
            echo '</tbody></table>';

            echo '<div>';
            echo '<table class="table table-striped">';

            echo '<thead class="thead-inverse">';
            echo '<tr><th class="">Буква</th><th>Количество вхождений</th></tr>';
            echo '</thead>';

            echo '<tbody>';
            ksort($analysis_result->letters);
            foreach ($analysis_result->letters as $letter => $count) {
                $letter = iconv("cp1251", "utf-8", $letter);
                $count = iconv("cp1251", "utf-8", $count);
                echo '<tr><td>'.$letter.'</td><td>'.$count.'</td></tr>';
            }
            echo '</tbody></table>';
            echo '</div>';

            echo '<div>';
            echo '<table class="table table-striped">';

            echo '<thead class="thead-inverse">';
            echo '<tr><th>Слово</th><th>Количество вхождений</th></tr>';
            echo '</thead>';

            echo '<tbody>';
            ksort($analysis_result->words);
            foreach ($analysis_result->words as $word => $count) {
                $word = iconv("cp1251", "utf-8", $word);
                $count = iconv("cp1251", "utf-8", $count);
                echo '<tr><td>'.$word.'</td><td>'.$count.'</td></tr>';
            }
            echo '</tbody></table>';
            echo '</div>';

            echo '<a href="index.php" class="mt-3"><button type="button" class="btn btn-primary">Другой анализ</button></a>';
        } else
            echo '<div class="src_error">Нет текста для анализа</div>';
        ?>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>