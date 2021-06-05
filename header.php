<header>
    <nav class="navbar">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="" height=80 class="d-inline-block align-text-top">
            </a>

            <?php 
                if ($_GET['html_type'] == 'TABLE') {
                    $headerTableBold = "link-bold";
                } else {
                    $headerTableBold = "link";
                }

                if ($_GET['html_type'] == 'DIV') {
                    $headerDivBold = "link-bold";
                } else {
                    $headerDivBold = "link";
                }
            ?>
<p class="<?= $headerTableBold ?>">
            <a class="navbar " href="/?html_type=TABLE<?php if (isset($content)) echo '&content=' . $content;?>">
            Табличная верстка
                
            </a>
            </p>

            <p class="<?= $headerDivBold ?>">
            <a class="navbar " href="/?html_type=DIV<?php if (isset($content)) echo '&content=' . $content; ?>">
                Блочная верстка
            </a>
            </p> 
            
            <form class="d-flex signature">
                Сметанина Александра<br>
                Группа: 201-321 <br>
                Лабораторная: 5
            </form>

        </div>
    </nav>
</header>