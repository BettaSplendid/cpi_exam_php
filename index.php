<?php
try {
    $user = 'root';
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
    $dbh = new PDO($dsn, $user, $password);

} catch (PDOException $e) {
    // tenter de réessayer la connexion après un certain délai, par exemple
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test PHP</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<main>
    <div class="container">
        <h1>Exam PHP - Thomas BERARD</h1>
        <form action="animal.php" method="POST">
            <label for="name">Le nom de ton animal</label>
            <input name="name" type="text">
            <br>
            <label for="size">Taille de ton animal</label>
            <select name="size" id="pet-select">
                <option value="">----</option>
                <option value="puce">puce</option>
                <option value="souris">souris</option>
                <option value="chat">chat</option>
                <option value="chien">chien</option>
                <option value="humain">humain</option>
                <option value="cheval">cheval</option>
                <option value="hippopotame">hippopotame</option>
            </select>
            <br>
            <label for="rank">Le rang dans Super Street Fighter II X: Grand Master Challenge!</label>
            <input name="rank" type="number">
            <br>
            <button type="submit">Envoyer!</button>
        </form>
    </div>
</main>
</body>
</html>
