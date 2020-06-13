@extends('layouts.plantilla')

@section('titulo')
    Mi local
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@endsection

@section('contenido')
    <div class="container my-4">
        <div class="row justify-content-between">
            <div class="col-2 ">
                <input type="hidden" id="cc" value="{{session('document').'.png'}}">
                <div id="modulo">
                    <fotos-component></fotos-component>
                </div>
               
            </div>
            <div class="col-4 ">
                <div class="row justify-content-start">
                <h3>{{$local[0]->local_name}}</h3>
                </div>
                <div class="row">
                    {!! Form::open(array('url' => 'editarLocal','method' => 'put', 'id' => 'editarLocal')) !!}
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection