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
     
            if(!isset($_SESSION['user_id'])){
                header('Location: login.php');
                exit;
            } else {

                include "Menu.php";
                include '../Controlador/insert_user.php';
                $datos = new datos;
    
            if (!empty($_POST['boton'])){
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
                    $promedio = 0;//$V_CPU + $V_MEM + $V_DISCO;
                    $V_FINAL = 0;//$promedio / 3;
                    $modificarDatos = $datos->modificarDatos($id, $SISTEMAOPERATIVO, $CPU, $cache, $memoria, $almacenamiento, $direccion, $mac, $ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento, $fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL,$_SESSION['user_id']);
                }
                if ($accion == "consultar") {
                    $idM = $_POST['idM'];
                    $resultadoDatos=$datos->consultarDatos($idM);
                    $consultaM = mysqli_fetch_array($resultadoDatos);
                    
                    if (empty($consultaM)) {
                        echo "<div class='alert alert-danger alert-dismissible'>";
                        echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                        echo "  <strong>Error!</strong> No se encontraron Registros";
                        echo "</div>";                        
                    }
                }
            }
        ?>
        
        <div class="page-header">
            <h1>Modificar datos</h1>
        </div>
        <?php if (empty($consultaM)){ ?>
        <form action="update.php" method="post" name="formDatos">
            <div class="form-group">
                <label>datos a Modificar:</label>
                <input class='form-control' name='idM' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,7}' title='Ingrese un numero de dato.' required>
            </div>
            <div class="form-group">
                <input type="submit" name="boton" value="consultar" class="btn btn-primary">
            </div>
        </form>
        <?php } ?>
        <?php if (!empty($consultaM)){ ?>
        <form action="update.php" method="post" name="formDatos">
            <div class="form-group">
                <label>id:</label>
                <?php echo "<input class='form-control' style='display:none;' value='".$consultaM["id"]."' name='id' type='text'>"  ?>
                <?php echo "<input class='form-control' disabled value='".$consultaM["id"]."' type='text'>"  ?>

            </div>
            <div class="form-group">
                <label>SISTEMA OPERATIVO:</label>
                <?php  echo "<input class='form-control' value='".$consultaM["SISTEMAOPERATIVO"]."' name='SISTEMAOPERATIVO' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,40}' required> "; ?>
            </div>

            <div class="form-group">
                <label>CPU:</label>
                <?php echo "<input class='form-control' value='".$consultaM["CPU"]."' name='CPU' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>

            <div class="form-group">
                <label>cache:</label>
                <?php echo "<input class='form-control' value='".$consultaM["cache"]."' name='cache' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>

            <div class="form-group">
                <label>memoria:</label>
                <?php echo "<input class='form-control' value='".$consultaM["memoria"]."' name='memoria' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>almacenamiento:</label>
                <?php echo "<input class='form-control' value='".$consultaM["almacenamiento"]."' name='almacenamiento' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>direccion:</label>
                <?php echo "<input class='form-control' value='".$consultaM["direccion"]."' name='direccion' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>mac:</label>
                <?php echo "<input class='form-control' value='".$consultaM["mac"]."' name='mac' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>ultimo mantenimiento:</label>
                <?php echo "<input class='form-control' value='".$consultaM["ultimo_mantenimiento"]."' name='ultimo_mantenimiento' type='date' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>proximo mantenimiento:</label>
                <?php echo "<input class='form-control' value='".$consultaM["proximo_mantenimiento"]."' name='proximo_mantenimiento' type='date' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>año de lanzamiento:</label>
                <?php echo "<input class='form-control' value='".$consultaM["año_lanzamiento"]."' name='año_lanzamiento' type='date' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>fecha de compra:</label>
                <?php echo "<input class='form-control' value='".$consultaM["fecha_compra"]."' name='fecha_compra' type='date' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>V_CPU:</label>
                <?php echo "<input class='form-control' value='".$consultaM["V_CPU"]."' name='V_CPU' type='int' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>V_MEM:</label>
                <?php echo "<input class='form-control' value='".$consultaM["V_MEM"]."' name='V_MEM' type='int' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            <div class="form-group">
                <label>V_DISCO:</label>
                <?php echo "<input class='form-control' value='".$consultaM["V_DISCO"]."' name='V_DISCO' type='int' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
        
        

            <div class="form-group">
                <input type="submit" name="boton" value="Modificar" class="btn btn-primary">
            </div>
        </form>
    
        <?php 
            }
        }    
         ?>


    </div>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <script type="text/javascript">
        function hola(){
            $("#id").val("hola");
        }
    </script>
</body>
</html>