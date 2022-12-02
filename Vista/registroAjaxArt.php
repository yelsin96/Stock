<?php 
    include '../Controlador/controladorRegistro.php';
    $registro = new registro;
    $tipo=strip_tags($_REQUEST['tipo']);
?>
    <label>Articulo:</label>
    <div class="form-group col-md-6 input-group">
        
        <input type="text" name="articulo" class="form-control" id="input-articulos" >
        <!--<select class="form-control" name="articulo" required>
            <option value="">Seleccione:</option>
            <?php
                /*$resultadoArticulo = $registro->consultarArticuloTipo($tipo);
                while ($valores = mysqli_fetch_array($resultadoArticulo)) {
                    echo '<option value="'.$valores["placa"].'">'.$valores["descripcion"].' '.$valores["placa"].'</option>';
                }*/
            ?>  
        </select> -->    
        <span class="input-group-btn">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            <span class="glyphicon glyphicon-search"></span>
        </button>    
        </span>
    </div>

<!-- Button trigger modal -->


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
                    <th style="width: 30%;" scope="col" class="text-center">ID</th>
                    <th style="width: 30%;" scope="col" class="text-center">Nombre</th>
                    <th style="width: 30%;" scope="col" class="text-center"></th>
                </tr>
                <tr>
                    <td scope="col"> <input type="text" class="form-control" id="input-id" onkeyup="ajaxModal();"> </td>
                    <td scope="col"> <input type="text" class="form-control" id="input-nombre" onkeyup="ajaxModal();"> </td>
                    <td scope="col"> <input type="hidden" value="<?php echo $tipo?>" id="input-tipo"></td>
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