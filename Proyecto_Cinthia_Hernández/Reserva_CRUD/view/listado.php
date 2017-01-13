<!DOCTYPE html>
<?php
require_once '../model/reserva_cabecera.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reservacion - lista de Reservas</title>
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
                <h3>Lista de Reservas</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>


            <table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>CODIGO RESERVA</th>
                        <th>CLIENTE</th>
                        <th>EMPLEADO</th>
                        <th>HABITACION</th>
                        <th>FECHA RESERVA</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //verificamos si existe en sesion el listado de facturas:
                    if (isset($_SESSION['listaReservas'])) {
                        
                        $listado = unserialize($_SESSION['listaReservas']);
        
                        foreach ($listado as $resev) {
                            echo "<tr>";
                            echo "<td>" . $resev->getId_cab() . "</td>";
                            echo "<td>" . $resev->getId_cliente() . "</td>";
                            echo "<td>" . $resev->getId_empleado() . "</td>";
                            echo "<td>" . $resev->getId_habitacion() . "</td>";
                            echo "<td>" . $resev->getFechareserva() . "</td>";
                            echo "<td>" . $resev->getTotal() . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No se han cargado datos.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
