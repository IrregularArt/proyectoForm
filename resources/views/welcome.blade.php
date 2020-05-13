@extends('layouts.plantilla')
@section('titulo')
    inicio
@endsection
@section('nav')

<ul class="brand-logo center">
    <div class="input-field">
        <i class="material-icons prefix">search</i>
        <input id="icon_prefix" type="text" class="active">
        <label for="icon_prefix" class="blue-text">¿Que deseas buscar?</label>
      </div>
    </ul>
@endsection
@section('contenido')
    <div class="carousel">
        
        
            
              <div class="card carousel-item">
                <div class="card-image">
                    <img src="{{asset('img/2872988.jpg')}}">
                </div>
                <div class="card-content">
                  <a href="">verduras</a>
                </div>
                
              </div>
            
              <div class="card carousel-item">
                <div class="card-image">
                    <img src="{{asset('img/2872988.jpg')}}">
                </div>
                <div class="card-content">
                  <a href="">verduras</a>
                </div>
                
              </div>
              <div class="card carousel-item">
                <div class="card-image">
                    <img src="{{asset('img/2872988.jpg')}}">
                </div>
                <div class="card-content">
                  <a href="">verduras</a>
                </div>
                
              </div>
              <div class="card carousel-item">
                <div class="card-image">
                    <img src="{{asset('img/2872988.jpg')}}">
                </div>
                <div class="card-content">
                  <a href="">verduras</a>
                </div>
                
              </div>    
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems);
  });
</script>
@endsection