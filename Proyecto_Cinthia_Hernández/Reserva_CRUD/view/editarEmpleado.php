
<?php
session_start();
include_once '../model/empleado.php';
//include_once '../model/Proveedor.php';
include_once '../model/CrudModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Empleado</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $empleado=unserialize($_SESSION['empleado']);
//            print_r($factura);
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizar_empleados">
            <table>
                <tr>
                    <td>ID Empleado</td>
                    <td>
                        <?php echo $empleado->getId_empleados(); ?>
                        <input type="hidden" name="id_empleados" value="<?php echo $empleado->getId_empleados(); ?>" />
                    </td>
                </tr>
                
                  <tr>
                    <td>CARGO</td>
                    <td>
                        <input value="<?php echo $empleado->getCargo(); ?>" type="text" name="cargo" size="10" maxlength="10" required="true">
                       
                    </td>
                </tr>
                <tr>
                    <td>NOMBRE</td>
                   <td>
                        <input value="<?php echo $empleado->getNombre_emp(); ?>" type="text" name="nombre_emp" size="17" maxlength="17" required="true">
                      
                    </td>
                </tr>
                <tr>
                    <td>APELLIDO</td>
                    <td>
                        <input value="<?php echo $empleado->getApellido_emp(); ?>" type="text" name="apellido_emp" size="17" maxlength="17" required="true">
                      
                    </td>
                </tr>
              
              
             
                <tr>
                    <td><input type="submit" value="Actualizar cliente" class="btn btn-info"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

