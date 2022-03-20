@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Categorías</h3>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md-12">
        @include('admin.categoria._tabs')
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body table-responsive">
            <table class="table table-hover" id="tableSelect">
              <thead>
                <tr>
                  <th></th>
                  <th>Nombre</th>
                  <th>URL</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="items">
                @foreach ($categorias as $c)
                <tr data-id="{{ $c->id }}" data-position="{{ $c->posicion }}">
                  <td  class="handle">
                    <i class="fa fa-arrows-alt me-2"></i>
                    {!! $c->getStatusHTML() !!}
                  </td>
                  <td>
                    <a href="{{ route('categorias.show',$c->id) }}">
                      <i class="{{ $c->getIcon()[1][1] ?? '' }}"></i>
                      {{ $c->nombre }}
                    </a>
                  </td>
                  <td>{{ route('home.categoria',['c',$c->codigo]) }}</td>
                  <td>
                    <span type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newModalSub" data-bs-id="{{ $c->id }}">
                      Agregar
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>Subcategoría</strong></div>
        <div class="card-body table-responsive">
          <table class="table table-hover" id="tableSelect">
            <thead>
              <tr>
                <th>Categoría</th>
                <th>Subcategoría</th>
                <th>URL</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categorias as $c)
              @foreach ($c->subs as $sub)
              <tr>
                <td>
                  <i class="{{ $sub->getIcon()[1][1] ?? '' }}"></i>
                  {{ $sub->nombre }}
                </td>
                <td>
                  {{ $c->nombre }}
                </td>
                <td>{{ route('home.categoria',['s',$sub->codigo]) }}</td>
              </tr>
              @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.categoria._modal_create')
@include('admin.categoria._modal_create_sub')
@endsection
@push('javascript')
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="vendor/dinobox/datatables-es.js"></script>
<script>
  var createModal = document.getElementById('newModalSub')
  createModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-bs-id');
    // var modalBodyInput = createModal.querySelector('.modal-body input[id="modal-id"]');
    var inputId = document.getElementById('modal-id');
    inputId.value = id;
  });

  $(".keyUp").keyup(function() {
    $($(this).data("code")).val(makeSlug(this.value));
  });

  function makeSlug(text) {
    var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';
    var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';
    var p = new RegExp(a.split('').join('|'), 'g');

    return text.toString().toLowerCase().replace(/\s+/g, '-')
        .replace(p, function (c) {
            return b.charAt(a.indexOf(c));
        })
        .replace(/&/g, '-y-')
        .replace(/[^\w\-]+/g, '')
        .replace(/\-\-+/g, '-')
        .replace(/^-+/, '')
        .replace(/-+$/, '');
  }
</script>

<script src="{{ asset('vendors/sortableJS/js/Sortable.js') }}"></script>

<script>
  const url = "{{ route('categoria.changePosition') }}";
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