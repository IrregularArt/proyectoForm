@extends('layouts.app')

@section('content')

<div class="col-6 offset-3" style="background-color: #48c167;border-radius: 10px;">
                
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <h1 style="text-align: center;margin-top: 10px;">Restablecer contraseña</h1>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size: 20px;">{{ __('Correo Electronico:') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn " style="margin-bottom: 10px; background-color: aliceblue;">
                    {{ __('Enviar Link Para Restablecer') }}
                </button>
            </div>
        </div>
    </form>
               
</div>
@endsection
