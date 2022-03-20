@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Configuración de mi página</h3>
        <p class="text-subtitle text-muted">Gestiona tu página de forma rápida y sencilla</p>
      </div>
    </div>
  </div>
  @include('admin.tienda._tabs_web_principal')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="fa fa-store-alt me-2"></i>
                Mi página
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.theme.update') }}">
                @csrf
                @method("PUT")
                <div class="form-body">
                  <div class="row">

                    <div class="col-md-4">
                      <label for="inputColorUno">Color encabezado</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select class="form-select" id="inputColorUno" name="header">
                        @foreach ($colors as $ckey => $cValue)
                        <option value="{{ $cValue }}" class="text-{{ $cValue }}"
                          {{ $t->presentFooter()->getColorHeader() == $cValue ? 'selected' : '' }}>
                          <strong>{{ Str::upper($cValue) }}</strong>
                        </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-4">
                      <label for="inputColorUno">Color entre medio</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select class="form-select" id="inputColorUno" name="nav">
                        @foreach ($colors as $ckey => $cValue)
                        <option value="{{ $cValue }}" class="text-{{ $cValue }}"
                          {{ $t->presentFooter()->getColorNav() == $cValue ? 'selected' : '' }}>
                          <strong>{{ Str::upper($cValue) }}</strong>
                        </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-4">
                      <label for="inputColorUno">Color pie de página</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select class="form-select" id="inputColorUno" name="footer">
                        @foreach ($colors as $ckey => $cValue)
                        <option value="{{ $cValue }}" class="text-{{ $cValue }}"
                          {{ $t->presentFooter()->getColorFooter() == $cValue ? 'selected' : '' }}>
                          <strong>{{ Str::upper($cValue) }}</strong>
                        </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-4">
                      <label for="footer_cart">Color de pie de página carrito <br><small class="text-primary">Solo se ve de forma responsiva</small></label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select class="form-select" id="footer_cart" name="footer_cart">
                        @foreach ($colors as $ckey => $cValue)
                        <option value="{{ $cValue }}" class="text-{{ $cValue }}"
                          {{ $t->presentFooter()->getColorFooterCart() == $cValue ? 'selected' : '' }}>
                          <strong>{{ Str::upper($cValue) }}</strong>
                        </option>
                        @endforeach
                      </select>
                    </div>


                    <div class="col-md-4">
                      <label for="inputColorUno">Color de fondo <br><small class="text-primary">Por defecto hemos dejado #EBEBEB como color de fondo</small></label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" class="form-control" name="background" value="{{ $t->presentFooter()->getColorBackground() }}" id='colorpicker'>
                    </div>

                    <div class="col-md-4">
                      <label for="theme">Temas<br>
                        <small class="text-primary">Modificará el tema principal</small>
                      </label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select class="form-select" id="theme" name="theme">
                        @foreach ($themes as $tKey => $tValue)
                          <option value="{{ $tKey }}" {{ $t->getConfigTheme() == $tKey ? 'selected' : '' }}>
                            {{ $tValue }}
                          </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-4">
                      <label for="theme_admin">Habilitar theme administrador<br>
                        <small class="text-primary">Modificaras el tema del administrador</small>
                      </label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select class="form-select" id="theme_admin" name="theme_admin">
                        @foreach ($themes as $tKey => $tValue)
                          <option value="{{ $tKey }}" {{ $t->getConfigThemeAdmin() == $tKey ? 'selected' : '' }}>
                            {{ $tValue }}
                          </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-sm-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
@push('javascript')
<script>
  $("#colorpicker").spectrum({
    type: "component",
    togglePaletteOnly: true,
    showInput: true,
    showInitial: true
  });
</script>
@endpush