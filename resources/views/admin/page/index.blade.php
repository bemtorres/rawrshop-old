@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Mis paginas</h3>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md-12">
        @include('admin.page._tabs')
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body table-responsive">
            <table class="table table-hover" id="tableSelect">
              <thead>
                <tr >
                  <th></th>
                  <th></th>
                  <th>Nombre</th>
                  <th>URL</th>
                </tr>
              </thead>
              <tbody id="items">
                @foreach ($paginas as $p)
                <tr data-id="{{ $p->id }}" data-position="{{ $p->posicion }}">
                  <td  class="handle">
                    <i class="fa fa-arrows-alt me-2"></i>
                  </td>
                  <td>
                    {!! $p->getStatusHTML() !!}
                    {{ $p->estado == 1 ? 'No mostrar' : 'Publicado' }}
                  </td>
                  <td>
                    <a href="{{ route('pagina.show',$p->id) }}">
                      {{ $p->titulo }}
                    </a>
                  </td>
                  <td>{{ route('home.blog',$p->code) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
@push('javascript')
<script src="{{ asset('vendors/sortableJS/js/Sortable.js') }}"></script>
<script>
  const url = "{{ route('pagina.changePosition') }}";
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