<?php

class habitacion {
    
    private $id_habitacion;
    private $tipo_habitacion;
    private $caracteristicas;
    private $valor;
   
    function __construct($id_habitacion, $tipo_habitacion, $caracteristicas, $valor) {
        $this->id_habitacion = $id_habitacion;
        $this->tipo_habitacion = $tipo_habitacion;
        $this->caracteristicas = $caracteristicas;
        $this->valor = $valor;
    }
    function getId_habitacion() {
        return $this->id_habitacion;
    }

    function getTipo_habitacion() {
        return $this->tipo_habitacion;
    }

    function getCaracteristicas() {
        return $this->caracteristicas;
    }

    function getValor() {
        return $this->valor;
    }

    function setId_habitacion($id_habitacion) {
        $this->id_habitacion = $id_habitacion;
    }

    function setTipo_habitacion($tipo_habitacion) {
        $this->tipo_habitacion = $tipo_habitacion;
    }

    function setCaracteristicas($caracteristicas) {
        $this->caracteristicas = $caracteristicas;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }



}
