<!DOCTYPE html>
<?php
require_once '../model/habitacion.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Habitaciones</title>
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
                <h3>Habitaciones</h3>
            </div>
             <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
                <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="crear_habitacion">
<!--                    Id_S:<input type="text" name="id_cliente" maxlength="10" required="true">-->
                    Tipo habitacion:<input type="text" name="tipo_habitacion" maxlength="50" required="true">
                    Caracteristicas:<input type="text" name="caracteristicas" maxlength="50" required="true">
                    Valor:<input type="text" name="valor" maxlength="50" required="true">
                  
                    <input type="submit" value="Crear">
                </form>
            </p>
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>ID_HABITACION</th>
                        <th>TIPO_HABITACION</th>
                        <th>CARACTERISTICAS</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
        
        <?php
        if (isset($_SESSION['listadoHabitacion'])) {
                        $listadoHabitacion = unserialize($_SESSION['listadoHabitacion']);
                        foreach ($listadoHabitacion as $habitacion) {
                           
                            echo "<tr>";
                            echo "<td>" . $habitacion->getId_habitacion() . "</td>";
                            echo "<td>" . $habitacion->getTipo_habitacion() . "</td>";
                            echo "<td>" . $habitacion->getCaracteristicas() . "</td>";
                            echo "<td>" . $habitacion->getValor() . "</td>";
                           // echo "<td><a href='../controller/controller.php?opcion=editar_paciente&cedula=" . $cliente->getId_cliente() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
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
