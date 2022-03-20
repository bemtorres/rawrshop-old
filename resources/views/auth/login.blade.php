<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rawrshop - Iniciar sesión</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/mazer/css/pages/auth.css') }}">
</head>
<body>
<div class="app">
  <div class="container col-xl-10 col-xxl-8 py-5">
    <div class="row align-items-center py-5">
      <div class="col-lg-7 text-center text-lg-start d-none d-sm-block">
        <img src="{{ asset('assets/rawrshop/shop.gif') }}" class="figure-img img-fluid rounded shadow-lg" alt="">
        {{-- <h1 class="display-4 fw-bold lh-1 mb-3">Vertically centered hero sign-up form</h1> --}}
        {{-- <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> --}}
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <div class="text-center">
          <div class="mb-2">
            <img src="{{ asset($t->present()->getLogo()) }}" width="100px" class="figure-img img-fluid rounded shadow" alt="">
          </div>
          <h3 class="mb-3">
            {{ $t->nombre ?? '' }}
          </h3>
        </div>
        {{-- <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> --}}

        <form class="p-4 p-md-5 border rounded-3 bg-light form-submit" action="{{ route('acceso') }}" method="post">
          @csrf
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="name@example.com" required>
            <label for="inputEmail">Correo electrónico</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
            <label for="inputPassword">Contraseña</label>
          </div>
          {{-- <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div> --}}
          <button class="w-100 btn btn-lg btn-primary" type="submit"><strong>ENTRAR</strong></button>
          {{-- <hr class="my-4">
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small> --}}
        </form>
      </div>
    </div>
  </div>
</div>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>