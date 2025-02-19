<?php
require_once '../Models/User.php';

try {
    switch ($_POST['action']) {
        case 'register':
            register();
            break;
        case 'login':
            login();
            break;
        case 'update':
            echo('');
            break;
        case 'delete':
            echo('a');
            break;
        default:
            echo('Invalid Action');
            break;

    }
} catch (exception $e) {
//    throw $e;
    var_dump($e->getMessage());
}
function register()
{
    try {
        $my_user = new User($_POST['nom'], $_POST['prenom'], $_POST['email']);
        $my_user->setPassword($_POST['password']);
        $my_user->setAvatar(isset($_POST['avatar']) ? $_POST['avatar'] : null);
        $my_user->setDroits(isset($_POST['droits']) ? $_POST['droits'] : 1);
        $userManager = new UserManager();
        $result = $userManager->add($my_user);
        if($result instanceof User){
            $_SESSION['user'] = $result;
            var_dump($result);
            var_dump($_SESSION['user']);
            var_dump($_SESSION);
            header("Location: /account");
//            die();
        } else {
            var_dump($result);
        }
    } catch (exception $e) {
        echo $e;
    }
}

function login(){
    try {
        $userManager = new UserManager();
        $user = $userManager->login($_POST['email']);
        $_SESSION['user'] = $user;
        var_dump($user);
//        sleep(1);
//        header("Location: /account");
//        die();
        //Amélioration possible en sécurité au dessus.
    } catch(exception $e) {
        echo($e);
    }
}

?>


