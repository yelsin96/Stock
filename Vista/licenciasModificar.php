<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar Licencia</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="container">
        <?php
        session_start();

        if ($_SESSION['rolLogin'] != 'SuperAdministrador') {
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
            if (!empty($_POST['boton'])) {
                $accion = $_POST['boton'];
                if ($accion == "Modificar") {
                    $id_licencia = $_POST['id_licencia'];
                    $descripcion = $_POST['descripcion'];
                    $key = $_POST['key'];
                    $tipo_licencia = $_POST['tipo_licencia'];
                    $email_relacionado = $_POST['email_relacionado'];
                    $password_email = $_POST['password_email'];
                    $estadoLic = $_POST['estadoLic'];

                    $modificarlicencia = $licencia->modificarLicencia($id_licencia, $descripcion, $key, $tipo_licencia, $email_relacionado, $password_email, $_SESSION['userLogin'],$estadoLic);
                }
                if ($accion == "Consultar") {
                    $licenciaM = $_POST['licenciaM'];
                    $resultadoLicencia = $licencia->consultarLicencia($licenciaM);
                    $consultaM = mysqli_fetch_array($resultadoLicencia);
                    $estado = ($consultaM["id_estado"] == 1) ? "Activo" : "Inactivo" ;

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
                <h1>Modificar Licencia</h1>
            </div>
            <?php if (empty($consultaM)) { ?>
                <form action="licenciasModificar.php" method="post" name="Modlicencia">
                    <div class="form-group">
                        <label>Licencia a Modificar:</label>
                        <input class='form-control' name='licenciaM' type='text' pattern='{0,50}'
                            title='Ingrese una licencia existente' required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="boton" value="Consultar" class="btn btn-primary">
                    </div>
                </form>
            <?php } ?>
            <?php if (!empty($consultaM)) { ?>
                <form action="licenciasModificar.php" method="post" name="formlicencia">
                    <div class="form-group">
                        <label>ID Licencia:</label>
                        <input class="form-control" type="text" disabled value="<?= $consultaM["id_licencia"] ?>">
                        <input name="id_licencia" style="display: none;" type="text" value="<?= $consultaM["id_licencia"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Descripcion:</label>
                        <input class="form-control" name="descripcion" type="text" pattern="{0,150}"
                            title="Ingrese descripcion." value="<?= $consultaM["descripcion"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Key:</label>
                        <input class="form-control" name="key" type="text" pattern="{0,150}" title="Ingrese key."
                            value="<?= $consultaM["key"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo Licencia:</label>
                        <select class="form-control" name="tipo_licencia" required>
                            <option value="<?= $consultaM["tipo_licencia"] ?>"><?= $consultaM["tipo_licencia"] ?></option>
                            <option value="OEM">OEM</option>
                            <option value="RETAIL">RETAIL</option>
                            <option value="EMPRESARIAL">EMPRESARIAL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email Relacionado:</label>
                        <input class="form-control" name="email_relacionado" type="email" pattern="{0,50}"
                            title="Ingrese email relacionado a la licencia." value="<?= $consultaM["email_relacionado"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Contraseña Email:</label>
                        <input class="form-control" name="password_email" type="password" pattern="{0,50}"
                            title="Ingrese contraseña usada para el correo seleccionado."
                            value="<?= $consultaM["password_email"] ?>">
                    </div>

                    <div class="form-group">
                        <label>Estado:</label>
                        <select name="estadoLic" id="inputestadoLic" class="form-control">
                            <option value="<?= $estado?>"><?= $estado?></option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
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
</body>

</html>