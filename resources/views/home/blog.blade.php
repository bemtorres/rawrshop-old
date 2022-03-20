@extends('home.app')
@push('stylesheet')
@endpush
@section('content')
@include('home._header')
@include('home._nav')
@include('home._slider_banner')
<div class="container">
  <div class="row">
    <div class="my-3">
      {!! $p->getContenidoBody() !!}
    </div>
  </div>
</div>
@endsection
@push('javascript')
@endpush