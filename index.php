<?php

include_once 'calculator.php';

$calc = new Calculator();

session_start();

if( !isset($_SESSION['history']) ) {
    $_SESSION['history'] = array();
    $_SESSION['iteration'] = 0;
}
$_SESSION['iteration']++;

?>

<!doctype html>
<html lang="en">
<head>
    <title>Lab-10</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php' ?>



<div class="container mt-5">
    <form action="" class="form" method="post">
        <div class="form-group">
            <label for="val">Выражение</label>
            <input type="text" class="form-control" name="val" id="val" aria-describedby="helpId" placeholder="2 + 2" required value="<?php echo $_POST['val'] ?>" autofocus="autofocus" onfocus="this.select()">
        </div>
        <button type="submit" class="btn btn-primary">Вычислить</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>Выражение</th>
            <th>Результат</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_POST['val'])) {
            $val = $_POST['val'];
            try {
                $res = $calc->calculate($val);
                echo '<h4 class="mt-4">'.$val.' = '.$res.'</h4>';
            } catch (Exception $e) {
                $res = $e->getMessage();
                preg_match('/(\d+)/', $res, $matches);
                $error_num = $matches[1];
                $error = $res;
                if ($error_num) {
                    $error = mb_substr($res, strlen(strval($error_num)) + 3);
                    $expression = mb_substr($val, 0, $error_num - 1) .
                        '<span style="color:red">'
                        . mb_substr($val, $error_num - 1, 1) .
                        '</span>'
                        . mb_substr($val, $error_num, strlen($val) - $error_num);
                } else
                    $expression = $val;
                echo '<h4 class="mt-4">'.$expression.' = '.$error.'</h4>';
            }
        }

        for ($i = count($_SESSION['history']) - 1; $i >= 0; $i--) {
            $row =  '<tr>';
            $row .= '<td>'.($i + 1).'</td>';
            $row .= '<td>'.$_SESSION['history'][$i]['val'].'</td>';
            $row .= '<td>'.$_SESSION['history'][$i]['res'].'</td>';
            $row .= '</tr>';
            echo $row;
        }
        ?>
        </tbody>
    </table>

    <?php
    if (isset($_POST['val'])) {
        $_SESSION['history'][] = ['val' => $val, 'res' => $res];
    }
    ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
