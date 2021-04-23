<!doctype html>
<html lang="en" class="h-100">

<head>
    <title>Сметанина, 201-321, lab_3</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="d-flex flex-column h-100">
    <?php include("header.php") ?>

    <main class="main-class">
        <?php include("main.php") ?>
        <main role="main" class="flex-shrink-0 mb-5">
    <?php
    if(!isset($STORE))
        $STORE = '';
    if(!isset($COUNT))
        $COUNT = 0;
    if(isset($_GET['count']))
        $COUNT = $_GET['count'] + 1;
    if(isset($_GET['store']))
        $STORE = $_GET['store'];
    if( isset($_GET['key']) )
    {
        if( $_GET['key'] == 'reset' )
            $STORE = '';
        else
            $STORE .= $_GET['key'];
    }
    ?>
    <div class="container">
        <div class="calc mt-5">
            <div class="result"><?php echo $STORE; ?></div>
            <div class="numbers">
                <?php
                $i = 1;
                do {
                    echo '<a href="'.'?key='.$i.'&store='.$STORE.'&count='.$COUNT.'" class="number-btn">'.$i.'</a>';
                    $i = ($i + 1) % 10;
                } while ($i != 1);
                ?>
            </div>
            <a <?php echo 'href="?key=reset&count='.$COUNT.'"' ?> class="reset-btn">СБРОС</a>
        </div>
    </div>
</main>
        
           




    </main>



    <?php include("footer.php") ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>