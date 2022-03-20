<div class="modal fade" id="starModal" tabindex="-1" aria-labelledby="starModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-submit" action="{{ route('productos.favoritos.update') }}" method="post">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="starModalLabel"><div id="modal_title"></div></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <input type="hidden" id="modal_id" name="id">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>