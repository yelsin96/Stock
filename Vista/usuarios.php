<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title> 
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
            include '../Controlador/controladorUsuarios.php';
            $usuarios = new usuarios;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                $cedula = $_POST['cedula'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $cargo = $_POST['cargo'];
                if ($accion == "Insertar") {
                    $insertarCargo = $usuarios->insertarUsuario($cedula,$nombre,$apellidos,$cargo,$_SESSION['user_id']);
                }
            }
         ?>
        
        <div class="page-header">
            <h1>Ingresar Usuario Nuevo</h1>
        </div>
        <form action="usuarios.php" method="post" name="formUsuarios">
            <div class="form-group">
                <label>Cedula:</label>
                <input class="form-control"  name="cedula" type="text" pattern="[0-9]{7,10}" title="Ingrese un numero de Cedula valido." required> 
            </div>
            <div class="form-group">
                <label>Nombre:</label>
                <input class="form-control"  name="nombre" type="text" pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1 ]{1,40}" required> 
            </div>
            <div class="form-group">
                <label>Apellidos:</label>
                <input class="form-control"  name="apellidos" type="text" pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1 ]{1,40}" required> 
            </div>
            <div class="form-group">
                <label>Seleccione Cargo:</label>
                <select class="form-control" name="cargo" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoCargo = $usuarios->consultarCargo();
                        while ($valores = mysqli_fetch_array($resultadoCargo)) {
                            echo '<option value="'.$valores["id"].'">'.$valores["descripcion"].'</option>';
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
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>
</html>