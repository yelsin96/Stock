<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ubicacion</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='css/bootstrap.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php 
            session_start();
     
            if(!isset($_SESSION['user_id'])){
                header('Location: login.php');
                exit;
            } else {

            include 'Menu.php';
            include '../Controlador/controladorUbicacion.php';
            $ubicacion = new ubicacion;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                $descripcion = $_POST['descripcion'];
                
                if ($accion == "Insertar") {
                    $insertarUbicacion = $ubicacion->insertarUbicacion($descripcion);
                }
            }
         ?>
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Ingresar Ubicacion Nueva</h1>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form action="ubicacion.php" method="post" name="formUsuarios">
                    <div class="form-group">
                        <label>Descripcion:</label>
                        <input class="form-control"  name="descripcion" type="text" maxlength="40" required> 
                    </div>
                    <div class="form-group">
                        <input type="submit" name="boton" value="Insertar" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>



    </div>
    <?php } ?>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>
</html>