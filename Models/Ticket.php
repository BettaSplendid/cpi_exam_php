<?php

class ticket
{
    var $id_ticket;
    var $id_carte;
    var $date_achat;

    function __construct(
        $_id_ticket,$_id_carte,$_date_achat){
        $this->id_ticket = $_id_ticket;
        $this->id_carte = $_id_carte;
        $this->date_achat = $_date_achat;
    }
}