<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro Simcard</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <script type="text/javascript" src="js/scripRegSimcard.js"></script>
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
            $empresa = $_SESSION['sedeStock'];
            include "Menu.php";
            include '../Controlador/controladorSimcard.php';
            $simcard = new simcard;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                $simcardId = $_POST['simcard'];
                $ubicacion = $_POST['ubicacion'];
                $incidente = $_POST['incidente'];
                $usuario = $_POST['usuario'];

                if ($accion == "Insertar") {
                    $simcard->insertarRegistroSimcard($simcardId,$ubicacion,$incidente,$usuario,$_SESSION['userLogin']);
                    $simcard->modificarSimcard($simcardId,$ubicacion);
                }
            }
        ?>

        <div class="page-header">
            <h1>Ingresar Registro Simcard</h1>
        </div>
        <form action="RegistroSimcard.php" method="post" name="formRegistro">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Seleccione operador:</label>
                        <select class="form-control" id="operador" required onchange="ajaxR();">
                            <option value="">Seleccione:</option>
                            <?php
                                $resultadoOperador = $simcard->consultarOperador();
                                while ($valores = mysqli_fetch_array($resultadoOperador)) {
                                    echo '<option value="'.$valores["id"].'">'.$valores["descripcion"].'</option>';
                                }
                            ?>                          
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="datos_ajax">
                        
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label>Seleccione Ubicacion:</label>
                        <select class="form-control" name="ubicacion" required>
                            <option value="">Seleccione:</option>
                            <?php
                                $resultadoUbicacion = $simcard->consultarUbicacion();
                                while ($valores = mysqli_fetch_array($resultadoUbicacion)) {
                                    echo '<option value="'.$valores["id"].'">'.$valores["descripcion"].'</option>';
                                }
                            ?>  
                        </select>
                    </div>

                    <!--<div class="col-md-1">
                        <a href="ubicacion.php">
                            <button type="button" class="btn btn-default" name="ubicacion" title="Agregar Ubicacion">
                                <span class="glyphicon glyphicon-globe"></span>
                            </button>
                        </a>
                    </div>-->
                </div>
            </div>
            <div class="form-group">
                <label>Incidente:</label>
                <input class="form-control"  name="incidente" type="text" pattern="[0-9]{5,6}" required> 
            </div>
            <div class="form-group">
                <label>Seleccione Usuario-Realiza:</label>
                <select class="form-control" name="usuario" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoUsuario = $simcard->consultarUsuario($empresa);
                        while ($valores = mysqli_fetch_array($resultadoUsuario)) {
                            echo '<option value="'.$valores["cc_persona"].'">'.$valores["nombre_persona"].' '.$valores["apellido_persona"].'</option>';
                        }
                    ?>  
                </select>
            </div>
            
            <div class="form-group">
                <input type="submit" name="boton" value="Insertar" class="btn btn-primary">
            </div>
        </form>

    </div>
	
    <?php } ?>
	
</body>
</html>