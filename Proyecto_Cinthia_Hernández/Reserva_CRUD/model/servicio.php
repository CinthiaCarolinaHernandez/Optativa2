<?php


class servicio {
    
    private $id_servicios;
    private $tipo_servicio;
    private $costo_servicio;
    
    function __construct($id_servicios, $tipo_servicio, $costo_servicio) {
        $this->id_servicios = $id_servicios;
        $this->tipo_servicio = $tipo_servicio;
        $this->costo_servicio = $costo_servicio;
    }
    
    function getId_servicios() {
        return $this->id_servicios;
    }

    function getTipo_servicio() {
        return $this->tipo_servicio;
    }

    function getCosto_servicio() {
        return $this->costo_servicio;
    }

    function setId_servicios($id_servicios) {
        $this->id_servicios = $id_servicios;
    }

    function setTipo_servicio($tipo_servicio) {
        $this->tipo_servicio = $tipo_servicio;
    }

    function setCosto_servicio($costo_servicio) {
        $this->costo_servicio = $costo_servicio;
    }

        
    //put your code here
}
