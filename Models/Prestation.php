<?php
class achat
{
    var $id_ticket;
    var $id_prestation;
    var $nombre;

    function __construct(
        $_id_ticket,$_id_prestation,$_nombre){
        $this->id_ticket = $_id_ticket;
        $this->id_prestation = $_id_prestation;
        $this->nombre = $_nombre;
    }
}