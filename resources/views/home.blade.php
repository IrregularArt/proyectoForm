@extends('layouts.plantilla')

@section('titulo')
    Mi local
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection

@section('contenido')
    <div class="container my-4">
        <div id="modulo">
        <div class="row justify-content-between">
            <div class="col-2">
                <input type="hidden" id="cc" value="{{session('document').'.png'}}">
            <input type="hidden" id="idLocal" value="{{$local[0]->id}}">
            <input type="hidden" id="imagenLocal">
                <div>
                    <fotos-component :editar="2"></fotos-component>
                </div>
               
            </div>
            <datos-component v-bind:datos-local="{{ $local }}"></datos-component> 
        </div>
           
           
            <productos-component></productos-component>
           
        
    </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap-tagsinput.js')}}"></script>
@endsection