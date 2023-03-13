<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar datos</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/scripRegArt.js"></script>
</head>

<body>
    <div class="container">
        <?php
        session_start();

        if($_SESSION['cargoLogin'] != 'Coordinador Soporte y Mantenimiento' && $_SESSION['rolLogin'] != 'SuperAdministrador'){
            session_destroy();
            header('Location: ../../errores/403/index.html');
            exit;
        }

        if (!isset($_SESSION['userLogin'])) {
            header('Location: login.php');
            exit;
        } else {

            include "Menu.php";
            include '../Controlador/insert_user.php';
            $datos = new datos;


            if (!empty($_GET['id_datos'])) {
                $id_datos = $_GET['id_datos']; //id de caracteristica a modificar
                //$idM = $_POST['idM'];
                $resultadoDatos = $datos->consultarDatos($id_datos);
                $consultaM = mysqli_fetch_array($resultadoDatos);

                if (empty($consultaM)) {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> No se encontraron Registros";
                    echo "</div>";
                }
            }

            if (!empty($_POST['boton'])) {
                $accion = $_POST['boton'];
                if ($accion == "Modificar") {
                    $id = $_POST['id'];
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
                    $modificarDatos = $datos-> modificarDatos($id, $SISTEMAOPERATIVO, $CPU, $cache, $memoria, $almacenamiento, $direccion, $mac, $ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento, $fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL, $_SESSION['userLogin']);
                }

            }
            ?>

            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Modificar Caracteristicas del PC</h2>
                        </div>
                    </div>
                </div>
                <?php if (empty($consultaM)) { ?>
                    <div class="form-group row">
                        <a href='modificarArticulo.php'><button class="btn btn-primary">Modificar articulo</button></a>
                        <a href='articulosReport.php'><button class='btn btn-primary'>Reporte Articulos</button></a>
                        <a href='articulo.php'><button class='btn btn-primary'>Ingresar Articulos</button></a>
                    </div>
                <?php } ?>
                <?php if (!empty($consultaM)) { ?>
                <div class="row">
                    <form action="update.php" method="post" name="formDatos">
                        <div class="form-group col-md-2">
                            <label>ID *</label>
                            <?php echo "<input class='form-control' style='display:none;' value='" . $consultaM["id"] . "' name='id' type='text'>" ?>
                            <?php echo "<input class='form-control' disabled value='" . $consultaM["id"] . "' type='text'>" ?>
                        </div>
                        <!-- <div class="form-group col-md-3">
                            <label>SISTEMA OPERATIVO *</label>
                            <input class='form-control' value="<?php //echo $consultaM["SISTEMAOPERATIVO"] ?>" name='SISTEMAOPERATIVO' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9]{1,40}' required>
                        </div> -->
                        <div class="form-group col-md-3">
                            <label>SISTEMAO PERATIVO *</label>
                            <select class="form-control" name="SISTEMAOPERATIVO" for="SISTEMAOPERATIVO" required>
                                <option value="<?php echo $consultaM["SISTEMAOPERATIVO"] ?>" selected><?php echo $consultaM["SISTEMAOPERATIVO"] ?></option>
                                <option value="Ubuntu 16.1.0.1 LTS">Ubuntu 16.1.0.1 LTS</option>
                                <option value="Ubuntu 16.04.3 LTS">Ubuntu 16.04.3 LTS</option>
                                <option value="Ubuntu 20.04.4 LTS">Ubuntu 20.04.4 LTS</option>
                                <option value="Ubuntu 20.04.5 LTS">Ubuntu 20.04.5 LTS</option>
                                <option value="Ubuntu 22.1.0.8 LTS">Ubuntu 22.1.0.8 LTS</option>
                                <option value="Ubuntu 22.04.1 LTS">Ubuntu 22.04.1 LTS</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>PROCESADOR *</label>
                            <input class='form-control' value="<?php echo $consultaM["CPU"] ?>" name='CPU' type='text' required>
                        </div>

                        <div class="form-group col-md-3">
                            <label>CACHE *</label>
                            <?php echo "<input class='form-control' value='" . $consultaM["cache"] . "' name='cache' type='text' pattern='[0-9]{1,10}' required>"; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>MEMORIA RAM *</label>
                            <?php echo "<input class='form-control' value='".$consultaM["memoria"]."' name='memoria' type='text' pattern='^[0-9]{1,3}(\.[0-9]{0,2})?$' required>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Seleccione Almacenamiento *</label>
                            <select class="form-control" name="almacenamiento" for="almacenamiento" required>
                                <option value="<?php echo $consultaM["almacenamiento"] ?>" selected><?php echo $consultaM["almacenamiento"] ?></option>
                                <option value="SSD">SSD</option>
                                <option value="MECANICO">MECANICO</option>
                                <option value="M.2">M.2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>IP *</label>
                            <input class='form-control' value="<?php echo $consultaM["direccion"] ?>" name='direccion' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,50}' required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>MAC *</label>
                            <input class='form-control' value="<?php echo $consultaM["mac"] ?>" name='mac' type='text' required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>ULTIMO MANTENIMIENTO *</label>
                            <?php echo "<input class='form-control' value='" . $consultaM["ultimo_mantenimiento"] . "' name='ultimo_mantenimiento' type='date' required>"; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>PROXIMO MANTENIMIENTO *</label>
                            <?php echo "<input class='form-control' value='" . $consultaM["proximo_mantenimiento"] . "' name='proximo_mantenimiento' type='date' required>"; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>AÑO LANZAMIENTO *</label>
                            <?php echo "<input class='form-control' value='" . $consultaM["año_lanzamiento"] . "' name='año_lanzamiento' type='date' required>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>FECHA COMPRA *</label>
                            <?php echo "<input class='form-control' value='" . $consultaM["fecha_compra"] . "' name='fecha_compra' type='date' required>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>VALORACION CPU *</label>
                            <?php echo "<input class='form-control' value='" . $consultaM["V_CPU"] . "' name='V_CPU' type='text' pattern='^[1-5]{1}(\.[0-9]{0,1})?$' required>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>VALORACION RAM *</label>
                            <?php echo "<input class='form-control' value='" . $consultaM["V_MEM"] . "' name='V_MEM' type='text' pattern='^[1-5]{1}(\.[0-9]{0,1})?$' required>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>VALORACION DISCO *</label>
                            <?php echo "<input class='form-control' value='" . $consultaM["V_DISCO"] . "' name='V_DISCO' type='text' pattern='^[1-5]{1}(\.[0-9]{0,1})?$' required>"; ?>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="boton" value="Modificar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <?php
                }
        }
        ?>
            </div>
    </div>

        <script type="text/javascript" src='js/jquery.min.js'></script>
        <script type="text/javascript" src='js/bootstrap.min.js'></script>
        <script type="text/javascript">
            function hola() {
                $("#id").val("hola");
            }
        </script>
</body>

</html>