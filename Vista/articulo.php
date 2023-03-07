<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Articulo</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
            include "Menu.php";
            include '../Controlador/controladorArticulo.php';
            $articulo = new articulo;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                $placa = $_POST['placa'];
                $descripcion = $_POST['descripcion'];
                $tipo = $_POST['tipo'];
                //$ubicacion = $_POST['ubicacion'];
                $ubicacion = "NULL";
                $observacion = $_POST['observacion'];
                if ($accion == "Insertar") {
                    $insertarArticulo = $articulo->insertarArticulo($placa,$descripcion,$tipo,$ubicacion,$observacion,$_SESSION['userLogin']);
                }
            }
         ?>
        <div class="page-header">
            <h1>Ingresar Articulo Nuevo</h1>
        </div>
        <form action="articulo.php" method="post" name="formArticulo">
            <div class="form-group">
                <label>Seleccione Tipo:</label>
                <select class="form-control" name="tipo" id="tipo" required onchange="TipoArticulo()">
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoTipo = $articulo->consultarTipo();
                        while ($valores = mysqli_fetch_array($resultadoTipo)) {
                            echo '<option value="'.$valores["id"].'">'.$valores["descripcion"].'</option>';
                        }
                    ?>  
                </select>
            </div>
            <div class="form-group">
                <label>Placa:</label>
                <input type="hidden" id="sede" name="sede" value='<?php echo $_SESSION['sedeLogin'];?>'>
                <input class="form-control"  name="placa" id="placa" type="text" pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,7}" title="Ingrese un numero de Placa valido." required> 
            </div>
            <div class="form-group">
                <label>Descripcion:</label>
                <input class="form-control"  name="descripcion" type="text" pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,40}"  required> 
            </div>
            <div class="form-group">
                <label>Observacion:</label>
                <input class="form-control"  name="observacion" type="text" pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}"> 
            </div>
            <div class="form-group">
                <input type="submit" name="boton" value="Insertar" class="btn btn-primary">
            </div>
        </form>
    </div>
    <?php  } ?>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>
</html>