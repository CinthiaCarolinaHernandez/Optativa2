<?php

class cliente {

    private $id_cliente;
    private $nombre;
    private $apellido;
    private $direccion;
    private $celular;
    
    function __construct($id_cliente, $nombre, $apellido, $direccion, $celular) {
        $this->id_cliente = $id_cliente;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->celular = $celular;
    }


    

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCelular() {
        return $this->celular;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }




}
