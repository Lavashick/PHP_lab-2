<footer>
    <nav class="navbar">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="" height=50 class="d-inline-block align-text-top">
            </a>

            <form class="d-flex signature">
                Тип верстки: <?php if ($_GET['html_type'] == "DIV") {
                    echo "div'ами";
                } 
                else if ($_GET['html_type'] == "TABLE") {
                    echo "таблица";
                }
                
                else {
                    echo 'не выбрано';
                } ?>
            </form>
        </div>
    </nav>
</footer>