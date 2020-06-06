@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-header card-header-primary text-center" style="background: linear-gradient(to right, #22bcaf, #193c64) !important">
                            <h4 class="card-title">Registrar Usuario</h4>
                         </div>
                        <div class="form-group row p-3">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                                required autocomplete="name" placeholder="Nombre"  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row p-3">
                            <div class="col-md-12">
                                <input id="email" type="email"  placeholder="Email" 
                                class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row p-3">
                            <div class="col-md-12">
                                <input id="password"  placeholder="Password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row p-3">
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="ConfirmarPassword"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
     </div>
    </div>
</div>
@endsection
