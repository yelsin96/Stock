<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Licencia</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/scripRegArt.js"></script>
</head>

<body>
    <div class="container">

        <?php
        session_start();

        if( $_SESSION['rolLogin'] != 'SuperAdministrador'){
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



            if (!empty($_GET['placa'])) {
                $placa = $_GET['placa']; //id de caracteristica a modificar
                //$idM = $_POST['idM'];
                $resultadoDato = $datos->mirarDatos($placa);
                $row = mysqli_fetch_array($resultadoDato);

                if (empty($row)) {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> No se encontraron Registros";
                    echo "	<strong>Desea ingresar carecteristicas del equipo ".$placa." !  </strong>";
				    echo "	<a href='ingresarCaracteristicas.php?activo=".$placa."'><input type='button' class='btn btn-primary' value='insertar'></a> ";
                    echo "</div>";
                    
                }
            }

            if (!empty($_POST['boton'])) {
                $accion = $_POST['boton'];
                if ($accion == "Modificar") {
                    $placa = $_POST['placa'];
                    $descripcion = $_POST['descripcion'];
                    $tipo = $_POST['tipo_id '];
                    $ubicacion = $_POST['ubicacion_id '];
                    $observacion = $_POST['observacion'];
                    $id = $_POST['id'];
                    $SISTEMAOPERATIVO = $_POST['SISTEMAOPERATIVO'];
                    $CPU = $_POST['CPU'];
                    $cache = $_POST['cache'];
                    $memoria = $_POST['memoria'];
                    $almacenamiento = $_POST['almacenamiento'];
                    $direccion = $_POST['direccion'];
                    $mac = $_POST['mac'];
                    $ultimo_mantenimiento = $_GET['ultimo_mantenimiento'];
                    $proximo_mantenimiento = $_POST['proximo_mantenimiento'];
                    $año_lanzamiento = $_POST['año_lanzamiento'];
                    $fecha_compra = $_POST['fecha_compra'];
                    $V_CPU = $_POST['V_CPU'];
                    $V_MEM = $_POST['V_MEM'];
                    $V_DISCO = $_POST['V_DISCO'];
                    $V_FINAL = $_POST['V_FINAL'];
                    $modificarDatos = $datos->mirarDatos($placa, $descripcion, $tipo, $ubicacion, $observacion, $id, $SISTEMAOPERATIVO, $CPU, $cache, $memoria, $almacenamiento, $direccion, $mac, $ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento, $fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL, $_SESSION['userLogin']);
                }

            }
            ?>



            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Caracteristica del Equipo</b></h2>
                        </div>
                        <div class="col-sm-8">
                            <a href="exportCaracteristicas.php">
                                <button type="button" class="btn btn-success" style="margin-top: 0px !important;"> informe excel caracteristicas</button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if (empty($row)) { ?>
                <div class="row">
                    <a href="articulosReport.php">
                        <input type='button' value='volver' class="btn btn-primary">
                    </a>
                </div>
                <?php } ?>
                <?php if (!empty($row)) { ?>
                <div class="row">
                    <form action="mirarCaracteristica.php" method="post" name="formDatos">
                        <div class="form-group col-md-3">
                            <label>PLACA:</label>
                            <?php echo "<input class='form-control' style='display:none;' value='" . $row["placa"] . "' name='id' type='text'>" ?>
                            <?php echo "<input class='form-control' disabled value='" . $row["placa"] . "' type='text'>" ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>DESCRIPCION:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["descripcion"] . "' name='descripcion' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,40}' required> "; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>TIPO:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row['tipo_id'] . "' name='tipo_id' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>UBICACION:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row['ubicacion_id'] . "' name='ubicacion_id ' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>OBSERVACION:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["observacion"] . "' name='observacion' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>SISTEMA OPERATIVO:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["SISTEMAOPERATIVO"] . "' name='SISTEMAOPERATIVO' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,40}' required> "; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>CPU:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["CPU"] . "' name='CPU' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>CACHE:</label>
                            <?php echo "<input class='form-control'   disabled value='" . $row["cache"] . "' name='cache' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>MEMORIA RAM:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["memoria"] . "' name='memoria' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>ALMACENAMIENTO:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["almacenamiento"] . "' name='almacenamiento' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>IP:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["direccion"] . "' name='direccion' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>MAC:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["mac"] . "' name='mac' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>ULTIMO MANTENIMIENTO:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["ultimo_mantenimiento"] . "' name='ultimo_mantenimiento' type='date' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>PROXIMO MANTENIMIENTO:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["proximo_mantenimiento"] . "' name='proximo_mantenimiento' type='date' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>AÑO LANZAMIENTO CPU:</label>
                            <?php echo "<input class='form-control'  disabled value='" . $row["año_lanzamiento"] . "' name='año_lanzamiento' type='date' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>FECHA COMPRA CPU:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["fecha_compra"] . "' name='fecha_compra' type='date' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>VALORACION CPU:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["V_CPU"] . "' name='V_CPU' type='int' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>VALORACION RAM:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["V_MEM"] . "' name='V_MEM' type='int' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>VALORACION DISCO:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["V_DISCO"] . "' name='V_DISCO' type='int' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>VALORACION FINAL:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["V_FINAL"] . "' name='V_FINAL' type='int' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>"; ?>
                        </div>

                        <div class="form-group col-md-12">
                            <a href='articulosReport.php'><input type='button' value='Volver' class="btn btn-primary"></a>
                        </div>

                    </form>
                </div>
                    <?php
                }
        }
        ?>
        </div>
        <script type="text/javascript" src='js/jquery.min.js'></script>
        <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>

</html>