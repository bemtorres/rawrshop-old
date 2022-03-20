@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
@component('components.button._back')
@slot('route', route('pagina.index'))
{{-- @slot('color', 'dark') --}}
@slot('body', "Control de Página web")
@endcomponent
<div class="page-heading">
  @include('admin.page._tab')

  <div class="page-heading">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h2>{{ $p->titulo }}</h2>
          <div class="page-heading">
            {!! $p->getContenidoBody() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')
@endpush