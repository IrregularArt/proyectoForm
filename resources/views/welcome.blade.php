@extends('layouts.plantilla')
@section('titulo')
    inicio
@endsection
@section('nav')

<ul class="brand-logo center">
{{ Form::open(array('url' => 'buscar','method' => 'get', 'class' => 'form-inline')) }}
    <input class="form-control mr-sm-2" type="text" name="query" placeholder="Buscar" autocomplete="off" >
    <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
{{ Form::close() }}
</ul>
@endsection
@section('contenido')

 
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 65vw; margin-left: 17.5vw; ">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('img/verduras.jpg')}}" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="buscar?query=verduras">Verduras</a>
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/carnes.jpg')}}" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="buscar?query=carnes">Carnes</a>           
          </div>
        </div>
      
        
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/pescado.jpg')}}" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="buscar?query=pescado">Pescado</a>
           
        </div>
      </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/frutas.jpg')}}" alt="Fourth slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="buscar?query=frutas">Frutas</a>
           
          </div>
        </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/huevos.jpg')}}" alt="Fifth slide">
            <div class="carousel-caption d-none d-md-block">
              <a href="buscar?query=huevos">Huevos</a>
            
            </div>
          </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/granos.jpeg')}}" alt="sixth slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="buscar?query=granos">Granos</a>
           
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