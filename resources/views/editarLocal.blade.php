@extends('layouts.plantilla')

@section('titulo')
    Agregar mi local
@endsection
@section('links')
<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
@endsection

@section('contenido')
<div class="row justify-content-md-center">
    <div id="modulo" class="col-8" style="background-color: yellowgreen;margin-bottom: 1vh;border-radius: 20px;margin-top: 1vh;">
        
        <p style="text-align: center;font-size: 40px;margin-bottom: 0;">Datos de su negocio</p>
        <p style="font-size: 15px;margin-bottom: 0;margin-left: 21px;font-weight: bold;">Escoge la foto para tu negocio</p>

        <div class="form-row" style="display: flex;margin-bottom: 2vh;">
            
            <div class="col-4"><Fotos-component></Fotos-component> </div>

    <div class="col-8">    
        {{ Form::open(array('url' => 'registrarLocal','method' => 'put', 'id' => 'registrarLocal')) }}
       <!-- <form action="crearEditarLocal" url="" method="POST">-->
            {{ Form::hidden('imagenLocal', '',  array('id' => 'imagenLocal')) }}
      
            <div class="form-row ">

            	<div class="form-group col-6" >
                	<label for="nombreLocal" style="margin-left: 4vw;font-size: 20px;">Nombre de su local</label>
                    <input type="text" name="nombreLocal" id="nombreLocal" class="form-control">
                    @error('nombreLocal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
	            <div class="form-group col-6">
	                <label style="margin-left: 7vw;font-size: 20px;">Direccion</label>
                    <input type="text" id="direccion" name="direccion" class="form-control">
                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>

            <div class="form-row">

            	<div class="form-group col-6">
	                <label style="margin-left: 7.5vw;font-size: 20px;">Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"></input>
                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
	            <div class="form-group col-6">
	                <label style="margin-left: 6.5vw;font-size: 20px;">Whatsapp</label>
                    <input type="text" id="whatsapp" name="whatsapp" class="form-control">
                    @error('whatsapp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                
            </div>
            
            <div class="form-row">
                
                <div class="form-group col-12">
                    <label style="margin-left: 16vw;font-size: 20px;">Otros datos</label>
                    <textarea class="form-control" id="otros" name="otros" style="height: 15vh;">
                        
                    </textarea>
                    @error('otros')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
            </div>

        </div>

        {{ Form::close() }}
    </div>
        
        <button class="btn btn-primary" style="margin-left: 38vw;margin-bottom: 3vh;font-size: 20px;background-color: darkgreen;border: none;" onclick="document.getElementById('registrarLocal').submit()">Guardar</button>
    </div>
    </div>
        
    
@endsection

