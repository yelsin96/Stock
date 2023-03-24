<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Licencias</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php 
            session_start();
            if($_SESSION['rolLogin'] != 'SuperAdministrador'){
                session_destroy();
                header('Location: ../../errores/403/index.html');
                exit;
            }
     
            if(!isset($_SESSION['userLogin'])){
                header('Location: login.php');
                exit;
            } else {

            include "Menu.php";
            include '../Controlador/controladorLicencia.php';
            include "mcript.php";
            $licencia = new licencia;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                $id_licencia = $_POST['id_licencia'];
                $descripcion = $_POST['descripcion'];
                $key = $encriptar($_POST['key']);
                $tipo_licencia = $_POST['tipo_licencia'];
                $email_relacionado = $_POST['email_relacionado'];
                $password_email = $encriptar($_POST['password_email']);
                if ($accion == "Insertar") {
                    $insertarlicencia = $licencia->insertarlicencia($id_licencia,$descripcion,$key,$tipo_licencia,$email_relacionado,$password_email,$_SESSION['userLogin']);
                }
            }
         ?>
        
        <div class="page-header">
            <h1>Ingresar licencia Nueva</h1>
        </div>
        <form action="licenciasIngresar.php" method="post" name="formlicencia">
            <div class="form-group">
                <label>ID Licencia:</label>
                <input class="form-control"  name="id_licencia" type="text" pattern="{0,50}" title="Ingrese Id licencia" required> 
            </div>
            <div class="form-group">
                <label>Descripcion:</label>
                <input class="form-control"  name="descripcion" type="text" pattern="{0,150}" title="Ingrese descripcion." required> 
            </div>
            <div class="form-group">
                <label>Key:</label>
                <input class="form-control"  name="key" type="text" pattern="{0,150}" title="Ingrese key." required> 
            </div>
            <div class="form-group">
                <label>Tipo Licencia:</label>
                <select class="form-control" name="tipo_licencia" required>
                    <option value="">Seleccione:</option>
                    <option value="OEM">OEM</option>
                    <option value="RETAIL">RETAIL</option>
                    <option value="EMPRESARIAL">EMPRESARIAL</option>
                </select>                
            </div>
            <div class="form-group">
                <label>Email Relacionado:</label>
                <input class="form-control"  name="email_relacionado" type="email" pattern="{0,50}" title="Ingrese email relacionado a la licencia."> 
            </div>
            <div class="form-group">
                <label>Contraseña Email:</label>
                <input class="form-control"  name="password_email" type="password" pattern="{0,50}" title="Ingrese contraseña usada para el correo seleccionado."> 
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