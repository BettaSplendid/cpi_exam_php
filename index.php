<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Test PHP</title>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
<!--          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!--</head>-->
<!--<body>-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
<!--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"-->
<!--        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"-->
<!--        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"-->
<!--        crossorigin="anonymous"></script>-->
<!--<main>-->
<!--    <div class="container">-->
<!--        <h1>Exam PHP - Thomas BERARD</h1>-->
<!--        <hr>-->
<!--        <H2>Restaurant</H2>-->
<!--    </div>-->
<!--</main>-->
<!--</body>-->
<!--</html>-->
<?php
try {
    $user = 'root';
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=test_exam;charset=utf8';
    $dbh = new PDO($dsn, $user, $password);

//    echo "Connected successfully";

    $request = $_SERVER['REQUEST_URI'];
    $viewDir = '/views/';

    switch ($request) {
        case '':
        case '/':
            require __DIR__ . $viewDir . 'HomeView.php';
            break;

        case '/users':
            require __DIR__ . $viewDir . 'UsersView.php';
            break;

        case '/contact':
            require __DIR__ . $viewDir . 'ContactView.php';
            break;

        case '/login':
            require __DIR__ . $viewDir . 'LoginView.php';
            break;
        case '/subscribe':
            require __DIR__ . $viewDir . 'SubscribeView.php';
            break;
        case '/account':
            require __DIR__ . $viewDir . 'AccountView.php';
            break;
        default:
            http_response_code(404);
            require __DIR__ . $viewDir . '404View.php';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    throw new PDOException();
    // tenter de réessayer la connexion après un certain délai, par exemple
}
?>
