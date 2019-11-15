<?php
class Empleado {
    private $id;
    private $nombre;
    private $email;
    
    function __construct($id, $nombre, $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getID() {
        return $this->id;
    }
}