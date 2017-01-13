<!DOCTYPE html>
<?php
require_once '../model/empleado.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Empleados</title>
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
                <h3>Empleados</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_empleados">
                Cargo:<input type="text" name="cargo" maxlength="50" required="true">
                Nombre:<input type="text" name="nombre_emp" maxlength="50" required="true">
                Apellido:<input type="text" name="apellido_emp" maxlength="50" required="true">

                <input type="submit" value="Crear">
            </form>
        </p>
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CARGO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_SESSION['listadoEmpleado'])) {
                    $listadoEmpleado = unserialize($_SESSION['listadoEmpleado']);
                    foreach ($listadoEmpleado as $empleado) {
                        echo "<tr>";
                        echo "<td>" . $empleado->getId_empleados() . "</td>";
                        echo "<td>" . $empleado->getCargo() . "</td>";
                        echo "<td>" . $empleado->getNombre_emp() . "</td>";
                        echo "<td>" . $empleado->getApellido_emp() . "</td>";


                        echo "<td><a href='../controller/controller.php?opcion=editar_empleados&id_empleados=" . $empleado->getId_empleados() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                        echo "<td><a href='../controller/controller.php?opcion=eliminar_empleados&id_empleados=" . $empleado->getId_empleados() . "'><span class='glyphicon glyphicon-pencil'> Eliminar </span></a></td>";
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
