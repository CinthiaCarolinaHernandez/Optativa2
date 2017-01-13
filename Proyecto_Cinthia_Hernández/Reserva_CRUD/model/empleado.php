<?php

class empleado {

    private $id_empleados;
    private $cargo;
    private $nombre_emp;
    private $apellido_emp;

    function __construct($id_empleados, $cargo, $nombre_emp, $apellido_emp) {
        $this->id_empleados = $id_empleados;
        $this->cargo = $cargo;
        $this->nombre_emp = $nombre_emp;
        $this->apellido_emp = $apellido_emp;
    }

    function getId_empleados() {
        return $this->id_empleados;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getNombre_emp() {
        return $this->nombre_emp;
    }

    function getApellido_emp() {
        return $this->apellido_emp;
    }

    function setId_empleados($id_empleados) {
        $this->id_empleados = $id_empleados;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setNombre_emp($nombre_emp) {
        $this->nombre_emp = $nombre_emp;
    }

    function setApellido_emp($apellido_emp) {
        $this->apellido_emp = $apellido_emp;
    }

}
