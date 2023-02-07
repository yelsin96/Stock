<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/scripRegArt.js"></script>
    <title>Users CRUD</title>
</head>

<body>
    <div class="container">
        <?php
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit;
        } else {
            include "Menu.php";
            include '../Controlador/insert_user.php';
            $datos = new datos;

            if (!empty($_GET['activo'])) {
                $activo = $_GET['activo'];
            }


            if (!empty($_POST['boton'])) {
                $accion = $_POST['boton'];
                $id = null;
                $activo = $_POST['activo'];
                $SISTEMAOPERATIVO = $_POST['SISTEMAOPERATIVO'];
                $CPU = $_POST['CPU'];
                $cache = $_POST['cache'];
                $memoria = $_POST['memoria'];
                $almacenamiento = $_POST['almacenamiento'];
                $direccion = $_POST['direccion'];
                $mac = $_POST['mac'];
                $ultimo_mantenimiento = $_POST['ultimo_mantenimiento'];
                $proximo_mantenimiento = $_POST['proximo_mantenimiento'];
                $año_lanzamiento = $_POST['año_lanzamiento'];
                $fecha_compra = $_POST['fecha_compra'];
                $V_CPU = $_POST['V_CPU'];
                $V_MEM = $_POST['V_MEM'];
                $V_DISCO = $_POST['V_DISCO'];
                $promedio = 0;//$V_CPU + $V_MEM + $V_DISCO;
                $V_FINAL = 0;//$promedio / 3;
                if ($accion == "Agregar") {
                    $insertardatos = $datos->insertardatos($id,$activo, $SISTEMAOPERATIVO, $CPU, $cache, $memoria, $almacenamiento, $direccion, $mac, $ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento, $fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL, $_SESSION['user_id']);
                }
            }
            ?>

            <div class="users-form">
                <h1> Crear informacion del computador</h1>
                <form action="index1.php" method="POST">
                    <input type="text" name="CPU" for="CPU" placeholder="CPU">
                    <input type="text" name="SISTEMAOPERATIVO" for="SISTEMAOPERATIVO" placeholder="SISTEMAOPERATIVO">
                    <input type="text" name="cache" for="cache" placeholder="cache">
                    <input type="text" name="memoria" for="memoria" placeholder="memoria">
                    <input type="text" name="almacenamiento" for="almacenamiento" placeholder="almacenamiento">
                    <input type="text" name="direccion" for="direccion" placeholder="direccion">
                    <input type="text" name="mac" for="mac" placeholder="mac">
                    <h5>fecha ultimo mantenimiento</h5>
                    <input type="date" name="ultimo_mantenimiento" for="ultimo_mantenimiento"
                        placeholder="ultimo_mantenimiento">
                    <h5>fecha proximo mantenimiento</h5>
                    <input type="date" name="proximo_mantenimiento" for="proximo_mantenimiento"
                        placeholder="proximo_mantenimiento">
                    <h5>año de lanzamiento</h5>
                    <input type="date" name="año_lanzamiento" for="año_lanzamiento" placeholder="año_lanzamiento">
                    <h5>fecha de compra</h5>
                    <input type="date" name="fecha_compra" for="fecha_compra" placeholder="fecha_compra">
                    <input type="text" name="V_CPU" for="V_CPU" placeholder="V_CPU">
                    <input type="text" name="V_MEM" for="V_MEM" placeholder="V_MEM">
                    <input type="text" name="V_DISCO" for="V_DISCO" placeholder="V_DISCO">
                    <input type="hidden" name="activo" value="<?php echo $activo ?>">

                    <input type="submit" name="boton"  value="Agregar"  action="insert_user.php">
                   
                </form>
                
            </div>




        </div>
    <?php } ?>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>

</html>