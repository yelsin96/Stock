<?php 
    session_start();
    include '../Controlador/controladorRegistro.php';
    $registro = new registro;
    $inputId=strip_tags($_REQUEST['id']);
    $inputNombre=strip_tags($_REQUEST['nombre']);
    $inputTipo=strip_tags($_REQUEST['tipo']);
    

    $resultadoArticulo = $registro->consultarArticuloModal($inputTipo, $inputId, $inputNombre);
    while ($valores = mysqli_fetch_array($resultadoArticulo)) {
        echo "<tr>";
        echo "<td class='text-center'>".$valores["placa"]."</td>";
        echo "<td class='text-center'>".$valores["descripcion"]."</td>";
        echo "<input type='hidden' value='".$valores["placa"]."' id='placa-modal-".$valores["placa"]."'>";
        echo "<td class='text-center'><button id='".$valores["placa"]."' class='btn btn-link' name='prueba' type='button' onclick='seleccionarArt()'><span class='glyphicon glyphicon-hand-left'></span></button></td>";
        echo "</tr>";
    }
?>