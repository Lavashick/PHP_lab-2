<!doctype html>
<html lang="en">

<head>
    <title>Сметанина, 201-321, lab_5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<?php
$start_multi = 2;
$end_multi = 9;

$contents = array();
for ($i = $start_multi; $i <= $end_multi; $i++)
    $contents[$i - $start_multi] = $i;
$content = (int)$_GET['content'];
if (!in_array($content, $contents))
    $content = null;
$html_type = $_GET['html_type'];
?>

<body>
    <?php include("header.php") ?>

    <main role="main" class="flex-shrink-0 mb-5">
        <div class="container-fluid row">
            <div class="col-3">
                <?php
                echo '<ul class="left-menu">';

                createElement('Вся таблица умножения', null, !isset($content));

                for ($i = $start_multi; $i <= $end_multi; $i++) {
                    $isActive = $content == $i;
                    createElement('Таблица умножения на ' . $i, $i, $isActive);
                }

                function createElement($title, $number, $isActive)
                {
                    global $html_type;
                    echo '<li><a href="?';
                    if (isset($html_type))
                        echo '&html_type=' . $html_type;

                    if ($number !== null)
                        echo '&content=' . $number;
                    echo '"';
                    if ($isActive)
                        echo ' class="active"';
                    echo '"';
                    echo '>' . $title . '</a></li>';
                }
                ?>
            </div>
            <div class="col">
                <?php
                if (!isset($html_type) || $html_type == 'TABLE')
                    echo tableForm($start_multi, $end_multi);
                else
                    echo divForm($start_multi, $end_multi);
                ?>
            </div>

            <?php

            function tableForm($start, $end)
            {
                global $content;
                $res = '';
                if (!isset($content)) {
                    for ($i = $start; $i <= $end; $i++) {
                        $res .= '<tr>' . outRow($i, $start, $end) . '</tr>';
                    }
                } else {
                    $x = $content;
                    $res .= '<tr>';
                    for ($i = $start; $i <= $end; $i++) {
                        $res .= '<td>' . outStr($x, $i, $end) . '</td>';
                    }
                    $res .= '</tr>';
                }
                return '<table class="table table-striped table-dark">' . $res . '</table>';
            }

            function divForm($start, $end)
            {
                global $content;
                $res = '<div class="d-flex flex-column">';
                if (!isset($content)) {
                    for ($i = $start; $i <= $end; $i++) {
                        $res .= '<div class="d-flex justify-content-around m-3">';
                        $res .= outRow($i, $start, $end);
                        $res .= '</div>';
                    }
                } else {
                    $res .= '<div class="d-flex justify-content-around m-3">';
                    $res .= outRow($content, $start, $end);
                    $res .= '</div>';
                }
                return $res . '</div>';
            }

            function outRow($n, $start, $end)
            {
                global $html_type;
                $res = '';
                for ($i = $start; $i <= $end; $i++) {
                    if (!isset($html_type) || $html_type == 'TABLE')
                        $res .= '<td>' . outStr($i, $n, $end) . '<br></td>';
                    else
                        $res .= '<div>' . outStr($i, $n, $end) . '</div>' . '<br>';
                }
                return $res;
            }

            function outStr($x, $y, $end)
            {
                $res = ($x * $y <= $end) ? outNumAsLink($x * $y) : $x * $y;
                return outNumAsLink($x) . ' x ' . outNumAsLink($y) . ' = ' . $res;
            }

            function outNumAsLink($n)
            {
                $res = '<a href="?content=' . $n;
                return $res . '">' . $n . '</a>';
            }
            ?>
        </div>
    </main>



    <?php include("footer.php") ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>