<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reserva_detalle
 *
 * @author Cinthy
 */
class reserva_detalle {
    private $id_det;
    private $id_cab;
    private $id_servicio;
    private $nombre;
    private $precio;
    private $personas;
    private $iva;
    private $subtotal;
    
    public function __construct($id_det, $id_cab, $id_servicio, $nombre, $precio, $personas) {
        $this->id_det = $id_det;
        $this->id_cab = $id_cab;
        $this->id_servicio = $id_servicio;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->personas = $personas;
        $this->iva = ($precio*$personas)*0.12;
        $this->subtotal = ($precio*$personas)+$iva;
    }

    function getId_det() {
        return $this->id_det;
    }

    function getId_cab() {
        return $this->id_cab;
    }

    function getId_servicio() {
        return $this->id_servicio;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getPersonas() {
        return $this->personas;
    }

    function getIva() {
        return $this->iva;
    }

    function getSubtotal() {
        return $this->subtotal;
    }

    function setId_det($id_det) {
        $this->id_det = $id_det;
    }

    function setId_cab($id_cab) {
        $this->id_cab = $id_cab;
    }

    function setId_servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setPersonas($personas) {
        $this->personas = $personas;
    }

    function setIva($iva) {
        $this->iva = $iva;
    }

    function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }


}
