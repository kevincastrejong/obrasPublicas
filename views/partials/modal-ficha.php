<?php
require '../controllers/conexion/conexion.php';
if(isset($_SESSION['Logged'])){
  $sel = $con->query("SELECT * FROM rubros");
  $row = mysqli_num_rows($sel);

  $sel2 = $con->query("SELECT * FROM fuente");
  $row2 = mysqli_num_rows($sel);
?>
<!-- Modal -->
<div class="modal fade" id="modal-ficha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacion de la Ficha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="newFicha" action="../controllers/fichas/updateFicha.php" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obra">Obra <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="obra" class="form-control col-md-7 col-xs-12" name="obra" placeholder="Obra" required="required" type="text">
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nObra">Numero de obra</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="nObra" class="form-control col-md-7 col-xs-12"  name="nObra" placeholder="Numero de obra" type="text">
        </div>
      </div>
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nContrato">Numero de contrato <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="nContrato" class="form-control col-md-7 col-xs-12"  name="nContrato" placeholder="Numero de contrato" required="required" type="text">
        </div>
      </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fuente del recurso</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="fuente" name="fuente" class="form-control col-md-7 col-xs-12" required="required">
            <option value="" selected>Elige una fuente</option>
            <?php while($f = $sel2->fetch_assoc()){ ?>
                <option value="<?php echo $f['Id'] ?>"><?php echo $f['Name'] ?></option>
            <?php } ?>
            </select>
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Rubro</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="rubro" name="rubro" class="form-control col-md-7 col-xs-12" required="required">
            <option value="" selected>Elige un rubro</option>
            <?php while($f = $sel->fetch_assoc()){ ?>
                <option value="<?php echo $f['Id'] ?>"><?php echo $f['Name'] ?></option>
            <?php } ?>
            </select>
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contratista">Contratista <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="contratista" class="form-control col-md-7 col-xs-12"  name="contratista" placeholder="Contratista" required="required" type="text">
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="localidad">Localidad <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="localidad" class="form-control col-md-7 col-xs-12" name="localidad" placeholder="Localidad" required="required" type="text">
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="direccion" class="form-control col-md-7 col-xs-12" name="direccion" placeholder="Dirección" required="required" type="text">
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="municipio">Municipio <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="municipio" class="form-control col-md-7 col-xs-12" name="municipio" placeholder="Municipio" required="required" type="text">
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monto">Monto <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="monto" class="form-control col-md-7 col-xs-12" name="monto" placeholder="Monto" required="required" type="number">
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pobBeneficiada">Poblacion beneficiada <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="pobBeneficiada" class="form-control col-md-7 col-xs-12" name="pobBeneficiada" placeholder="Poblacion beneficiada" required="required" type="number">
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta">Meta <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="meta" class="form-control col-md-7 col-xs-12" name="meta" placeholder="Meta" required="required" type="text">
        </div>
        </div>
        <div class="item form-group">
        <label for="fInicio" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="fInicio" type="date" name="fInicio" class="form-control col-md-7 col-xs-12" required="required" readonly="readonly">
        </div>
        </div>
        <div class="item form-group">
        <label for="fTerminacion" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Terminación<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="fTerminacion" type="date" name="fTerminacion" class="form-control col-md-7 col-xs-12" required="required" readonly="readonly">
        </div>
        </div>
        <div id="rangos" class="item form-group">
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción de los trabajos<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea id="descripcion" class="form-control col-md-7 col-xs-12" name="descripcion" placeholder="Descripción de los trabajos" required="required"></textarea>
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="antecedentes">Antecedentes <span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea id="antecedentes" class="form-control col-md-7 col-xs-12" name="antecedentes" placeholder="Antecedentes" required="required"></textarea>
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="objetivo">Objetivo <span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea id="objetivo" class="form-control col-md-7 col-xs-12" name="objetivo" placeholder="Objetivo" required="required"></textarea>
        </div>
        </div>
        <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observaciones <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea id="observaciones" class="form-control col-md-7 col-xs-12" name="observaciones" placeholder="Observaciones" required="required"></textarea>
        </div>
        </div>
        <!-- <div class="item form-group">
        <label for="files" class="control-label col-md-3 col-sm-3 col-xs-12">Archivos</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="files" type="file" name="files" class="form-control col-md-7 col-xs-12" required="required">
        </div>
        </div> -->
        <!-- <input type="hidden" name="allRanges" id="allRanges" /> -->
        <input id="id" type="hidden" name="id">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="send-ficha-update" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php 
}
else{
  header('location:../index.php');
}
?>