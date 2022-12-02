<?php 
    include '../Controlador/controladorSimcard.php';
    $simcard = new simcard;
    $operador=strip_tags($_REQUEST['operador']);
?>
    <div class="form-group">
        <label>Seleccione Simcard:</label>
        <select class="form-control" name="simcard" required>
            <option value="">Seleccione:</option>
            <?php
                $resultadoSimcard = $simcard->consultarSimcardOperador($operador);
                while ($valores = mysqli_fetch_array($resultadoSimcard)) {
                    echo '<option value="'.$valores["Numero_linea"].'">'.$valores["Serie"].' Serie: '.$valores["Numero_linea"].'</option>';
                }
            ?>  
        </select>
    </div>