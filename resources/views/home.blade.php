@extends('layouts.plantilla')

@section('titulo')
    Mi local
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@endsection

@section('contenido')
    <div class="container my-4">
        <div id="modulo">
        <div class="row justify-content-between">
            <div class="col-2">
                <input type="hidden" id="cc" value="{{session('document').'.png'}}">
                <div>
                    <fotos-component></fotos-component>
                </div>
               
            </div>
       
               
            <datos-component v-bind:datos-local="{{ $local }}"></datos-component>
            
        </div>
    </div>
    </div>
@endsection

@section('scripts')

@endsection