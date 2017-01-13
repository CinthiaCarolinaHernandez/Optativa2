<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reserva de Habitaciones</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/principal.jpg">
            <div class="row">
                <h3>Sistema de Reservas</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../controller/controller.php?opcion=listar_empleados">Empleados</a>
                <a class="btn btn-success" href="../controller/controller.php?opcion=listar_clientes">Clientes</a>
                <a class="btn btn-success" href="../controller/controller.php?opcion=listar_servicio">Servicios</a>
                <a class="btn btn-success" href="../controller/controller.php?opcion=listar_habitacion">Habitaciones</a>
                <a class="btn btn-success" href="reservas.php">Reservas</a>
                
                  <a class="btn btn-success" href="../controller/controller.php?opcion=listar_reservas">Listado Reservaciones</a>
                
                
            </div>
        </div>
    </body>
</html>
