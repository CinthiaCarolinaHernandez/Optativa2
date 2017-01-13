<!DOCTYPE html>
<?php
include  '../model/CrudModel.php';
include '../model/ReservaModel.php';

require_once '../model/habitacion.php';
require_once '../model/cliente.php';
require_once '../model/empleado.php';

session_start();
$crudModel = new CrudModel();
$reservaModel =new ReservaModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Reservaciones</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/habitacion.jpeg">
            <div class="row">
                <h3>Reservaciones</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
                <?php
                if (isset($_SESSION['mensajeError'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['mensajeError'] . "</div>";
                }
                ?>
            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="guardar_reservacion">
                Seleccione el cliente:
                <select name="id_cliente">
                    <?php
                    
                    $listadoCliente = $crudModel->getClientes();
                  
                    foreach ($listadoCliente as $cliente) {
                        echo "<option value='" . $cliente->getId_cliente() . "'>" . $cliente->getApellido() . " " . $cliente->getNombre() . "</option>";
                    }
                    ?>
                </select>
                
                Seleccione el empleado:
                 <select name="id_empleado">
                    <?php
                    
                    $listadoEmpleado = $crudModel->getEmpleados();
                  
                    foreach ($listadoEmpleado as $cliente) {
                        echo "<option value='" . $cliente->getId_empleados() . "'>" . $cliente->getApellido_emp() . " " . $cliente->getNombre_emp() . "</option>";

                        }
                    ?>
                </select>
                Seleccione el tipo de Habitacion
                 <select name="id_habitacion">
                    <?php
                    
                    $listadoHabitacion = $crudModel->getHabitaciones();
                  
                    foreach ($listadoHabitacion as $cliente) {
                        echo "<option value='" . $cliente->getId_habitacion() . "'>" . $cliente->getTipo_habitacion(). "</option>";

                        }
                    ?>
                </select>
                Fecha:<input type="date" name="fechareserva" required="true" autocomplete="on" required="" value="<?php echo date('Y-m-d'); ?>">
                <input type="submit" value="Guardar ">
                
            </form>
        </p>
        <p>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="adicionar_detalle">
            Seleccione el servicio:
            <select name="id_servicio">
                <?php
                $listadoServicio = $crudModel->getServicios();
                print_r($listadoServicio);
                foreach ($listadoServicio as $prod) {
                    echo "<option value='" . $prod->getId_servicios() . "'>" . $prod->getTipo_servicio() . "</option>";
                }
                ?>
            </select>
            Cantidad:<input type="text" name="cantidad" maxlength="10" required="true" value="1">
            <input type="submit" value="Adicionar">
        </form>
    </p>
    <table data-toggle="table">
        
        <thead>
            <tr>
                <th>CODIGO SERVICIO</th>
                <th>SERVICIO</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>IVA</th>
                <th>SUBTOTAL</th>
                <th>OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           
            //verificamos si existe en sesion el listado de clientes:
            if (isset($_SESSION['listareservadet'])) {
                $listareservadet = unserialize($_SESSION['listareservadet']);
                $auxiva=0;
                $auxtotal=0;
                foreach ($listareservadet as $reservaDet) {
                    echo "<tr>";
                    echo "<td>" . $reservaDet->getId_servicio() . "</td>";
                    echo "<td>" . $reservaDet->getNombre() . "</td>";
                    echo "<td>" . $reservaDet->getPrecio() . "</td>";
                    echo "<td>" . $reservaDet->getPersonas() . "</td>";
                    echo "<td>" . $reservaDet->getIva() . "</td>";
                    echo "<td>" . $reservaDet->getSubtotal() . "</td>";
                    echo "<td><a href='../controller/controller.php?opcion=eliminar_detalle&idServicio=" . $reservaDet->getId_servicio() . "&subtotal=" . $reservaDet->getSubtotal() . "'>Eliminar</a></td>";
                    echo "</tr>";
                    $auxiva=$auxiva+$reservaDet->getIva();
                    $auxtotal=$auxtotal+$reservaDet->getSubtotal();
                }
                
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>IVA</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>" . $reservaModel->calcularIva($listareservadet) . "</td>";
                echo "<td></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>TOTAL SERVICIOS</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
               echo "<td>" . $reservaModel->calcularTotal($listareservadet) . "</td>";
                echo "<td></td>";
                echo "</tr>";
            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
