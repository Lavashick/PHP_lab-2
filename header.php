<header>
    <nav class="navbar">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="" height=80 class="d-inline-block align-text-top">
            </a>
            <a class="navbar" href="/?html_type=TABLE<?php if (isset($content)) echo '&content=' . $content ?>">
                Табличная верстка
            </a>

            <a class="navbar" href="/?html_type=DIV<?php if (isset($content)) echo '&content=' . $content; ?>">
                Блочная верстка
            </a>
            
            <form class="d-flex signature">
                Сметанина Александра<br>
                Группа: 201-321 <br>
                Лабораторная: 5
            </form>

        </div>
    </nav>
</header>