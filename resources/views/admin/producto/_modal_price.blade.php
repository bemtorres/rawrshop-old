<div class="modal fade" id="precioModal" tabindex="-1" aria-labelledby="precioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-submit" action="{{ route('productos.price.update') }}" method="post">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="precioModalLabel">Cambiar valores del producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">
          <input type="hidden" id="modal_input_id" name="id">

          <div class="col-md-4">
            <label for="modal_input_precio">Precio<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-8 form-group">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
              <input type="number" id="modal_input_precio" min="0" name="precio" class="form-control" placeholder="0" required>
            </div>
          </div>

          <div class="col-md-4">
            <label for="modal_input_precio_descuento">Precio descuento</label>
          </div>
          <div class="col-md-8 form-group">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
              <input type="number" id="modal_input_precio_descuento" min="0" name="precio_descuento" class="form-control" placeholder="0">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>