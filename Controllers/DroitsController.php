<?php

require_once 'Controllers/DatabaseConnector.php';


function getAllDroits()
{
    $Droits = [];
    $req = connectToDatabase()->query('SELECT * FROM droit');
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
        $Droits[] = $donnees;
    }
    return $Droits;
}

;

function getAllDroitsById($id_number)
{
    $Droits = [];
    $DroitsList = getAllDroits();
    foreach ($DroitsList as $presta) {
        if ($presta['id_Droit'] == $id_number) {
            $Droits = $presta;
        }
    }
    return $Droits;
}

function createDroit($id_Droit, $Droit_description)
{
    $req = $this->dbConnect()->prepare(
        'INSERT INTO Droit(id_Droit, type_Droit) VALUES(:Droit,:description)');
    $req->bindValue(':Droit', $id_Droit, PDO::PARAM_STR);
    $req->bindValue(':description', $Droit_description, PDO::PARAM_STR);
    return $req->execute();
}

function deleteDroit($id_Droit)
{
    $stmt = $this->connectToDatabase()->prepare('SELECT * FROM Droit WHERE id_Droit = ?');
    $stmt->execute($id_Droit);
    $Droit = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$Droit) {
        return;
    }
    $stmt = $this->connectToDatabase()->prepare('DELETE FROM Droit WHERE id_Droit = ?');
    $stmt->execute($id_Droit);
}