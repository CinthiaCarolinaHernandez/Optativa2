<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/CrudModel.php';
require_once '../model/ReservaModel.php';
session_start();
//instanciamos los objetos de negocio:
$crudModel = new CrudModel();
$reservaModel = new ReservaModel();
//recibimos la opcion desde la vista:
$opcion = $_REQUEST['opcion'];
$mensajeError = "";
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensajeError']);
switch ($opcion) {

    //////////CLIENTES////
    ////////

    case "listar_clientes":
        //obtenemos la lista:
        $listadoCliente = $crudModel->getClientes();
        //y los guardamos en sesion:
        $_SESSION['listadoCliente'] = serialize($listadoCliente);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/clientes.php');
        break;


    case "crear_cliente":
        //obtenemos los parametros del formulario:
        $id_cliente = $_REQUEST['id_cliente'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $direccion = $_REQUEST['direccion'];
        $celular = $_REQUEST['celular'];
        //creamos el nuevo registro:
        $crudModel->insertarCliente($id_cliente, $nombre, $apellido, $direccion, $celular);
        //actualizamos el listado:
        $listadoCliente = $crudModel->getClientes();
        //y los guardamos en sesion:
        $_SESSION['listadoCliente'] = serialize($listadoCliente);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/clientes.php');
        break;

    case "editar_cliente":
        //obtenemos los parametros del formulario:
        $id_cliente = $_REQUEST['id_cliente'];
        //Buscamos los datos
        $cliente = $crudModel->getCliente($id_cliente);
        //guardamos en sesion para edicion posterior:
        $_SESSION['cliente'] = serialize($cliente);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editar.php');
        break;

    case "actualizar_cliente":
        //obtenemos los parametros del formulario:
        $id_cliente = $_REQUEST['id_cliente'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $direccion = $_REQUEST['direccion'];
        $celular = $_REQUEST['celular'];

        //actualizamos la factura:
        $crudModel->actualizarCliente($id_cliente, $nombre, $apellido, $direccion, $celular);
        //actualizamos lista de facturas:
        $listadoCliente = $crudModel->getClientes();
        $_SESSION['listadoCliente'] = serialize($listadoCliente);
        header('Location: ../view/clientes.php');
        break;

    case "eliminar_cliente":
        //obtenemos el codigo del producto a eliminar:
        $id_cliente = $_REQUEST['id_cliente'];
        //eliminamos el producto:
        $crudModel->eliminarCliente($id_cliente);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoCliente = $crudModel->getClientes();
        $_SESSION['listadoCliente'] = serialize($listadoCliente);
        header('Location: ../view/clientes.php');
        break;


    //////////EMPLEADOS////
    ////////

    case "listar_empleados":
        //obtenemos la lista:
        $listadoEmpleado = $crudModel->getEmpleados();
        //y los guardamos en sesion:
        $_SESSION['listadoEmpleado'] = serialize($listadoEmpleado);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/empleados.php');
        break;


    case "crear_empleados":
        //obtenemos los parametros del formulario:
        $id_empleados = $_REQUEST['id_empleados'];
        $cargo = $_REQUEST['cargo'];
        $nombre_emp = $_REQUEST['nombre_emp'];
        $apellido_emp = $_REQUEST['apellido_emp'];

        //creamos el nuevo registro:
        $crudModel->insertarEmpleado($id_empleados, $cargo, $nombre_emp, $apellido_emp);
        //actualizamos el listado:
        $listadoEmpleado = $crudModel->getEmpleados();
        //y los guardamos en sesion:
        $_SESSION['listadoEmpleado'] = serialize($listadoEmpleado);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/empleados.php');
        break;

    case "editar_empleados":
        //obtenemos los parametros del formulario:
        $id_empleados = $_REQUEST['id_empleados'];
        //Buscamos los datos
        $empleado = $crudModel->getEmpleado($id_empleados);
        //guardamos en sesion para edicion posterior:
        $_SESSION['empleado'] = serialize($empleado);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editarEmpleado.php');
        break;

    case "actualizar_empleados":
        //obtenemos los parametros del formulario:
        $id_empleados = $_REQUEST['id_empleados'];
        $cargo = $_REQUEST['cargo'];
        $nombre_emp = $_REQUEST['nombre_emp'];
        $apellido_emp = $_REQUEST['apellido_emp'];
        //actualizamos la factura:
        $crudModel->actualizarEmpleado($id_empleados, $cargo, $nombre_emp, $apellido_emp);
        //actualizamos lista de facturas:
        $listadoEmpleado = $crudModel->getEmpleados();
        $_SESSION['listadoEmpleado'] = serialize($listadoEmpleado);
        header('Location: ../view/empleados.php');
        break;

    case "eliminar_empleados":
        //obtenemos el codigo del producto a eliminar:
        $id_empleados = $_REQUEST['id_empleados'];
        //eliminamos el producto:
        $crudModel->eliminarEmpleado($id_empleados);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoEmpleado = $crudModel->getEmpleados();
        $_SESSION['listadoEmpleado'] = serialize($listadoEmpleado);
        header('Location: ../view/empleados.php');
        break;


    ///////////////////////////
    //////////////////////////
    /////////SERVICIOS/////////
    //////////


     case "listar_servicio":
        //obtenemos la lista:
        $listadoServicio = $crudModel->getServicios();
        //y los guardamos en sesion:
        $_SESSION['listadoServicio'] = serialize($listadoServicio);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/servicios.php');
        break;


    case "crear_servicio":
        //obtenemos los parametros del formulario:
        $id_servicios = $_REQUEST['id_servicios'];
        $tipo_servicio = $_REQUEST['tipo_servicio'];
        $costo_servicio = $_REQUEST['costo_servicio'];
    //creamos el nuevo registro:
        $crudModel->insertarServicio($id_servicios, $tipo_servicio, $costo_servicio);
        //actualizamos el listado:
        $listadoServicio = $crudModel->getServicios();
        //y los guardamos en sesion:
        $_SESSION['listadoServicio'] = serialize($listadoServicio);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/servicios.php');
        break;

    
     ///////////////////////////
    //////////////////////////
    /////////HABITACIONES/////////
    ////////////////////////
    //////////////////////////


     case "listar_habitacion":
        //obtenemos la lista:
        $listadoHabitacion = $crudModel->getHabitaciones();
        //y los guardamos en sesion:
        $_SESSION['listadoHabitacion'] = serialize($listadoHabitacion);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/habitaciones.php');
        break;


    case "crear_habitacion":
        //obtenemos los parametros del formulario:
        $id_habitacion = $_REQUEST['id_habitacion'];
        $tipo_habitacion = $_REQUEST['tipo_habitacion'];
        $caracteristicas= $_REQUEST['caracteristicas'];
        $valor= $_REQUEST['valor'];
    //creamos el nuevo registro:
        $crudModel->insertarHabitacion($id_habitacion, $tipo_habitacion, $caracteristicas, $valor);
        //actualizamos el listado:
        $listadoHabitacion = $crudModel->getHabitaciones();
        //y los guardamos en sesion:
        $_SESSION['listadoHabitacion'] = serialize($listadoHabitacion);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/habitaciones.php');
        break;

     ///////////////////////////
    //////////////////////////
    /////////RESERVACIONES/////////
    ////////////////////////
    //////////////////////////
    case "listar_reserva":
        //obtenemos la lista:
        $listadoReserva = $reservaModel->getReservaciones();
        //y los guardamos en sesion:
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/reservas.php');
        break;


    case "crear_reserva":
        //obtenemos los parametros del formulario:
        $id_cliente = $_REQUEST['id_cliente'];
        $id_empleados = $_REQUEST['id_empleados'];
        $id_habitacion = $_REQUEST['id_habitacion'];
        $id_reserva = $_REQUEST['id_reserva'];
        $fecha_inicio = $_REQUEST['fecha_inicio'];
        $fecha_fin = $_REQUEST['fecha_fin'];
        $valor_total = $_REQUEST['valor_total'];
    //creamos el nuevo registro:
        $reservaModel->insertarReserva($id_cliente, $id_empleados, $id_habitacion, $id_reserva, $fecha_inicio, $fecha_fin, $valor_total);
        //actualizamos el listado:
        $listadoReserva = $reservaModel->getReservaciones();
        //y los guardamos en sesion:
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/reservas.php');
        break;
/////////////////detalle/////////
    
     case "adicionar_detalle":
        //obtenemos los parametros del formulario:
        $id_servicio=$_REQUEST['id_servicio'];
        
         $id_habitacion=$_REQUEST['id_habitacion'];
         $cantidad=$_REQUEST['cantidad'];
        if(!isset($_SESSION['listareservadet'])){
            $listareservadet=array();
        }else{
            $listareservadet=unserialize($_SESSION['listareservadet']);
        }
        try{
            $listareservadet=$reservaModel->adicionarDetalle($listareservadet, $id_servicio,$id_habitacion, $cantidad);
         
            $_SESSION['listareservadet']=serialize($listareservadet);
        }catch(Exception $e){
            $mensajeError=$e->getMessage();
            $_SESSION['mensajeError']=$mensajeError;
        }
        header('Location: ../view/reservas.php');
        break;
        
        case "eliminar_detalle":
        //obtenemos los parametros del formulario:
        $idServicio=$_REQUEST['idServicio'];
        $subtotal=$_REQUEST['subtotal'];
        
        $listareservadet=unserialize($_SESSION['listareservadet']);
        $listareservadet=$reservaModel->eliminarDetalle($listareservadet, $idServicio,$subtotal);
        $_SESSION['listareservadet']=serialize($listareservadet);
        header('Location: ../view/reservas.php');
        break;

        case "guardar_reservacion":
        //obtenemos los parametros del formulario:
        $id_cliente=$_REQUEST['id_cliente'];
        $id_empleado=$_REQUEST['id_empleado'];
        $id_habitacion=$_REQUEST['id_habitacion'];
     
        if(isset($_SESSION['listareservadet'])){
            $listareservadet=unserialize($_SESSION['listareservadet']);
         
            try {
                $reservaCab=$reservaModel->guardarReservacion(
                        $listareservadet, $id_cliente, $id_empleado,$id_habitacion);
                $_SESSION['reservaCab']=$reservaCab;
                header('Location: ../view/rep.php');
                break;
            } catch (Exception $e) {
                $mensajeError=$e->getMessage();
                $_SESSION['mensajeError']=$mensajeError;
            }
        }
      
        header('Location: ../view/reservas.php');
        break;
     
       
        case "listar_reservas":
        //obtenemos la lista de facturas y subimos a sesion:
        $_SESSION['listaReservas']=serialize($reservaModel->getReservas());
        header('Location: ../view/listado.php');
        break;
    default:
        
//          case "listar_clientes":
//        //obtenemos la lista:
//        $$listadoreserva = $reservaModel->getReservas();
//        //y los guardamos en sesion:
//        $_SESSION['$listadoreserva'] = serialize(listadoCliente);
//        //redireccionamos a una nueva pagina para visualizar:
//        header('Location: ../view/listado.php');
//        break;

        
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}