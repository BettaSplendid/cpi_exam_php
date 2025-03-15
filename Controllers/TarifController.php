<?php /** @noinspection ALL */
require_once 'Controllers/DatabaseConnector.php';

function getAllTarifs()
{
    $prices = [];
    $req = connectToDatabase()->query('SELECT * FROM Tarif');
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
        $prices[] = $donnees;
    }
    return $prices;
}

;

function getAllTarifsByCategory($category_number)
{
    $prices = getAllTarifs();
    $valid_prices = [];
    foreach ($prices as $individual_price) {
        if ($individual_price['id_categorie'] == $category_number) {
            $valid_prices[] = $individual_price;
        }
    }
    return $valid_prices;
}
function createTarif($id_prestation, $id_categorie, $prix)
{
    $req = $this->dbConnect()->prepare(
        'INSERT INTO tarif(id_prestation, id_categorie, prix, password) VALUES(:prestation,:categorie, :prix)');
    $req->bindValue(':prestation', $id_prestation, PDO::PARAM_STR);
    $req->bindValue(':categorie', $id_categorie, PDO::PARAM_STR);
    $req->bindValue(':prix', $prix, PDO::PARAM_STR);
    return $req->execute();
}

function deleteTarif($id_prestation, $id_categorie){
    $stmt = $pdo->prepare('SELECT * FROM tarif WHERE id_prestation = ? AND id_categorie = ?');
    $stmt->execute($id_prestation, $id_categorie);
    $tarif = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$tarif){
        return;
    }
    $stmt = $pdo->prepare('DELETE FROM tarif WHERE id_prestation = ? AND id_categorie = ?');
    $stmt->execute($id_prestation, $id_categorie);
}