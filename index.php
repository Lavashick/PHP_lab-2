<!doctype html>
<html lang="en">

<head>
    <title>Сметанина, 201-321, lab_6</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include("header.php") ?>

    <main>
        <?php include("main.php") ?>

        <div class="row justify-content-around">
            <div class="col-9">

                <form action="./">
                    <div class="form-group row">
                        <label for="fio" class="col-sm-2 col-form-label">ФИО</label>
                        <div class="col-sm-10">
                            <input name="fio" type="text" class="form-control" id="fio" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="goup-num" class="col-sm-2 col-form-label">Номер группы</label>
                        <div class="col-sm-10">
                            <input name="group-num" type="text" class="form-control" id="goup-num" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="about-me" class="col-sm-2 col-form-label">Немного о себе</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="about-me" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num-a" class="col-sm-2 col-form-label">Значение A</label>
                        <div class="col-sm-10">
                            <input name="num-a" type="number" class="form-control" id="num-a" value="<?= $a ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num-b" class="col-sm-2 col-form-label">Значение B</label>
                        <div class="col-sm-10">
                            <input name="num-b" type="number" class="form-control" id="num-b" value="<?= $b ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num-c" class="col-sm-2 col-form-label">Значение C</label>
                        <div class="col-sm-10">
                            <input name="num-c" type="number" class="form-control" id="num-c" value="<?= $c ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="sel col-sm-2 col-form-label" for="method">Метод вычисления</label>
                        <select name="method" class="form-control col-sm-7" id="method">
                            <option>Площадь треугольника</option>
                            <option>Периметр треугольника</option>
                            <option>Среднее арифметическое</option>
                            <option>Найти минимум</option>
                            <option>Найти максимум</option>
                            <option>Произведение чисел</option>
                        </select>
                    </div>



                    <div class="form-group row">
                        <label class="sel col-sm-2 col-form-label" for="view">Отображение</label>
                        <select name="view" class="form-control col-sm-7" id="view">
                            <option>Версия для просмотра в браузере</option>
                            <option>Версия для печати</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="answer" class="col-sm-2 col-form-label">Ваш ответ</label>
                        <div class="col-sm-10">
                            <input name="" type="number" class="form-control" id="answer" >
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="mail">
                        <label class="form-check-label" for="mail">
                            Отправить результат по e-mail
                        </label>
                    </div>



                    <input class="btn btn-secondary mt-4" type="submit" value="Пересобрать">

                </form>



            </div>
        </div>


    </main>



    <?php include("footer.php") ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>