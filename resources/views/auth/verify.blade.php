@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="text-align: center; font-size: 30px;" class="card-header">{{ __('Verifica tu direccion de correo electronico') }}</div>

                <div class="card-body" style="font-size: 20px;">
                    <!--@if (session('resent'))-->
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificacion ha sido enviado a tu direccion de telefono.') }}
                        </div>
                    <!--@endif-->

                    {{ __('Antes de proceder, por favor mira tu correo electronico para el link de verificacion.') }}
                    {{ __('Si no has recibido el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }} ">
                    <!--   -> ESTA LINEA VA EN LA LINEA DE ARRIBA, EN EL FORM, SOLO LA QUITE PARA PODER ENTRAR -->
                        @csrf
                        <button style="font-size: 20px;" type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click aqui para recibir otro') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
