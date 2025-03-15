
<?php
try {
    $user = 'root';
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=test_exam;charset=utf8';
    //$dbh = new PDO('mysql:host=127.0.0.1;dbname=test_exam', 'root', '');

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
        case '/prices':
            require __DIR__ . $viewDir . 'PricesView.php';
            break;
        case '/unlogged':
            require __DIR__ . $viewDir . 'UnloggedView.php';
            break;
        case '/admin':
            require __DIR__ . $viewDir . '/Admin/AdminView.php';
            break;
        case '/admin/user':
            require __DIR__ . $viewDir . '/Admin/AdminUtilisateurView.php';
            break;
        case '/admin/user/edit/':
            require __DIR__ . $viewDir . '/Admin/AdminUtilisateurEdit.php';
            break;
        case '/admin/prix':
            require __DIR__ . $viewDir . '/Admin/AdminPrixView.php';
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
