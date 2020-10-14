@extends('layouts.plantilla')

@section('titulo')
    Buscar
@endsection

@section('links')
    <link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}"></link>
    <link rel="stylesheet" href="{{asset('css/floating-wpp.min.css')}}">
    
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
<div class="modal" tabindex="-1" id="mostrarProducto">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4 m-2">
                <img src="" id="imagenProducto">
            </div>
            <div class="col-4 m-4">
                <h2 id="nombreProducto"></h2> <hr>
                <h5><strong>Descripcion del producto:</strong></h5>
                <p id="descripcion"></p>
                <h6><strong>Etiquetas del producto:</strong></h6>
                <div id="etiquetasP"></div>
                <br>
                <div>
                    <h5><strong>Informacion del vendedor:</strong></h5>
                    <h6>Nombre: </h6> <p id="nombreVendedor"></p>
                    <h6>Whatsapp:</h6> <p id="whatsappVendedor"></p><div id="WAButton"></div> 
                </div>
                <a href="" id="irLocal"><i class="fas fa-share"></i>ir al local</a>
            </div>

        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

<!----------------------------------->
    @if(count($productos) == 0)

        <h4 style="font-size: 80px; text-align: center; margin-top: 22vh; margin-bottom: 23vh;">No se encontraron productos con esta etiqueta</h4>
    @else
        <div style="display:-webkit-box ; overflow-x: scroll;">
            @foreach($productos as $producto)
            
            <div class="card" style="width: 25rem; min-height: 80vh !important;">
            <img src="{{ 'productosImg/'.$producto->product_image}}" class="card-img-top" alt="...">
           
            <div class="card-body">
                <h5 class="card-title">{{$producto->product_name}}</h5>
                <p class="card-text">{{$producto->product_description}}</p>
                <strong>Etiquetas:</strong>
                    @foreach($producto->tags as $tag)
                        <label class="label label-info"><i class="fas fa-tag"></i>{{ $tag->name}}</label>
                    @endforeach
                <a onclick="mostrarProducto({{$producto}});" class="btn btn-primary">Ver producto</a>
            </div>
        </div>
        
        @endforeach
    @endif
@endsection

@section('scripts')
<script src="{{asset('js/floating-wpp.min.js')}}"></script>
    <script>
        function mostrarProducto(producto){
            console.log(producto);
            $('#mostrarProducto').modal('show');
            $("#titulo").html(producto.product_name);
            $("#nombreProducto").html(producto.product_name);
            $("#descripcion").html(producto.product_description);
            $("#imagenProducto").attr("src", 'productosImg/'+producto.product_image+'');
            $("#etiquetasP").empty();
            producto.tags.forEach(element => {
                $("#etiquetasP").append('<label class="label label-info"><i class="fas fa-tag"></i>'+element.name+'</label>');
            });
            $.get("infoLocal/"+producto.id_local, function(data, status){
                $("#nombreVendedor").html(data[0].name);
                $("#whatsappVendedor").html(data[0].whatsapp);
                $('#WAButton').empty();
                $('#WAButton').floatingWhatsApp({
                    phone: "'"+data[0].whatsapp+"'", //WhatsApp Business phone number
                    headerTitle: 'Escribeme en mi whatsapp!', //Popup Title
                    popupMessage: 'hola, en que puedo ayudarte?', //Popup Message
                    showPopup: true, //Enables popup display
                    buttonImage: '<img src="img/iconfinder_whatsapp_386747.png" />', //Button Image
                    //headerColor: 'crimson', //Custom header color
                    //backgroundColor: 'crimson', //Custom background button color
                    position: "right" //Position: left | right

                });
            });

            $('#irLocal').attr("href","local/"+producto.id_local);
           
            //$("#w3s").attr("href", "https://www.w3schools.com/jquery/");
        }
    </script>
@endsection