
<?php
session_start();
include_once '../model/cliente.php';
//include_once '../model/Proveedor.php';
include_once '../model/CrudModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Factura</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $cliente=unserialize($_SESSION['cliente']);
//            print_r($factura);
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizar_cliente">
            <table>
                <tr>
                    <td>ID Cliente</td>
                    <td>
                        <?php echo $cliente->getId_cliente(); ?>
                        <input type="hidden" name="id_cliente" value="<?php echo $cliente->getId_cliente(); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>NOMBRE</td>
                   <td>
                        <input value="<?php echo $cliente->getNombre(); ?>" type="text" name="nombre" size="17" maxlength="17" required="true">
                      
                    </td>
                </tr>
                <tr>
                    <td>APELLIDO</td>
                    <td>
                        <input value="<?php echo $cliente->getApellido(); ?>" type="text" name="apellido" size="17" maxlength="17" required="true">
                      
                    </td>
                </tr>
                <tr>
                    <td>DIRECCION</td>
                    <td>
                        <input value="<?php echo $cliente->getDireccion(); ?>" type="text" name="direccion" size="10" maxlength="10" required="true">
                       
                    </td>
                </tr>
                <tr>
                    <td>CELULAR</td>
                    <td><input value="<?php echo $cliente->getCelular(); ?>" type="text" name="celular" required="true"></td>
                </tr>
             
                <tr>
                    <td><input type="submit" value="Actualizar cliente" class="btn btn-info"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

