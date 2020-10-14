@extends('layouts.plantilla')
@section('titulo')
    iniciar sesion
@endsection
@section('contenido')

<div style="margin-top: 4vh;margin-bottom: 7vh;">
    <div class="col-8 offset-2 row" id="divimglog" style="padding: 0;height: 63vh;border: 1px solid; border-radius: 10px;">

        <div class="col-6"  >
            
        </div>

        <div class="col-6" style="background-color: whitesmoke;border-radius: 10px;">
           <h3 style="text-align: center; margin-top: 15vh;">Inicia sesion en tu cuenta</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>
    
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
    
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                            <label class="form-check-label" for="remember">
                                {{ __('Recuerdame') }}
                            </label>
                        </div>
                    </div>
                </div>
    
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary" style="margin-left: 12vh;">
                            {{ __('Iniciar sesion') }}
                        </button>
                            <br>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" style="margin-left:inherit;" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


    
</div>
@endsection
