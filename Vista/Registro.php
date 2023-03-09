<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro Articulo</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <script type="text/javascript" src="js/scripRegArt.js"></script>
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
            require( '../Controlador/controladorRegistro.php');
            $registro = new registro;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                $articulo = $_POST['articulo'];
                $ubicacion = $_POST['ubicacion'];
                $incidente = $_POST['incidente'];
                $usuarioE = $_POST['usuarioE'];
                $usuarioR = $_POST['usuarioR'];
                if ($accion == "Insertar") {
                    $registro->insertarRegistro($articulo,$ubicacion,$incidente,$usuarioE,$usuarioR,$_SESSION['userLogin']);
                    $registro->modificarArticulo($articulo,$ubicacion);
                }
            }
        ?>

        <div class="page-header">
            <h1>Ingresar Registro Articulo</h1>
        </div>
        <form action="Registro.php" method="post" name="formRegistro">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Seleccione tipo:</label>
                        <select class="form-control" id="tipo" required onchange="ajaxR();">
                            <option value="">Seleccione:</option>
                            <?php
                                $resultadoTipo = $registro->consultarTipo();
                                while ($valores = mysqli_fetch_array($resultadoTipo)) {
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
                                $resultadoUbicacion = $registro->consultarUbicacion();
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
            <?php
            ?>
            <div class="form-group">
                <label>Seleccione Usuario-Entrega:</label>
                <select class="form-control" name="usuarioE" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoUsuarioE = $registro->consultarUsuario($empresa);
                        while ($valores = mysqli_fetch_array($resultadoUsuarioE)) {
                            echo '<option value="'.$valores["cc_persona"].'">'.$valores["nombre_persona"].' '.$valores["apellido_persona"].'</option>';
                        }
                    ?>  
                </select>
            </div>            
            <div class="form-group">
                <label>Seleccione Usuario-Recibe:</label>
                <select class="form-control" name="usuarioR" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoUsuarioR = $registro->consultarUsuario($empresa);
                        while ($valores = mysqli_fetch_array($resultadoUsuarioR)) {
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