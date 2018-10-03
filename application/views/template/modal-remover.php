<div id="modal-remover-registro" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remover <span class="tipo-registro"></span></h4>
      </div>
      <div class="modal-body">
        <p>Deseja remover <strong class="registro-nome"></strong>?</p>
        <p>A ação não poderá mais ser desfeita.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <form id="form-remover-registro" method="POST" style="display: inline">
            <button type="submit" class="btn btn-danger">Confirmar remoção</button>
        </form>
    </div>
    </div>
  </div>
</div>