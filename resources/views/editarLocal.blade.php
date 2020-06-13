@extends('layouts.plantilla')

@section('titulo')
    Agregar mi local
@endsection
@section('links')
<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
@endsection

@section('contenido')
<div class="row justify-content-md-center">
    <div id="modulo" class="col-6">
            
            <Fotos-component></Fotos-component> 
        {{ Form::open(array('url' => 'registrarLocal','method' => 'put', 'id' => 'registrarLocal')) }}
       <!-- <form action="crearEditarLocal" url="" method="POST">-->
            {{ Form::hidden('imagenLocal', '',  array('id' => 'imagenLocal')) }}
      
            <div class="form-row">
            	<div class="form-group col-4">
                	<label for="nombreLocal">Nombre de su local:</label>
                    <input type="text" name="nombreLocal" id="nombreLocal" class="form-control">
                    @error('nombreLocal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	            </div>
	            <div class="form-group col-4">
	                <label>Direccion:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control">
                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	            </div>
            </div>
            <div class="form-row">
            	<div class="form-group col-4">
	                <label>Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"></input>
                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	            </div>
	            <div class="form-group col-4">
	                <label>Whatsapp</label>
                    <input type="text" id="whatsapp" name="whatsapp" class="form-control">
                    @error('whatsapp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	            </div>
            </div>
            <div class="form-group col-4">
                <label>Otros datos</label>
                <textarea class="form-control" id="otros" name="otros">
                    
                </textarea>
                @error('otros')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>  
            {{ Form::close() }}
        <mapa-component></mapa-component>
        <button class="btn btn-primary" onclick="document.getElementById('registrarLocal').submit()">guardar</button>
    </div>
    </div>
        
    
@endsection

