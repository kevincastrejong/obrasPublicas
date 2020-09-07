
<!-- Modal -->
<div class="modal fade" id="modal-pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mis datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-pass" class="form-horizontal form-label-left" action="../controllers/account/up_pass.php" method="POST" novalidate>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pass">New password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="pass" class="form-control col-md-7 col-xs-12" name="pass" data-validate-length="6,8" placeholder="Nueva contraseña"  required="required" type="password">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pass2">Confirmar new password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" id="pass2" name="pass2" data-validate-linked="pass" placeholder="confirmar nueva contraseña"  required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $_SESSION['Id'] ?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="send-pass-update" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>