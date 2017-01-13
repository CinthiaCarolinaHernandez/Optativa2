<!DOCTYPE html>
<?php
require_once '../model/servicio.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Servicios</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/servicio.jpg">
            <div class="row">
                <h3>Servicios</h3>
            </div>
             <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
                <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="crear_servicio">
<!--                    Id_S:<input type="text" name="id_cliente" maxlength="10" required="true">-->
                    Tipo Servicio:<input type="text" name="tipo_servicio" maxlength="50" required="true">
                    Costo Servicio:<input type="text" name="costo_servicio" maxlength="50" required="true">
                  
                    <input type="submit" value="Crear">
                </form>
            </p>
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>ID_SERVICIO</th>
                        <th>TIPO_SERVICIO</th>
                        <th>COSTO_SERVICIO</th>
                 
                    </tr>
                </thead>
                <tbody>
        
        <?php
        if (isset($_SESSION['listadoServicio'])) {
                        $listadoServicio = unserialize($_SESSION['listadoServicio']);
                        foreach ($listadoServicio as $servicio) {
                           
                            echo "<tr>";
                            echo "<td>" . $servicio->getId_servicios() . "</td>";
                            echo "<td>" . $servicio->getTipo_servicio() . "</td>";
                            echo "<td>" . $servicio->getCosto_servicio() . "</td>";
                         
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
