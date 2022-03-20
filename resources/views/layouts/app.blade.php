@extends('layouts.skeleton')
@push('stylesheet')
<style>
  #main {
    padding: 1rem;
  }
</style>
@if (current_shop()->getConfigThemeAdmin())
  <link rel="stylesheet" href="{{ current_shop()->getConfigThemeAdminCSS() }}">
@endif
@endpush
@section('app')
@include('layouts._sidebar')
<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>
  @yield('content')
  @include('layouts._footer')
</div>
@endsection
@push('javascript')
@endpush

