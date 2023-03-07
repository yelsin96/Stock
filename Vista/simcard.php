<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simcard</title> 
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

            include "Menu.php";
            include '../Controlador/controladorSimcard.php';
            $simcard = new simcard;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                $linea = $_POST['linea'];
                $serie = $_POST['serie'];
                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];
                $apn = $_POST['apn'];
                $plan = $_POST['plan'];
                $operador = $_POST['operador'];
                $ubicacion = "NULL";
                $observacion = $_POST['observacion'];
                if ($accion == "Insertar") {
                    $insertarsimcard = $simcard->insertarsimcard($linea,$serie,$usuario,$clave,$apn,$plan,$operador,$ubicacion,$observacion,$_SESSION['userLogin']);
                }
            }
         ?>
        
        <div class="page-header">
            <h1>Ingresar Simcard Nueva</h1>
        </div>
        <form action="simcard.php" method="post" name="formsimcard">
            <div class="form-group">
                <label>Numero de Linea:</label>
                <input class="form-control"  name="linea" type="text" pattern="[0-9]{10,15}" title="Ingrese un numero de Linea valido." required> 
            </div>
            <div class="form-group">
                <label>Serie:</label>
                <input class="form-control"  name="serie" type="text" pattern="[0-9]{10,20}" title="Ingrese un numero de Serie valido." required> 
            </div>
            <div class="form-group">
                <label>Usuario:</label>
                <input class="form-control"  name="usuario" type="text" pattern="{0,20}" title="Ingrese un usuario valido." required> 
            </div>
            <div class="form-group">
                <label>Clave:</label>
                <input class="form-control"  name="clave" type="text" pattern="{0,20}" title="Ingrese una clave valida." required> 
            </div>
            <div class="form-group">
                <label>Apn:</label>
                <input class="form-control"  name="apn" type="text" pattern="{0,40}" title="Ingrese una apn valida." required> 
            </div>
            <div class="form-group">
                <label>Plan:</label>
                <input class="form-control"  name="plan" type="text" pattern="{0,30}" title="Ingrese un plan valido."> 
            </div>
            <div class="form-group">
                <label>Seleccione Operador:</label>
                <select class="form-control" name="operador" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoOperador = $simcard->consultarOperador();
                        while ($valores = mysqli_fetch_array($resultadoOperador)) {
                            echo '<option value="'.$valores["id"].'">'.$valores["descripcion"].'</option>';
                        }
                    ?>  
                </select>
            </div>
            <div class="form-group">
                <label>Observacion:</label>
                <input class="form-control"  name="observacion" type="text" pattern="{0,100}"> 
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