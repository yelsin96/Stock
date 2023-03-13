<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar Simcard</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
     
            if(!isset($_SESSION['userLogin'])){
                header('Location: login.php');
                exit;
            } else {

            include "Menu.php";
            include '../Controlador/controladorSimcard.php';
            $simcard = new simcard;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                
                if ($accion == "Modificar") {
                    $linea = $_POST['lineaV'];
                    $observacion = $_POST['observacion'];
                    $modificarSimcard = $simcard->modificarSimcard($linea,$observacion,$_SESSION['userLogin']);
                }
                if ($accion == "Consultar") {
                    $lineaM = $_POST['lineaM'];
                    $resultadoSimcard=$simcard->consultarSimcard($lineaM);
                    $consultaM = mysqli_fetch_array($resultadoSimcard);
                    
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
            <h1>Modificar Simcard</h1>
        </div>
        <?php if (empty($consultaM)){ ?>
        <form action="modificarSimcard.php" method="post" name="ModArticulo">
            <div class="form-group">
                <label>Numero de linea a Modificar:</label>
                <input class='form-control' name='lineaM' type='text' pattern='[0-9]{1,11}' title='Ingrese un numero de linea valido.' required>
            </div>
            <div class="form-group">
                <input type="submit" name="boton" value="Consultar" class="btn btn-primary">
            </div>
        </form>
        <?php } ?>
        <?php if (!empty($consultaM)){ ?>
            <form action="Modificarsimcard.php" method="post" name="formsimcard">
                <div class="form-group">
                    <label>Numero de Linea:</label>
                    <?php echo "<input class='form-control' style='display:none;' value='".$consultaM["Numero_linea"]."' name='lineaV' type='text'>"  ?>
                    <?php echo "<input class='form-control' name='linea' disabled value='".$consultaM["Numero_linea"]."' type='text'>"?>
                </div>
                <div class="form-group">
                    <label>Serie:</label>
                    <input class="form-control" disabled name="serie" type="text" value= "<?php echo $consultaM["Serie"] ?>"> 
                </div>
                <div class="form-group">
                    <label>Usuario:</label>
                    <input class="form-control" disabled name="usuario" type="text" value= "<?php echo $consultaM["Usuario"] ?>" > 
                </div>
                <div class="form-group">
                    <label>Clave:</label>
                    <input class="form-control" disabled name="clave" type="text" value= "<?php echo $consultaM["Clave"] ?>"> 
                </div>
                <div class="form-group">
                    <label>Apn:</label>
                    <input class="form-control" disabled name="apn" type="text" value= "<?php echo $consultaM["Apn"] ?>"> 
                </div>
                <div class="form-group">
                    <label>Plan:</label>
                    <input class="form-control" disabled name="plan" type="text" value= "<?php echo $consultaM["Plan"] ?>"> 
                </div>
                <div class="form-group">
                    <label>Operador:</label>
                    <?php 
                        $resultadoOperador = mysqli_fetch_array($simcard->consultarOperador());
                    ?>
                    <input class="form-control" disabled name="operador" type="text" value= "<?php echo $resultadoOperador["descripcion"] ?>">
                </div>
                <div class="form-group">
                    <label>Observacion:</label>
                    <input class="form-control" maxlength="200" name="observacion" type="text" value="<?php echo $consultaM["Observacion"] ?>"> 
                </div>
                <div class="form-group">
                    <input type="submit" name="boton" value="Modificar" class="btn btn-primary">
                </div>
            </form>
        <?php  } ?>
    



    </div>
    <?php  } ?>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>
</html>