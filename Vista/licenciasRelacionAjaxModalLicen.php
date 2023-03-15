<?php 
    session_start();
    include '../Controlador/controladorLicencia.php';
    $licencia = new licencia;
    $inputId=strip_tags($_REQUEST['id']);
    $inputNombre=strip_tags($_REQUEST['nombre']);    

    $resultadoLicencia = $licencia->consultarLicenciaoModal($inputId, $inputNombre);
    while ($valores = mysqli_fetch_array($resultadoLicencia)) {
        if (empty($valores["relLicencia"]) || $valores["tipo_licencia"] == "EMPRESARIAL") {
            echo "<tr>";
            echo "<td class='text-center'>".$valores["id_licencia"]."</td>";
            echo "<td class='text-center'>".$valores["descripcion"]."</td>";
            echo "<input type='hidden' value='".$valores["id_licencia"]."' id='placa-modalL-".$valores["id_licencia"]."'>";
            echo "<td class='text-center'><button id='".$valores["id_licencia"]."' class='btn btn-link' name='relacionLicencia' type='button' onclick='seleccionarLicencia()'><span class='glyphicon glyphicon-hand-left'></span></button></td>";
            echo "</tr>";
        }
        
    }
?>