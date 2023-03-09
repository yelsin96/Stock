<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar Movimiento</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php
            session_start();
     
            if(!isset($_SESSION['userLogin'])){
                header('Location: login.php');
                exit;
            } else {
            $empresa = $_SESSION['sedeStock'];
            include "Menu.php";
            include '../Controlador/controladorRegistro.php';
            $registro = new registro;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                if ($accion == "Modificar") {
                    $id = $_POST['id'];
                    $fecha = $_POST['fecha'];
                    $placa = $_POST['placa'];
                    $ubicacion = $_POST['ubicacion'];
                    $incidente = $_POST['incidente'];
                    $usuarioE = $_POST['usuario-entrega'];
                    $usuarioR = $_POST['Usuario-Recibe'];
                    //echo $id.$placa.$ubicacion.$incidente.$usuarioE.$usuarioR;
                    $resultadoRegistros=$registro->consultarRegistro($id);
                    $consulta = mysqli_fetch_array($resultadoRegistros);

                    $modificarRegistro = $registro->modificarRegistro($id,$fecha,$placa,$ubicacion,$incidente,$usuarioE,$usuarioR, $consulta['incidente'],$_SESSION['userLogin']);
                    $registro->modificarArticulo($placa,$ubicacion);
                }
                if ($accion == "Consultar") {
                    $registroCon = $_POST['registro'];
                    $resultadoRegistros=$registro->consultarRegistro($registroCon);
                    $consultaM = mysqli_fetch_array($resultadoRegistros);
                    
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
            <h1>Modificar Movimiento</h1>
            <h5>Solo se permite modificar INCIDENTE ó movimientos del día actual.</h5>
        </div>
        <?php if (empty($consultaM)){ ?>
        <form action="registroModificar.php" method="post" name="idregistro">
            <div class="form-group">
                <label>Id Movimiento:</label>
                <input class='form-control' name='registro' type='text' pattern='[0-9]{1,5}' title='Ingrese un numero de Registro valido.' required>
            </div>
            <div class="form-group">
                <input type="submit" name="boton" value="Consultar" class="btn btn-primary">
            </div>
        </form>
        <?php } ?>
        <?php if (!empty($consultaM)){ ?>
        <form action="registroModificar.php" method="post" name="formArticulo">
            <div class="form-group">
                <label>Id:</label>
                <?php echo "<input class='form-control' style='display:none;' value='".$consultaM["id"]."' name='id' type='text' pattern='[0-9]{1,5}' title='Ingrese un numero de Registro valido.' required>"  ?>
                <?php echo "<input class='form-control' style='display:none;' value='".$consultaM["fecha"]."' name='fecha' type='text' >"  ?>
                <?php echo "<input class='form-control' disabled value='".$consultaM["id"]."' type='text' pattern='[0-9]{1,5}' title='Ingrese un numero de registro valido.' required>"  ?>

            </div>

            <div class="form-group">
                <label>Placa-Articulo:</label>
                <?php  echo "<input class='form-control' value='".$consultaM["articulo_id"]."' name='placa' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,40}' required> "; ?>
            </div>

            <div class="form-group">
                <label>Seleccione Ubicacion:</label>
                <select class="form-control" name="ubicacion" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoUbicacion = $registro->consultarUbicacion();
                        while ($valores = mysqli_fetch_array($resultadoUbicacion)) {
                            if ($valores["id"] == $consultaM["ubicacion_id"]) {
                                echo '<option value="'.$valores["id"].'" selected>'.$valores["descripcion"].'</option>';   
                            }else{
                                echo '<option value="'.$valores["id"].'">'.$valores["descripcion"].'</option>';  
                            }
                        }
                    ?>  
                </select>
            </div>

            <div class="form-group">
                <label>Incidente:</label>
                <?php  echo "<input class='form-control' value='".$consultaM["incidente"]."' name='incidente' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,40}' required> "; ?>
            </div>

            <div class="form-group">
                <label>Seleccione Usuario-Entrega:</label>
                <select class="form-control" name="usuario-entrega" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoUsuario1 = $registro->consultarUsuario($empresa);
                        while ($valores = mysqli_fetch_array($resultadoUsuario1)) {
                            if ($valores["cc_persona"] == $consultaM["usuario_entrega_id"]) {
                                echo '<option value="'.$valores["cc_persona"].'" selected>'.$valores["nombre_persona"].' '.$valores["apellido_persona"].'</option>';
                            }else{
                                echo '<option value="'.$valores["cc_persona"].'">'.$valores["nombre_persona"].' '.$valores["apellido_persona"].'</option>';
                            }
                        }
                    ?>  
                </select>
            </div>

            <div class="form-group">
                <label>Seleccione Usuario-Recibe:</label>
                <select class="form-control" name="Usuario-Recibe" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoUsuario1 = $registro->consultarUsuario($empresa);
                        while ($valores = mysqli_fetch_array($resultadoUsuario1)) {
                            if ($valores["cc_persona"] == $consultaM["usuario_recibe_id"]) {
                                echo '<option value="'.$valores["cc_persona"].'" selected>'.$valores["nombre_persona"].' '.$valores["apellido_persona"].'</option>';
                            }else{
                                echo '<option value="'.$valores["cc_persona"].'">'.$valores["nombre_persona"].' '.$valores["apellido_persona"].'</option>';
                            }
                        }
                    ?>  
                </select>
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
            $("#placa").val("hola");
        }
    </script>
</body>
</html>