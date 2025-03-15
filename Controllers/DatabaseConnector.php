<?php
function connectToDatabase(){
    $user = 'root';
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=test_exam;charset=utf8';
    $dbh = new PDO($dsn, $user, $password);
    return $dbh;
};