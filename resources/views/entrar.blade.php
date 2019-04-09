<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>StreetFood</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="{{asset('css/floating-labels.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" role="form" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="text-center mb-4">
        <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">INGRESA</h1>
        <p>Bienvenido a Street Food, inicia sesion con tu dirección email y tu contraseña, si no estas registrado <br> <a href="{{ route('register') }}">Registrate aquí</a></p>
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-sm-12">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control input-sm" id="inputEmail3" placeholder="Correo" required autofocus>
            @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-sm-12">
            <input type="password" name="password" class="form-control input-sm" id="inputPassword3" placeholder="Contraseña" size="1" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
            <a href="{{ route('password.request') }}"><p class="text-center">¿Olvidastes Tu contraseña?</p></a>
        </div>
      <div class="col-sm-12">
        <button class="btn btn-primary  btn-block" type="submit">Ingresar</button>
      </div>
      </div>

      <p class="mt-5 mb-3 text-muted text-center">&copy; Street Food</p>
    </form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
