<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newModalLabel">Crear categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-submit form-horizontal" action="{{ route('categorias.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <label for="input-nombre_categoria">Nombre<span class="text-danger">*</span></label>
            </div>
            <div class="col-md-8 form-group">
              <input type="text" id="input-nombre_categoria" class="form-control keyUp" data-code="#input-code-cate" name="nombre" value="" placeholder="" required>
            </div>

            <div class="col-md-4">
              <label for="input-nombre">URL</label>
            </div>
            <div class="col-md-8 form-group">
              <input type="text" id="input-code-cate" readonly class="form-control" name="code" value="" placeholder="" required>
            </div>

            <div class="col-md-4">
              <label for="inputIconUno">Icono</label>
            </div>
            <div class="col-md-8 form-group font-awesome">
              <select class="form-select fa" id="inputIconUno" name="icon">
                <option value="">----------</option>
                @foreach ($icons as $ikey => $iValue)
                  <option value="{{ $ikey }}" class="fa" data-icon="{{ $iValue[1] }}">
                  {!! $iValue[2] !!} {{ $iValue[0] }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>