<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php include 'modules/title.php'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column h-100">

<?php include 'modules/header.php'; ?>

<main role="main" class="flex-shrink-0 mb-5">
    <div class="container">
        <h2 class="mt-5">Photos</h2>
        <img src="images/<?php echo (date('s') % 2 == 0) ? 'password' : 'maxresdefault'; ?>.jpg" class="img-fluid img-pass rounded" alt="Адаптивные изображения">
        <img src="images/<?php echo (date('s') % 2 == 0) ? 'maxresdefault' : 'password'; ?>.jpg" class="rounded img-pass float-right" alt="Адаптивные изображения">
        <h2 class="mt-4">Tables</h2>
        <table class="table">
            <tr>
                <td>Test</td>
                <td>Table</td>
                <td>Row</td>
            </tr>
            <tr>
                <td>Hey</td>
                <td>Hello</td>
                <td>World</td>
            </tr>

        </table>
        <h2 class="mt-4">Content</h2>
        <p>
            <?php include 'text.txt'; ?>
        </p>
    </div>
</main>

<?php include 'modules/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
