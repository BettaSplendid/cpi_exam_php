<?php

use UserClasses\User;

require_once 'DatabaseConnector.php';

var_dump($_POST);
//$test = $_POST['userID'];
if (isset($_POST['action']))
    switch ($_POST['action']) {
        case 'register':
            registerUser();
            break;
        case 'login':
            UserLogin();
            break;
        case 'update':
            SendToUpdatePage($_POST['userID']);
            break;
        case 'delete':
            echo('a');
            break;
        default:
            echo('Invalid Action');
            break;
    }

function registerUser()
{
    try {
        $my_user = new UserClasses\User($_POST['nom'], $_POST['prenom'], $_POST['email']);
        $my_user->setPassword($_POST['password']);
        $my_user->setAvatar(isset($_POST['avatar']) ? $_POST['avatar'] : null);
        $my_user->setDroits(isset($_POST['droits']) ? $_POST['droits'] : 1);
        $userManager = new UserClasses\UserManager();
        $result = $userManager->add($my_user);
        if ($result instanceof UserClasses\User) {
            $_SESSION = null;
            redirectToMyPage("account");
        } else {
            var_dump($result);
        }
    } catch (exception $e) {
        echo $e;
    }
}

function UserLogin()
{
    try {
        $userManager = new UserClasses\UserManager();
        $LoginUser = $userManager->login($_POST['email']);
        $_SESSION = null;
        $_SESSION['UserId'] = $LoginUser->getIdUsers();
        $_SESSION['UserPrenom'] = $LoginUser->getPrenom();
        $_SESSION['UserNom'] = $LoginUser->getNom();
        $_SESSION['UserEmail'] = $LoginUser->getMail();
        $_SESSION['UserAvatar'] = $LoginUser->getAvatar();
        $_SESSION['UserDroits'] = $LoginUser->getDroits();
        redirectToMyPage("account");
        //Amélioration possible en sécurité au dessus.
    } catch (exception $e) {
        echo($e);
    }
}

function SendToUpdatePage($userID)
{;

    var_dump($userID);
    redirectToMyPage("account");
}

function redirectToMyPage($mypagelocation)
{
    header("Location : /" . $mypagelocation);
}

function getAllUsers()
{
    $prestations = [];
    $req = connectToDatabase()->query('SELECT * FROM users');
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
        $prestations[] = $donnees;
    }
    return $prestations;
}