<?php 
    session_start();
    include '../Controlador/controladorSimcard.php';
    $simcard = new simcard;
    $operador=strip_tags($_REQUEST['operador']);
?>
    <div class="form-group">
        <label>Seleccione Simcard:</label>
        <div class="form-group col-md-6 input-group">
            
            <input type="text" name="simcard" class="form-control" id="input-simcard" > 
            <span class="input-group-btn">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                <span class="glyphicon glyphicon-search"></span>
            </button>    
            </span>
        </div>
        <?php 
        /*<select class="form-control" name="simcard" required>
            <option value="">Seleccione:</option>
            <?php
                $resultadoSimcard = $simcard->consultarSimcardOperador($operador);
                while ($valores = mysqli_fetch_array($resultadoSimcard)) {
                    echo '<option value="'.$valores["Numero_linea"].'">'.$valores["Serie"].' Serie: '.$valores["Numero_linea"].'</option>';
                }
            ?>  
        </select>*/
        ?>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="cerrar" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="staticBackdropLabel">Buscar</h5>
      </div>
      <div class="modal-body">
        <!-- Iniciar tabla -->
        <table class="table table-striped">
            <thead>
                <tr class="bg-primary">
                    <th style="width: 30%;" scope="col" class="text-center">Linea</th>
                    <th style="width: 30%;" scope="col" class="text-center">Serie</th>
                    <th style="width: 30%;" scope="col" class="text-center"></th>
                </tr>
                <tr>
                    <td scope="col"> <input type="text" class="form-control" id="input-linea" onkeyup="ajaxModal();"> </td>
                    <td scope="col"> <input type="text" class="form-control" id="input-serie" onkeyup="ajaxModal();"> </td>
                    <td scope="col"> <input type="hidden" value="<?php echo $operador?>" id="input-operador"></td>
                </tr>
            </thead>
            <tbody id="tabla-ajax">
                
            </tbody>
        </table>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>