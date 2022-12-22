<?php 
    include '../Controlador/controladorSimcard.php';
    $simcard = new simcard;
    $inputLinea=strip_tags($_REQUEST['linea']);
    $inputSerie=strip_tags($_REQUEST['serie']);
    $inputOperador=strip_tags($_REQUEST['operador']);
    

    $resultadoSimcard = $simcard->consultarSimcardModal($inputLinea, $inputSerie, $inputOperador);
    while ($valores = mysqli_fetch_array($resultadoSimcard)) {
        echo "<tr>";
        echo "<td class='text-center'>".$valores["Numero_linea"]."</td>";
        echo "<td class='text-center'>".$valores["Serie"]."</td>";
        echo "<td class='text-center'><button id='".$valores["Numero_linea"]."' class='btn btn-link' name='prueba' type='button' onclick='seleccionarSimcard()'><span class='glyphicon glyphicon-hand-left'></span></button></td>";
        echo "</tr>";
    }
?>