<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab_7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column h-100">

<?php include 'header.php'; ?>

<main role="main" class="flex-shrink-0 mb-5">
    <div class="container d-flex justify-content-center">
        <?php
        $algorithms = [
            'choice' => 'Сортировка выбором',
            'bubble' => 'Пузырьковый алгоритм',
            'shaker' => 'Шейкерная сортировка',
            'insert' => 'Сортировка вставками',
            'gnome' => 'Алгоритм садового гнома',
            'shells' => 'Алгоритм Шелла',
            'quick' => 'Быстрая сортировка'
        ];
        ?>
        <form target="_blank" action="sort.php" class="col-6 mt-3 needs-validation" method="post" novalidate>
            <div class="form-group clearfix">
                <input type="button" class="col-5 btn btn-primary add-element-btn mr-3 float-left" value="Добавить элемент">
                <input type="button" class="col-5 btn btn-danger remove-element-btn float-right" value="Удалить элемент">
            </div>

            <div class="form-group row elements-group">
                <input type="hidden" name="array-length" value="1">
                <div class="col-6 row">
                    <label for="element-0" class="col-sm-2 col-form-label">1: </label>
                    <input type="text" class="mt-1 col-sm form-control" id="element-0" placeholder="a[0]" name="element-0" required>
                </div>
            </div>

            <div class="form-group row col-sm">
                <label for="function" class="col-sm-3 col-form-label">Алгоритм</label>
                <select class="col-sm form-control" id="function" name="func">';
                    <?php
                    foreach ($algorithms as $key => $title) {
                        echo '<option value="' . $key . '">' . $title . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group row col-sm">
                <button type="submit" class="btn btn-primary col-sm ml-4">Сортировать массив</button>
            </div>
        </form>
        <script src="script.js"></script>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>