<?php

class depot
{
    var $id_carte;
    var $date_depot;
    var $montant;

    function __construct(
        $_id_carte,$_date_depot,$_montant){
        $this->id_carte = $_id_carte;
        $this->date_depot = $_date_depot;
        $this->montant = $_montant;
    }
}