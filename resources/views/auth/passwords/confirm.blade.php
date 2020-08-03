@extends('layouts.app')

@section('content')

<div class="col-6 offset-3"  style="background-color: white;border-radius: 20px;">
    
    <h2 style="text-align: center;font-weight: bold;">Confirmar contraseña</h2>
    <h3 style="text-align: center;">Por favor confirma tu contraseña antes de continuar</h3>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group row">
            <label for="password" style="font-size: 19px;" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4" style="margin-bottom: 20px;">
                <button type="submit" class="btn btn-primary">
                    {{ __('Confirmar') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>
                    
                
@endsection
