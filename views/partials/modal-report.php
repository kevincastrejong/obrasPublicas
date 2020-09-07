<!-- Modal -->
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacion de la Ficha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-report" class="form-horizontal form-label-left" action="../controllers/reports/updateReport.php" method="POST" enctype="multipart/form-data" novalidate>
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Avance <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="avance" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="1" name="avance" placeholder="Avance" required="required" type="number">
            </div>
            </div>
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observaciones <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="observaciones" class="form-control col-md-7 col-xs-12" data-validate-words="2" name="observaciones" placeholder="Observaciones" required="required"></textarea>
            </div>
            </div>
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gasto">Gasto <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="gasto" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="gasto" placeholder="Gasto" required="required" type="number">
            </div>
            </div>
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Url de archivos <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="url" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="url" placeholder="Url de archivos" required="required" type="url">
            </div>
            </div>
            <input id="id" type="hidden" name="id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="send-report-update" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>