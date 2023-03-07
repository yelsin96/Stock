<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar Articulo</title> 
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
            include '../Controlador/controladorArticulo.php';
            $articulo = new articulo;
            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                if ($accion == "Modificar") {
                    $placa = $_POST['placa'];
                    $descripcion = $_POST['descripcion'];
                    $tipo = $_POST['tipo'];
                    $ubicacion = $_POST['ubicacion'];
                    $observacion = $_POST['observacion'];
                    $id_datos = $_POST['id_datos'];

                    $modificarArticulo = $articulo->modificarArticulo($placa,$descripcion,$tipo,$ubicacion,$observacion,$id_datos,$_SESSION['userLogin']);
                }
                if ($accion == "Consultar") {
                    $placaM = $_POST['placaM'];
                    $resultadoArticulo=$articulo->consultarArticulo($placaM);
                    $consultaM = mysqli_fetch_array($resultadoArticulo);
                    
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
            <h1>Modificar Articulo</h1>
        </div>
        <?php if (empty($consultaM)){ ?>
        <form action="modificarArticulo.php" method="post" name="ModArticulo">
            <div class="form-group">
                <label>Placa a Modificar:</label>
                <input class='form-control' name='placaM' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,7}' title='Ingrese un numero de Placa valido.' required>
            </div>
            <div class="form-group">
                <input type="submit" name="boton" value="Consultar" class="btn btn-primary">
            </div>
        </form>
        <?php } ?>
        <?php if (!empty($consultaM)){ ?>
        <form action="modificarArticulo.php" method="post" name="formArticulo">
            <div class="form-group">
                <label>Placa:</label>
                <?php echo "<input class='form-control' style='display:none;' value='".$consultaM["placa"]."' name='placa' type='text'>"  ?>
                <?php echo "<input class='form-control' disabled value='".$consultaM["placa"]."' type='text'>"  ?>

            </div>
            <div class="form-group">
                <label>Descripcion:</label>
                <?php  echo "<input class='form-control' value='".$consultaM["descripcion"]."' name='descripcion' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{1,40}' required> "; ?>
            </div>
            <div class="form-group">
                <label>Seleccione Tipo:</label>
                <select class="form-control" name="tipo" required>
                    <option value="">Seleccione:</option>
                    <?php
                        $resultadoTipo = $articulo->consultarTipo();
                        while ($valores = mysqli_fetch_array($resultadoTipo)) {
                            if ($valores["id"] == $consultaM["tipo_id"]) {
                                echo '<option value="'.$valores["id"].'" selected>'.$valores["descripcion"].'</option>';   
                            }else{
                                echo '<option value="'.$valores["id"].'">'.$valores["descripcion"].'</option>';  
                            }
                        }
                    ?>  
                </select>
            </div>
            <div class="form-group">
                <?php echo "<input class='form-control' style='display:none;' value='".$consultaM["ubicacion_id"]."' name='ubicacion' type='text'>"  ?>
            </div>
            <div class="form-group">
                <label>Observacion:</label>
                <?php echo "<input class='form-control' value='".$consultaM["observacion"]."' name='observacion' type='text' pattern='[a-zA-ZÀ-ÿ\u00f1\u00d1\0-9 ]{0,120}'>";  ?>
            </div>
            
            <?php echo "<input class='form-control' value='".$consultaM["id_datos"]."' name='id_datos' type='hidden' >"  ?>
            
            <div class="form-group">
                <input type="submit" name="boton" value="Modificar" class="btn btn-primary">
            </div>
                   
            <?php 
			if($consultaM["id_datos"] != NULL ){
				echo "<a href='update.php?id_datos=".$consultaM["id_datos"]."'><input type='button' class='btn btn-primary' value='Modificar Caracteristicas'></a>" ;
			}else{
                echo "<a href='ingresarCaracteristicas.php?activo=".$consultaM["placa"]."'><input type='button' class='btn btn-primary' value='Insertar Caracteristicas'></a>" ;
            }
            ?>
           
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