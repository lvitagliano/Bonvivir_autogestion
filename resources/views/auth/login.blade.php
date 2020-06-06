@extends('layouts.login')

@section('content')

<div class="container">
        <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                  <div class="card card-login">
           <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
            <div class="card-header card-header-primary text-center" style="background: linear-gradient(to right, #22bcaf, #193c64) !important">
              <h4 class="card-title">Ingresa con Redes Sociales</h4>
              <div class="social-line">
                <a href="{{ route('social.auth', 'facebook') }}" class="btn btn-just-icon btn-link">
                  <i class="fa fa-facebook-square"></i>
                </a>
                <a href="{{ route('social.auth', 'linkedin') }}" class="btn btn-just-icon btn-link">
                  <i class="fa fa-linkedin"></i>
                </a>
                <a href="{{ route('social.auth', 'google') }}" class="btn btn-just-icon btn-link">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
            </div>
            <p class="description text-center">O de manera Clásica</p>
            <div class="card-body">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">mail</i>
                  </span>
                </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                 placeholder="Email.." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
              
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
                placeholder="Password.." required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <a class="btn btn-link" href="/register" style="text-align: left; color: black; margin-top: 7px; margin-right: 10px;">
                  No estas Registrado? <b>REGISTRATE</b>
              </a>
               </div>
            <div class="col-md-12">
              <a class="btn btn-link" href="/password/reset" style="text-align: right; color: black;">
                Olvidó su contraseña? <b>Click Aquí</b>
              </a>
      </div>
            <div class="text-center mt-2 mb-2 ml-5 mr-5">
              <br>
                    <button type="submit" class="btn  btn-info   btn-round btn-block">
                      Iniciar Sesions
                        </button>

                        <br>

            </div>
		     
 
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
  $(function(){
      $('.selectpicker').selectpicker();
  });

  $('select.selectpicker').on('change', function(){
    var selected = $('.selectpicker option:selected').val();
    location.href="/lang/"+selected;
  });

  </script>

@endsection
