<?php

include_once 'Database.php';
include_once 'cliente.php';
include_once 'habitacion.php';
include_once 'reserva_cabecera.php';
include_once 'reserva_detalle.php';
include_once 'empleado.php';
//include_once 'servicios.php';

class ReservaModel {



//    public function getReserva($id_reserva) {
//        //obtenemos la informacion de la bdd:
//        $pdo = Database::connect();
//        $sql = "select * from reserva where id_reserva=?";
//        $consulta = $pdo->prepare($sql);
//        $consulta->execute(array($id_reserva));
//        //obtenemos el registro especifico:
//        $res = $consulta->fetch(PDO::FETCH_ASSOC);
//        $reserva = new reserva($res['id_cliente'], $res['id_empleados'], $res['id_habitacion'], $res['id_reserva'], $res['fecha_inicio'], $res['fecha_fin'], $res['valor_total']);
//        Database::disconnect();
//        //retornamos el objeto encontrado:
//        return $reserva;
//    }
  
 public function eliminarDetalle($listareservadet,$idServicio,$subtotal){
        //buscamos el producto:
        var_dump($listareservadet);
        $cont=0;
        foreach ($listareservadet as $det) {
            if(($det->getId_Servicio()==$idServicio)&&($det->getSubtotal()==$subtotal)){
                unset($listareservadet[$cont]);
                //reindexamos el array para eliminar el lugar vacio:
                $listareservadet=  array_values($listareservadet);
                break;
            }
            $cont++;
        }
        return $listareservadet;
    }
    //insertar cliente
public function adicionarDetalle($listareservadet,$id_servicio,$id_habitacion,$cantidad){
        if($cantidad<=0){
            throw new Exception ("La cantidad debe ser mayor a cero.");
        }
        //buscamos el producto:
        $crudModel=new CrudModel();
       $habitacion=$crudModel->getHabitacion($id_habitacion);
        $servicio=$crudModel->getServicio($id_servicio);
        //creamos un nuevo detalle FacturaDet:
        $reservaDet=new reserva_detalle();
        $reservaDet->setId_servicio($servicio ->getId_servicios());
        $reservaDet->setNombre($servicio ->getTipo_servicio());
        $reservaDet->setPrecio($servicio->getCosto_servicio());
        $reservaDet->setPersonas($cantidad);
        $reservaDet->setIva((($servicio->getCosto_servicio())*$cantidad)*0.12);
        $reservaDet->setSubtotal(((($servicio->getCosto_servicio())*$cantidad)+((($servicio->getCosto_servicio())*$cantidad)*0.12))+($habitacion->getValor()));
        //adicionamos el nuevo detalle al array en memoria:
        if(!isset($listareservadet)){
            $listareservadet=array();
        }
        array_push($listareservadet,$reservaDet);
        return $listareservadet;
    }
    //////////////////////////probando///////
    /////////////////////////////////////////////////
    //////////////////
    public function guardarReservacion($listareservadet, $id_cliente, $id_empleado,$id_habitacion){
        if(!isset($listareservadet)){
            throw new Exception("Debe por lo menos registrar un producto.");
        }
        if(count($listareservadet)==0){
            throw new Exception("Debe por lo menos registrar un producto.");
        }
        if(!isset($id_cliente)){
            throw new Exception("Debe seleccionar el cliente.");
        }
        //obtenemos los datos completos del cliente:
        $crudModel=new CrudModel();
        $cliente=$crudModel->getCliente($id_cliente);
        $empleado=$crudModel->getEmpleado($id_empleado);
        $habitacion=$crudModel->getHabitacion($id_habitacion);
        //creamos la nueva factura:
        $reservaCab = new reserva_cabecera();
        $reservaCab->setId_cliente($cliente->getApellido()." ".$cliente->getNombre());
        $reservaCab->setId_empleado($empleado->getNombre_emp()." ".$empleado->getApellido_emp());
        $reservaCab->setId_habitacion($habitacion->getTipo_habitacion());
        $reservaCab->setFechareserva(date('Y-m-d'));
        $reservaCab->setTotal(($this->calcularTotal($listareservadet))+($habitacion->getValor())+$this->calcularIva($listareservadet));
        //obtenemos el siguiente numero de factura:
        $reservaCab->setId_cab($this->ultimoNumeroReservacion()+1);
        //guardar la cabecera:
        $pdo = Database::connect();
        $sql = "insert into reserva_cabecera(id_cab,id_cliente,id_empleado,id_habitacion, fechareserva,total) values(?,?,?,?,?,?)";
       
        $consulta = $pdo->prepare($sql);
         
        //Ejecutamos y pasamos los parametros:
        try {
            $s=$consulta->execute(array($reservaCab->getId_cab(),
                                     $reservaCab->getId_cliente(),
                                     $reservaCab->getId_empleado(),
                                     $reservaCab->getId_habitacion(),
                                     $reservaCab->getFechareserva(),
                                     $reservaCab->getTotal()));
       
            //guardamos los detalles:
            foreach ($listareservadet as $det){
                $sql = "insert into reserva_detalle(id_cab,id_servicio,nombre,precio,personas,iva,subtotal) values(?,?,?,?,?,?,?)";
                $consulta = $pdo->prepare($sql);
                //en cada detalle asignamos el numero de factura padre:
                $consulta->execute(array($reservaCab->getId_cab(),
                                     $det->getId_servicio(),
                                     $det->getNombre(),
                                     $det->getPrecio(),
                                     $det->getPersonas(),
                                     $det->getIva(),
                                     $det->getSubtotal()));
            }
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
        return $reservaCab;
    }
    
      public function calcularIva($listareservadet){
        if(!isset($listareservadet)){
            return 0;
        }
        $iva=0;
        foreach ($listareservadet as $reservaDet) {
            if($reservaDet->getIva()>0){
                $iva+=$reservaDet->getIva();
            }
        }
        return round($iva,2);
    }
    
    public function calcularTotal($listareservadet){
        if(!isset($listareservadet)){
            return 0;
        }
        $total= $this->calcularSubtotal($listareservadet) +
                $this->calcularIva($listareservadet);
        return  $total;
    }
    
     public function calcularSubtotal($listareservadet){
        if(!isset($listareservadet)){
            return 0;
        }
        $subtotal=0;
        foreach ($listareservadet as $reservaDet) {
               $subtotal+=$reservaDet->getSubtotal();
            
        }
        return $subtotal;
    }
    
     public function ultimoNumeroReservacion(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select max(id_cab) numero from reserva_cabecera";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        //obtenemos el registro especifico:
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $numero=$res['numero'];
        Database::disconnect();
        //retornamos el numero encontrado:
        if(!isset($numero))
            return 0;
        return $numero;
    }
 
    
      public function getReservas() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from reserva_cabecera";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listadoreserva = array();
        foreach ($resultado as $res) {
            $reserva = new reserva_cabecera($res['id_cab'], $res['id_cliente'], $res['id_empleado'], $res['id_habitacion'], $res['fechareserva'],$res['total']);
            array_push($listadoreserva, $reserva);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listadoreserva;
    }
} 