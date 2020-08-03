@extends('layouts.plantilla')

@section('titulo')

    Local Verduras La Alegria

@endsection

@section('nav')

<ul class="brand-logo center">
    <div class="input-field" style="display: flex;">
        <i><img src="{{asset('img/lupa.png')}}" style="width: 50px;"></i>
        <input id="icon_prefix" type="text" class="active form-control" placeholder="¿Que deseas buscar?" style="margin-left: 10px;margin-top: 10px;">
        
      </div>
    </ul>
@endsection


@section('contenido')

<div class="col-10 offset-1" style="background-color:#c1eac1;border-radius: 10px;">

    <div style="display: flex; margin-top: 2vh;">  <!-- Parte de arriba -->

        <div class="col-5">
            <img src="{{ asset('img/local1.jpg')}}" style="width: 27vw;margin-left: 2vw;margin-top: 1vh;">
        </div>

        <div class="col-7" style="text-align: center; margin-top: 1vh;">

            <h1>Local Verduras La Alegria</h1>

                <div style="display: flex;"> 
                    <div class="col-4"> <h2><a style="color: green;font-weight: bold;">Telefono</a> <br> 2654437</h2> </div>
                    <div class="col-8"> <h2><a style="color: green;font-weight: bold;">Correo</a> <br> laalegriaverduras@gmail.com</h2> </div>
                </div>

                <div style="display: flex;">
                    <div class="col-4"> <h2><a style="color: green;font-weight: bold;">Whatsapp</a> <br> 3156783546</h2> </div>
                    <div class="col-8"> <h2><a style="color: green;font-weight: bold;">Persona encargada</a> <br> Jorge Andres Bonilla Diaz</h2> </div>
                </div>

                <div style="display: flex;text-align: center;">
                     <div class="col-12"><h2><a style="color: green;font-weight: bold;">Direccion:</a> Plaza del Jardin Local 102</h2></div>
                </div>

        </div>

    </div> 
        
    <div class="col-10 offset-1" style="background-color: #94c394;border-radius: 10px; margin-top: 5vh; margin-bottom: 5vh; border-radius: 10px;"> <!-- Parte de abajo -->
        
        <div style="overflow-y: scroll; height: 60vh;">
            <div style="display: flex;" >
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw; margin-top: 5vh;">
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw;margin-top: 5vh;">
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw;margin-top: 5vh;">
            </div>

            <div style="display: flex;" >
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw; margin-top: 5vh;">
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw;margin-top: 5vh;">
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw;margin-top: 5vh;">
            </div>

            <div style="display: flex;" >
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw; margin-top: 5vh;">
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw;margin-top: 5vh;">
                <img src="{{ asset('img/verduras.jpg')}}" style="width: 17vw; margin-left: 3vw;margin-top: 5vh;">
            </div>
        </div>
    </div>

</div>
    
@endsection


@section('scripts')
<script>
  
</script>
@endsection