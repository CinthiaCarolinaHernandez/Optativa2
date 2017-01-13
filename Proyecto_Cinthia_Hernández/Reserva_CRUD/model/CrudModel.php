<?php

include_once 'Database.php';
include_once 'cliente.php';
include_once 'habitacion.php';
//include_once 'reserva.php';
include_once 'servicio.php';
include_once 'empleado.php';

class CrudModel {

    //////////////////////////
    ////CLIENTES:
    //////////////////////////

    public function getClientes() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from cliente order by id_cliente";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listadoCliente = array();
        foreach ($resultado as $res) {
            $cliente = new cliente($res['id_cliente'], $res['nombre'], $res['apellido'], $res['direccion'], $res['celular']);
            array_push($listadoCliente, $cliente);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listadoCliente;
    }

    public function getCliente($id_cliente) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from cliente where id_cliente=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_cliente));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $cliente = new cliente($res['id_cliente'], $res['nombre'], $res['apellido'], $res['direccion'], $res['celular']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $cliente;
    }

    //insertar cliente

    public function insertarCliente($id_cliente, $nombre, $apellido, $direccion, $celular) {
        $pdo = Database::connect();
        $sql = "insert into cliente(id_cliente,nombre,apellido,direccion,celular) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($id_cliente, $nombre, $apellido, $direccion, $celular));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //eliminar paciente
    //actualizar clientes

    public function actualizarCliente($id_cliente, $nombre, $apellido, $direccion, $celular) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update cliente set nombre=?,apellido=?,direccion=?,celular=? where id_cliente=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
            $consulta->execute(array($nombre, $apellido, $direccion, $celular, $id_cliente));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCliente($id_cliente) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from cliente where id_cliente=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:

        try {
            $consulta->execute(array($id_cliente));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

     //////////////////////////
    ////EMPLEADOS:
    //////////////////////////

    public function getEmpleados() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from empleado order by id_empleados";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listadoEmpleado = array();
        foreach ($resultado as $res) {
            $empleado = new empleado($res['id_empleados'], $res['cargo'], $res['nombre_emp'], $res['apellido_emp']);
            array_push($listadoEmpleado, $empleado);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listadoEmpleado;
    }

    public function getEmpleado($id_empleados) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from empleado where id_empleados=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_empleados));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $empleado = new empleado($res['id_empleados'], $res['cargo'], $res['nombre_emp'], $res['apellido_emp']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $empleado;
    }

    //insertar cliente

    public function insertarEmpleado($id_empleados, $cargo, $nombre_emp, $apellido_emp) {
        $pdo = Database::connect();
        $sql = "insert into empleado(id_empleados,cargo,nombre_emp,apellido_emp) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($id_empleados, $cargo, $nombre_emp, $apellido_emp));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

  
    //actualizar clientes

    public function actualizarEmpleado($id_empleados,$cargo, $nombre_emp, $apellido_emp) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update empleado set cargo=?,nombre_emp=?,apellido_emp=? where id_empleados=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
            $consulta->execute(array($cargo,$nombre_emp, $apellido_emp, $id_empleados));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    
  //eliminar clientes
    
    
    public function eliminarEmpleado($id_empleados) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from empleado where id_empleados=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:

        try {
            $consulta->execute(array($id_empleados));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //////////////////////////
    ////SERVICIOS:
    //////////////////////////

     public function getServicios() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from servicio order by id_servicios";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listadoServicio = array();
        foreach ($resultado as $res) {
            $servicio = new servicio($res['id_servicios'], $res['tipo_servicio'], $res['costo_servicio']);
            array_push($listadoServicio, $servicio);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listadoServicio;
    }

    public function getServicio($id_servicios) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from servicio where id_servicios=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_servicios));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $servicio = new servicio($res['id_servicios'], $res['tipo_servicio'], $res['costo_servicio']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $servicio;
    }

    //insertar servicio

    public function insertarServicio($id_servicios, $tipo_servicio, $costo_servicio) {
        $pdo = Database::connect();
        $sql = "insert into servicio(id_servicios,tipo_servicio,costo_servicio) values(?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($id_servicios, $tipo_servicio, $costo_servicio));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    ///////////////////////////////////
    ///////////HABITACIONES/////////////
     ///////////////////////////////////
    
    
      public function getHabitaciones() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from habitacion order by id_habitacion";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listadoHabitacion = array();
        foreach ($resultado as $res) {
            $habitacion = new habitacion($res['id_habitacion'], $res['tipo_habitacion'], $res['caracteristicas'], $res['valor']);
            array_push($listadoHabitacion, $habitacion);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listadoHabitacion;
    }

    public function getHabitacion($id_habitacion) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from habitacion where id_habitacion=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_habitacion));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $habitacion = new habitacion($res['id_habitacion'], $res['tipo_habitacion'], $res['caracteristicas'], $res['valor']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $habitacion;
    }

    //insertar cliente

    public function insertarHabitacion($id_habitacion, $tipo_habitacion, $caracteristicas,$valor) {
        $pdo = Database::connect();
        $sql = "insert into habitacion(id_habitacion,tipo_habitacion,caracteristicas,valor) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($id_habitacion, $tipo_habitacion, $caracteristicas,$valor));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
}
