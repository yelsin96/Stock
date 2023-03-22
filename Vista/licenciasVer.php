<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Licencia</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/scripRegArt.js"></script>
</head>

<body>
    <div class="container">

        <?php
        session_start();

        if( $_SESSION['rolLogin'] != 'SuperAdministrador'){
            session_destroy();
            header('Location: ../../errores/403/index.html');
            exit;
        }

        if (!isset($_SESSION['userLogin'])) {
            header('Location: login.php');
            exit;
        } else {

            include "Menu.php";
            include '../Controlador/controladorLicencia.php';
            $licencia = new licencia;



            if (!empty($_GET['id_licencia'])) {
                $id_licencia = $_GET['id_licencia']; //id de caracteristica a modificar
                //$idM = $_POST['idM'];
                $resultadoDato = $licencia->verLicencia($id_licencia);
                $row = mysqli_fetch_array($resultadoDato);

                if (empty($row)) {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> No se encontraron Registros";
                    echo "	<strong>Desea ingresar carecteristicas del equipo ".$placa." !  </strong>";
				    echo "	<a href='ingresarCaracteristicas.php?activo=".$placa."'><input type='button' class='btn btn-primary' value='insertar'></a> ";
                    echo "</div>";
                    
                }
            }
            ?>

            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Licencia</b></h2>
                        </div>
                    </div>
                </div>
                <?php if (empty($row)) { ?>
                <div class="row">
                    <a href="licenciasReport.php">
                        <input type='button' value='volver' class="btn btn-primary">
                    </a>
                </div>
                <?php } ?>
                <?php if (!empty($row)) { ?>
                <div class="row">
                    <form action="mirarCaracteristica.php" method="post" name="formLicencia">
                        <div class="form-group col-md-2">
                            <label>ID LICENCIA:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["id_licencia"] . "' type='text'>" ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label>DESCRIPCION:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["descLicencia"] . "' type='text'>" ?>
                        </div>

                        <div class="form-group col-md-4">
                            <label>TIPO LICENCIA:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["tipo_licencia"] . "' type='text'>" ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label>KEY:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["key"] . "' type='text'>" ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>EMAIL RELACIONADO:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["email_relacionado"] . "' type='text'>" ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label>CONTRASEÑA EMAIL:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["password_email"] . "' type='text'>" ?>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label>EQUIPO:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["nombre_equipo"] . "' type='text'>" ?>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>ESTADO:</label>
                            <?php echo "<input class='form-control' disabled value='" . $row["descEstado"] . "' type='text'>" ?>
                        </div>
                        

                        <div class="form-group col-md-12">
                            <a href='licenciasReport.php'><input type='button' value='Volver' class="btn btn-primary"></a>
                        </div>

                    </form>
                </div>
                    <?php
                }
        }
        ?>
        </div>
        <script type="text/javascript" src='js/jquery.min.js'></script>
        <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>

</html>