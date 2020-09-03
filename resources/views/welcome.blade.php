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

 
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('img/2872988.jpg')}}" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="buscar?query=verduras">verduras</a>
           
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/2872988.jpg')}}" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="buscar?query=carnes">carnes</a>
           
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/5901.jpg')}}" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <a href="buscar?query=granos">granos</a>
           
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