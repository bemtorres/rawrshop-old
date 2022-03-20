@extends('home.app')
@push('stylesheet')

@endpush
@section('content')
<div class="px-4 py-5 my-5 text-center">
  <h3 class="display-5 fw-bold">
    <i class="fas fa-hammer"></i>
    {{ $t->nombre }}
  </h3>
  <img class="d-block mx-auto my-4 rounded" src="{{ $t->present()->getLogo() }}" alt="" width="172" height="157">
  <h1 class="display-5 fw-bold">
    SITIO EN MANTENIMIENTO
  </h1>
  {{-- <div class="col-lg-6 mx-auto"> --}}
    {{-- <p class="lead mb-4"></p> --}}
    {{-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center"> --}}
      {{-- <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button> --}}
      {{-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button> --}}
    {{-- </div> --}}
  {{-- </div> --}}
</div>

@endsection
@push('javascript')

@endpush
