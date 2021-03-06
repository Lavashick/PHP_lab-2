<!doctype html>
<html lang="en">

<head>
    <title>Сметанина, 201-321, lab_2</title>
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
            <div class="col-5">

                <form action="./">
                    <div class="form-group">
                        <label for="type">Тип верстки</label>
                        <select class="form-control" name="type" id="type">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="x">Минимальный X</label>
                        <input type="number" name="x" class="form-control" id="x" placeholder="<?= $start_x ?>" value="<?= $x ?>">
                    </div>

                    <div class="form-group">
                        <label for="step">Шаг</label>
                        <input type="number" class="form-control" name="step" id="step" placeholder="<?= $start_step ?>" value="<?= $step ?>">
                    </div>

                    <div class="form-group">
                        <label for="encounting">Количество значений</label>
                        <input type="number" class="form-control" name="encounting" id="encounting" placeholder="<?= $start_encounting ?>" value="<?= $encounting ?>">
                    </div>

                    <input class="btn btn-secondary" type="submit" value="Пересобрать">

                </form>



            </div>
            <div class="col-5">
                <?php calculate_function($x, $encounting, $step, $type); 
                
                
                
                ?>
                
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