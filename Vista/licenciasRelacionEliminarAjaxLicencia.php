<?php

session_start();
include '../Controlador/controladorLicencia.php';
$licencia = new licencia;
$inputPlaca = strip_tags($_REQUEST['placa']);
$resultado = $licencia->consultarLicenciaPlaca($inputPlaca);
?>
<div class="col-md-6">
    <div class="form-group">
        <label>Seleccione licencia:</label>
        <select class="form-control" name="input-licencia" id="tipo" required>
            <option value="">Seleccione:</option>
            <?php
            while ($valores = mysqli_fetch_array($resultado)) {
                echo '<option value="' . $valores["id_licencia"] . '">' . $valores["descripcion"] . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input type="submit" name="boton" value="Eliminar" class="btn btn-danger" id="eliminar">
    </div>
</div>