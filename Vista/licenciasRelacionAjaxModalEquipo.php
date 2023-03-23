<?php 
    session_start();
    include '../Controlador/controladorLicencia.php';
    $licencia = new licencia;
    $inputId=strip_tags($_REQUEST['id']);
    $inputNombre=strip_tags($_REQUEST['nombre']);    

    $resultadoArticulo = $licencia->consultarArticuloModal($inputId, $inputNombre);
    while ($valores = mysqli_fetch_array($resultadoArticulo)) {
        echo "<tr>";
        echo "<td class='text-center'>".$valores["placa"]."</td>";
        echo "<td class='text-center'>".$valores["nombre_equipo"]."</td>";
        echo "<input type='hidden' value='".$valores["placa"]."' id='placa-modalE'>";
        echo "<td class='text-center'><button id='".$valores["placa"]."' class='btn btn-link' name='relacionEquipo' type='button' onclick='seleccionarArt();'><span class='glyphicon glyphicon-hand-left'></span></button></td>";
        echo "</tr>";
    }
?>