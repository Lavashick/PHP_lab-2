<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php include 'modules/title.php'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column h-100">

<?php include 'modules/header.php'; ?>

<main role="main" class="flex-shrink-0 mb-5">
    <div class="container">
        <h1 class="mt-3">Генератор паролей</h1>
        <img src="images/<?php echo (date('s') % 2 == 0) ? 'o-password-facebook' : 'password-2'; ?>.jpg" class="img-fluid img-pass rounded" alt="Адаптивные изображения">
        <img src="images/password.jpg" class="img-fluid img-pass rounded" alt="Адаптивные изображения">
        <img src="images/<?php echo (date('s') % 2 == 0) ? 'password-2' : 'o-password-facebook'; ?>.jpg" class="img-fluid img-pass rounded" alt="Адаптивные изображения">

        <?php
        function generate_random_ANCII() {
            $random = rand(48, 83);
            if ($random >= 58) {
                $random += 7;
                if (rand(0, 1) === 0)
                    $random += 32;
            }
            return chr($random);
        }

        function generate_password($size) {
            $pass = "";
            for($i = 0; $i < $size; $i++)
            {
                $pass .= generate_random_ANCII();
            }
            return $pass;
        }
        ?>

        <form method="post">
            <div class="form-group">
                <?php
                if ($_POST['number'] == null) {
                    echo '<label>Введите длину пароля</label>';
                    echo '<input type="text" name="number" class="form-control" placeholder="10">';
                } else {
                    echo 'Сгенерированный пароль: '.generate_password(intval($_POST['number']));
                }
                ?>
            </div>
            <button type="submit" class="btn btn-success mb-4"><?php echo ($_POST['number'] == null) ? 'Сгенерировать' : 'Повторить'; ?></button>
        </form>

        <table class="table">
            <thead class="thead-dark">
            <?php echo '
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                </tr>
                '?>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo 'Mark'?></td>
                    <td><?php echo 'Otto'?></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td><?php echo 'Jacob'?></td>
                    <td><?php echo 'Thornton'?></td>
                </tr>
            </tbody>
        </table>

        <h2 class="mt-3">Как работает онлайн генератор паролей?</h2>
        <p><b>Пароль</b> – это набор различных символов, как правило, латинского алфавита, которые могут иметь различный регистр (большие, маленькие буквы), дополняться цифрами и знаками препинания.</p>
        <p>Генератор случайных паролей, или по английски <b>random password generator</b> – это онлайн-программа, которая создает для вас уникальный пароль в соответствии с заданными параметрами.</p>

        <p>Так, с помощью нашего генератора надежных паролей вы сможете сгенерировать пароль длиной от 4 до 20 символов с буквами нижнего и верхнего регистра. Таким образом, чтобы создать пароль онлайн с помощью генератора паролей, вам необходимо:</p>

        <ul>
            <li>выбрать длину пароля;</li>
            <li>нажать на кнопку «Генерировать».</li>
        </ul>
        <p>Теперь генератор сложных паролей закончил свою работу и вы можете скопировать пароль и использовать его для регистрации в какой-либо системе или для замены старого пароля в ней.</p>

        <h2>Как сгенерировать максимально надежный пароль?</h2>
        <p>Почему так важно сделать пароль максимально разнообразным? Чем более сложным является набор символов в пароле, тем сложнее хакерам будет его подобрать. Дело в том, что хакеры не ломают голову самостоятельно над подбором пароля, а используют специальные программы-взломщики, которые генерируют различные комбинации в автоматическом режиме. Чем сложнее ваш пароль, тем дольше программа будет искать эту комбинацию.</p>

        <p>Как работает программа по подбору паролей</p>

        <p>Программа по подбору паролей, взлом паролей - как происходитТак, специальная программа на первом этапе своей работы расшифровывает простые пароли – длиной от 1 до 6 символов, которые включают в себя 26 латинских букв обоих регистров, 10 цифр и 33 других символов. Все эти 95 символов предлагают сравнительно небольшое количество комбинаций, которые обычный персональный компьютер способен обработать за несколько минут. Удлините пароль до 8 символов – и компьютеру придется поработать уже несколько дней. Еще несколько символов заставит метод обычного подбора работать годами. <b>Самыми надежными считаются ключи длиной 11-12 символов в разных регистрах, с использованием цифр и прочих символов.</b></p>

        <p>Однако недостаточно просто сделать пароль разнообразным. Как показывает практика, даже разнообразные пароли, придуманные людьми, подвержены взломам. Гораздо надежнее работает именно софт, то есть специальный генератор паролей онлайн, который не использует в своей работе шаблоны. Вероятность расшифровки такого пароля будет ничтожна мала. Чаще меняйте пароли к своим аккаунтам и не используйте один и тот же пароль для доступа к разным сервисам.</p>
    </div>
</main>

<?php include 'modules/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
