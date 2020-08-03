@extends('layouts.plantilla')
@section('titulo')
    inicio
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

 
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 55vw;margin-left: 22.5vw;margin-top: 2.7vh;margin-bottom: 3vh;">
     
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      </ol>

      <div class="carousel-inner">

        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('img/carnes.jpg')}}" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="" style="font-size: 80px;color: white;">Carnes</a>
           
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/frutas.jpg')}}" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="" style="font-size: 80px;color: white;">Frutas</a>
           
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/pescado.jpg')}}" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="" style="font-size: 80px;color: white;">Pescado</a>
           
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/Granos.jpeg')}}" alt="Fourth slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="" style="font-size: 80px;color: white;">Granos</a>
           
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/verduras.jpg')}}" alt="Fifth slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="" style="font-size: 80px;color: white;">Verduras</a>
           
          </div>
        </div>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
@endsection

@section('scripts')
<script>
  
</script>
@endsection