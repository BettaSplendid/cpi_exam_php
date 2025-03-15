<?php
require_once 'Controllers/DatabaseConnector.php';


function getAllPrestations(){
    $prestations = [];
    $req = connectToDatabase()->query('SELECT * FROM prestation');
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
        $prestations[] = $donnees;
    }
    return $prestations;
};

function getAllPrestationsById($id_number){
    $prestations = [];
    $prestationsList = getAllPrestations();
    foreach ($prestationsList as $presta) {
        if($presta['id_prestation'] == $id_number){
            $prestations = $presta;
        }
    }
    return $prestations;
}

function createPrestation($id_prestation,  $prestation_description)
{
    $req = $this->dbConnect()->prepare(
        'INSERT INTO prestation(id_prestation, type_prestation) VALUES(:prestation,:description)');
    $req->bindValue(':prestation', $id_prestation, PDO::PARAM_STR);
    $req->bindValue(':description', $prestation_description, PDO::PARAM_STR);
    return $req->execute();
}

function deletePrestation($id_prestation){
    $stmt = $this->connectToDatabase()->prepare('SELECT * FROM prestation WHERE id_prestation = ?');
    $stmt->execute($id_prestation);
    $prestation = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$prestation){
        return;
    }
    $stmt = $this->connectToDatabase()->prepare('DELETE FROM prestation WHERE id_prestation = ?');
    $stmt->execute($id_prestation);
}