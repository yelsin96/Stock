<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro Licencias</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <script type="text/javascript" src="js/scriptRelLicencia.js"></script>
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
            $licencia = new licencia;
            $PlacaGuardada = "";
            if (!empty($_POST['input-placa'])) {
                $PlacaGuardada = $_POST['input-placa'];
            }

            if (!empty($_POST['boton'])){
                $accion = $_POST['boton'];
                $licenciaId = $_POST['input-licencia'];
                $Placa = $_POST['input-placa'];

                if ($accion == "Insertar") {
                    $licencia->insertarRegistrolicencia($licenciaId,$Placa,$_SESSION['userLogin']);
                }
            }
        ?>

        <div class="page-header">
            <h1>Ingresar Registro Licencia</h1>
        </div>
        <form action="licenciasRelacion.php" method="post" name="formRegistro">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Seleccione Equipo:</label>
                        <div class="form-group col-md-12 input-group">
                            
                            <input type="text" name="input-placa" class="form-control" id="input-placa" value="<?= $PlacaGuardada ?>" required> 
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdropE">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>    
                            </span>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdropE" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelE" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" id="cerrar" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="staticBackdropLabelE">Buscar</h5>
                                </div>
                                <div class="modal-body">
                                    <!-- Iniciar tabla -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th style="width: 30%;" scope="col" class="text-center">Placa</th>
                                                <th style="width: 30%;" scope="col" class="text-center">Nombre Equipo</th>
                                                <th style="width: 30%;" scope="col" class="text-center"></th>
                                            </tr>
                                            <tr>
                                                <td scope="col"> <input type="text" class="form-control" id="input-idEquipo" onkeyup="ajaxModalE();" placeholder="M-0000"> </td>
                                                <td scope="col"> <input type="text" class="form-control" id="input-nombreEquipo" onkeyup="ajaxModalE();" placeholder="PC-ADMINISTRACION"> </td>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla-ajaxEquipo">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Seleccione Licencia:</label>
                        <div class="form-group col-md-12 input-group">
                            
                            <input type="text" name="input-licencia" class="form-control" id="input-licencia" required> 
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdropL">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>    
                            </span>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdropL" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelL" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" id="cerrarL" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="staticBackdropLabelL">Buscar</h5>
                                </div>
                                <div class="modal-body">
                                    <!-- Iniciar tabla -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th style="width: 30%;" scope="col" class="text-center">ID Licencia</th>
                                                <th style="width: 30%;" scope="col" class="text-center">Descripcion Licencia</th>
                                                <th style="width: 30%;" scope="col" class="text-center"></th>
                                            </tr>
                                            <tr>
                                                <td scope="col"> <input type="text" class="form-control" id="input-idLicencia" onkeyup="ajaxModalL();" placeholder="LCM-0000-LCS-0000"> </td>
                                                <td scope="col"> <input type="text" class="form-control" id="input-nombreLicencia" onkeyup="ajaxModalL();" placeholder="WINDOWS 10 PRO"> </td>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla-ajaxLicencia">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" name="boton" value="Insertar" class="btn btn-primary">
            </div>
        </form>

    </div>
	
    <?php } ?>
	
</body>
</html>