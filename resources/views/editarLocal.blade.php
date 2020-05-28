@extends('layouts.plantilla')



@section('contenido')
<div class="row justify-content-md-center">
    <div id="modulo" class="col-6">
            <Fotos-component></Fotos-component> 
            <form action="crearEditarLocal" method="POST">
            <div class="form-row">
            	<div class="form-group col-4">
                	<label for="nombreLocal">Nombre de su local:</label>
                	<input type="text" name="nombreLocal" id="nombreLocal" class="form-control">
	            </div>
	            <div class="form-group col-4">
	                <label>Direccion:</label>
	                <input type="text" class="form-control">
	            </div>
            </div>
            <div class="form-row">
            	<div class="form-group col-4">
	                <label>Telefono</label>
	                <input type="text" class="form-control"></input>
	            </div>
	            <div class="form-group col-4">
	                <label>Whatsapp</label>
	                <input type="text" class="form-control">
	            </div>
            </div>
            <div class="form-group col-4">
                <label>Otros datos</label>
                <textarea class="form-control">
                    
                </textarea>
            </div>
            <div class="form-group"></div>
        </form>
    </div>
    </div>
        
    
@endsection

