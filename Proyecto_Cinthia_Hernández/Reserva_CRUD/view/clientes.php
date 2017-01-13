<!DOCTYPE html>
<?php
require_once '../model/cliente.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Clientes</title>
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
                <h3>Clientes</h3>
            </div>
             <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
                <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="crear_cliente">
                    Cédula:<input type="text" name="id_cliente" maxlength="10" required="true">
                    Nombre:<input type="text" name="nombre" maxlength="50" required="true">
                    Apellido:<input type="text" name="apellido" maxlength="50" required="true">
                   
                    Direccion:<input type="text" name="direccion" maxlength="100">
                    Celular:<input type="text" name="celular" maxlength="30" required="true">
                    <input type="submit" value="Crear">
                </form>
            </p>
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>CEDULA</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                      
                        <th>DIRECCION</th>
                        <th>CELULAR</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
        
        <?php
        if (isset($_SESSION['listadoCliente'])) {
                        $listadoCliente = unserialize($_SESSION['listadoCliente']);
                        foreach ($listadoCliente as $cliente) {
                            echo "<tr>";
                            echo "<td>" . $cliente->getId_cliente() . "</td>";
                            echo "<td>" . $cliente->getNombre() . "</td>";
                            echo "<td>" . $cliente->getApellido() . "</td>";
                            //echo "<td>" . $cliente->getEmail() . "</td>";
                            echo "<td>" . $cliente->getDireccion() . "</td>";
                            echo "<td>" . $cliente->getCelular() . "</td>";
                            echo "<td><a href='../controller/controller.php?opcion=editar_cliente&id_cliente=" . $cliente->getId_cliente() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                            echo "<td><a href='../controller/controller.php?opcion=eliminar_cliente&id_cliente=" . $cliente->getId_cliente() . "'><span class='glyphicon glyphicon-pencil'> Eliminar </span></a></td>";
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
