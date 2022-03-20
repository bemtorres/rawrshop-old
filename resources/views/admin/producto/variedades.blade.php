@extends('layouts.app')
@push('stylesheet')
{{-- <style>
  .handle {
	cursor: move;
	cursor: -webkit-grabbing;
}
</style> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('productos.index'))
  {{-- @slot('color', 'dark') --}}
  @slot('body', "Producto $p->nombre")
@endcomponent
@include('admin.producto._tab')
@include('admin.producto._tab_create')
<section class="section">
  <div class="card">
    {{-- <div class="card-header"></div> --}}
    <div class="card-body">
      <table id="tableSelect" class="table table-hover">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th class="text-center">Imagen</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th><span class="text-warning">$</span> Precio</th>
            <th>Precio descuento</th>
            <th>Stock</th>
            <th>Stock crítico</th>
          </tr>
        </thead>
        <tbody id="items">
          @foreach ($p->variedades as $v)
          <tr data-id="{{ $v->id }}" data-position="{{ $v->posicion }}">
            <td  class="handle">
              <i class="fa fa-arrows-alt"></i>
            </td>
            <td>
              {!! $v->present()->getVisible() !!}
              {{ $v->activo ? 'Disponible' : 'No Mostrar' }}
            </td>
            <td class="text-center">
              {{-- <img src="" alt="" width="100px" class=""> --}}
              <img src="{{ asset($v->present()->getImagen()) }}" class="rounded img-fluid" width="100" alt="Ejemplo">
            </td>
            <td>
              <a href="{{ route('variedad.edit',$v->id) }}">
                {{ $v->codigo }}
              </a>
            </td>
            <td>
              <a href="{{ route('variedad.edit',$v->id) }}">
                {{ $v->nombre }}
              </a>
            </td>
            <td>
              {{ $v->descripcion }}
              {{-- <span class="badge bg-success">{{ $p->categoria->nombre ?? '' }}</span> --}}
              {{-- <span class="badge bg-warning">{{ $p->subcategoria->nombre ?? '' }}</span> --}}
            </td>
            <td>
              $ {{ $v->getPrice() }}
            </td>
            <td>
              $ {{ $v->getPriceDescuento() }}
            </td>
            <td>
              {{ $v->stock }}
            </td>
            <td>
              {{ $v->stock_critico }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</section>

@endsection
@push('javascript')
<script src="{{ asset('vendors/sortableJS/js/Sortable.js') }}"></script>

<script>
  const url = "{{ route('variedad.changePosition',$p->id) }}";
  var el = document.getElementById('items');

  var sortable = Sortable.create(el, {
    animation: 300,
    handle: '.handle',
    sort: true,
    chosenClass: 'active',
    dataIdAttr: 'data-id',
    onEnd: function(evt) {
      var list = sortable.toArray();
      changePosition(list);
    }
  });

  function changePosition(list){
    axios
      .put(url, {
        list
      })
      .then(response => {
        popup(response);
      })
      .catch(e => {
        console.log(e);
      })
  };

  function popup(response){
    let { status } = response;
    let { message } = response.data;

    if(status == 200){
      iziToast.success({
        backgroundColor: '#47c363',
        message
      });
    }
  }
</script>

@endpush