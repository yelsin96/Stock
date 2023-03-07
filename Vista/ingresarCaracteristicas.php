<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/scripRegArt.js"></script>
    <title>Ingresar Caracteristicas</title>
</head>

<body>
    <div class="container">
        <?php
        session_start();
        if (!isset($_SESSION['userLogin'])) {
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
                    $promedio = 0; //$V_CPU + $V_MEM + $V_DISCO;
                    $V_FINAL = 0; //$promedio / 3;
                    if ($accion == "Agregar") {
                        $insertardatos = $datos->insertardatos($id, $activo, $SISTEMAOPERATIVO, $CPU, $cache, $memoria, $almacenamiento, $direccion, $mac, $ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento, $fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL, $_SESSION['userLogin']);
                    }
                }
                if (!empty($_GET['activo'])) {
                    
                
                ?>
                <!-- <div class="users-form"> -->
                    <h1> Crear informacion del PC</h1>
                    <form action="ingresarCaracteristicas.php" method="POST">
                        <div class="form-group col-md-4">
                            <label>CPU-PROCESADOR *</label>
                            <input type="text" name="CPU" for="CPU" placeholder="Ej: intel core i5-12600k" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>SISTEMAO PERATIVO *</label>
                            <input type="text" name="SISTEMAOPERATIVO" for="SISTEMAOPERATIVO" placeholder="Ej: Ubuntu 22.04.1 LTS" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>CACHE (KB)*</label>
                            <input type="text" name="cache" for="cache" placeholder="Ej: 6144" class="form-control" pattern="[0-9]{1,40}" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label>MEMORIA RAM (GB)*</label>
                            <input type="text" name="memoria" for="memoria" placeholder="Ej: 3.8" class="form-control" pattern="^[0-9]{1,3}(\.[0-9]{0,2})?$" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Seleccione Almacenamiento: *</label>
                            <select class="form-control" name="almacenamiento" for="almacenamiento" required>
                                <option value="">Seleccione:</option>
                                <option value="SSD">SSD</option>
                                <option value="MECANICO">MECANICO</option>
                                <option value="M.2">M.2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>DIRECCION IP</label>
                            <input type="text" name="direccion" for="direccion" placeholder="Ej: 172.20.1.1" class="form-control" pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,40}" required>    
                        </div>
                        <div class="form-group col-md-4">
                            <label>MAC *</label>
                            <input type="text" name="mac" for="mac" placeholder="Ej: 0c:9d:92:12:20:12" class="form-control" required>    
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha ultimo mantenimiento *</label> 
                            <input type="date" name="ultimo_mantenimiento" for="ultimo_mantenimiento" class="form-control" required>    
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha proximo mantenimiento *</label> 
                            <input type="date" name="proximo_mantenimiento" for="proximo_mantenimiento" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Año de lanzamiento de la CPU *</label> 
                            <input type="date" name="año_lanzamiento" for="año_lanzamiento" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha de compra de la CPU *</label> 
                            <input type="date" name="fecha_compra" for="fecha_compra" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>VALORACION CPU *</label>
                            <input type="text" name="V_CPU" for="V_CPU" placeholder="De 1-5" class="form-control" pattern='^[1-5]{1}(\.[0-9]{0,1})?$' required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>VALORACION RAM *</label>
                            <input type="text" name="V_MEM" for="V_MEM" placeholder="De 1-5" class="form-control" pattern='^[1-5]{1}(\.[0-9]{0,1})?$' required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>VALORACION DISCO *</label>
                            <input type="text" name="V_DISCO" for="V_DISCO" placeholder="De 1-5" class="form-control" pattern='^[1-5]{1}(\.[0-9]{0,1})?$' required>
                        </div>                   
                        <input type="hidden" name="activo" value="<?php echo $activo ?>">
                        <div class="form-group col-md-2">
                            <input type="submit" name="boton" value="Agregar" class="btn btn-primary">
                        </div>
                    </form>
                <!-- </div> -->
            </div>
    <?php 
            }else{
                echo "No hay Activo seleccionado <br>";
                echo "<a href='articulosReport.php'><button class='btn btn-primary'>Reporte Articulos</button></a>";
                echo "<a href='articulo.php'><button class='btn btn-primary'>Ingresar Articulos</button></a>";
            }    
        } 
    ?>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>

</html>