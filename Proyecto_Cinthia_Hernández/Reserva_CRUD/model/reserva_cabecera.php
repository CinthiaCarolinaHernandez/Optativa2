<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reserva_cabecera
 *
 * @author Cinthy
 */
class reserva_cabecera {
    private $id_cab;
    private $id_cliente;
    private $id_empleado;
    private $id_habitacion;
    private $fechareserva;
    private $iva;
    private $total;
    
    function __construct($id_cab, $id_cliente, $id_empleado, $id_habitacion, $fechareserva, $total) {
        $this->id_cab = $id_cab;
        $this->id_cliente = $id_cliente;
        $this->id_empleado = $id_empleado;
        $this->id_habitacion = $id_habitacion;
        $this->fechareserva = $fechareserva;
        $this->total = $total;
    }

    
    function getId_cab() {
        return $this->id_cab;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getId_empleado() {
        return $this->id_empleado;
    }

    function getId_habitacion() {
        return $this->id_habitacion;
    }

    function getFechareserva() {
        return $this->fechareserva;
    }

    function getTotal() {
        return $this->total;
    }
    
    function getIva() {
        return $this->iva;
    }

    function setId_cab($id_cab) {
        $this->id_cab = $id_cab;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }

    function setId_habitacion($id_habitacion) {
        $this->id_habitacion = $id_habitacion;
    }

    function setFechareserva($fechareserva) {
        $this->fechareserva = $fechareserva;
    }

    function setTotal($total) {
        $this->total = $total;
    }
    
    function setIva($iva) {
        $this->iva = $iva;
    }
 
}
