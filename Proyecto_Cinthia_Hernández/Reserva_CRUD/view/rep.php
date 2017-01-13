<!DOCTYPE html>
<?php
require_once '../model/cliente.php';
require_once '../model/servicio.php';
require_once '../model/reserva_detalle.php';
require_once '../model/CrudModel.php';
require_once '../model/ReservaModel.php';
require_once '../model/habitacion.php';
session_start();
$reservaCab=$_SESSION['reservaCab'];
$reservaModel =new ReservaModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reservacion - reserva</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
             <td><?php 
        $aux=0;
        ?>
        <div class="container">
            <img src="images/habitacion.jpeg">
            <div class="row">
                <h3>Reserva</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
                <a class="btn btn-success" href="javascript:window.print()">Imprimir</a>
            </div>
            <p>
            <table>
                <tr>
                    <td>Id Cabecera:</td>
                    <td><?php echo $reservaCab->getId_cab(); ?></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><?php echo $reservaCab->getFechareserva(); ?></td>
                </tr>
                <tr>
                    <td>Estado de la reserva:   .</td>
                    <td>Procesado</td>
                </tr>
                <tr>
                    <td>Cliente:</td>
                    <td><?php echo $reservaCab->getId_cliente(); ?></td>
                </tr>
                 <tr>
                    <td>Empleado:</td>
                    <td><?php echo $reservaCab->getId_empleado(); ?></td>
                </tr>
                <tr>
                    <td>Habitacion:</td>
                    <td><?php echo $reservaCab->getId_habitacion(); ?></td>
                </tr>
                <tr>
                    <td>Total:</td>
                    <td><?php echo $reservaCab->getTotal(); ?></td>
                </tr>
                
                
            </table>
            
            
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
                  
                    echo "</tr>";
                    $auxiva=$auxiva+$reservaDet->getIva();
                    $auxtotal=($reservaCab->getTotal())-($reservaModel->calcularTotal($listareservadet))-($reservaModel->calcularIva($listareservadet));

                }
                $res=0;
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>IVA</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>" . $reservaModel->calcularIva($listareservadet) . "</td>";
               
                echo "</tr>";
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>TOTAL SERVICIOS</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
               echo "<td>" .$reservaModel->calcularTotal($listareservadet) . "</td>";
            
             
                echo "</tr>";
                
                   echo "</tr>";
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>COSTO HABITACION</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>".($auxtotal)."</td>";
                echo "</tr>";
                echo "</tr>";
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>TOTAL</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>".($reservaCab->getTotal())."</td>";
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
