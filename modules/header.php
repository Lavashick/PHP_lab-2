<?php

$arr = array(
    "Главная" => "index.php",
    "Игра \"угадай число\"" => "guess-game.php",
    "Генератор паролей" => "password-generator.php"
);

?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark main-menu">
    <a class="navbar-brand" href="index.php">Лабораторная А-1</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            foreach ( $arr as $title => $file )
            {
                // Взятие ссылки на текущий файл, работа с его именем 
                $isCurrentFile = basename($_SERVER['PHP_SELF']) == $file;
                $ref = (!$isCurrentFile) ? $file : '#';
                $a = '<li class="nav-item';
                if($isCurrentFile == $file)
                    $a .= ' active';
                $a .= '">';
                $a .= '<a class="nav-link" href="'.$ref.'">';
                $a .= $title.'</a></li>';
                echo $a;
            }
            ?>
        </ul>
    </div>
</nav>
