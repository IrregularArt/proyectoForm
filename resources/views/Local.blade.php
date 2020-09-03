@extends('layouts.plantilla')

@section('titulo')

    {{$local[0]->local_name}}

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
                
                
            </div>

        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--------------------------------------------------------------------------->



<div class="col-10 offset-1" style="background-color:#c1eac1;border-radius: 10px;">

    <div style="display: flex; margin-top: 2vh;">  <!-- Parte de arriba -->

        <div class="col-5">
            <img src="{{ asset('localesImg/'.$local[0]->local_img)}}" style="max-width: 24vw;margin-left: 2vw;margin-top: 1vh;">
        </div>

        <div class="col-7" style="text-align: center; margin-top: 1vh;">

            <h1>{{ $local[0]->local_name }}</h1>

                <div style="display: flex;"> 
                    <div class="col-4"> <h2><a style="color: green;font-weight: bold;">Telefono</a> <br>{{ $local[0]->phone }}</h2> </div>
                    <div class="col-8"> <h2><a style="color: green;font-weight: bold;">Direccion</a> <br> {{ $local[0]->address}}</h2> </div>
                </div>
    <input type="hidden" id="numero" value="{{ $local[0]->whatsapp}}">
                <div style="display: flex;">
                    <div class="col-4"> <h2><a style="color: green;font-weight: bold;">Whatsapp</a> <br>{{$local[0]->whatsapp}} </h2> </div> <div id="WAButton"></div> 
                    <div class="col-8"> <h2><a style="color: green;font-weight: bold;">Persona encargada</a> <br> {{ $datos[0]->name }} </h2> </div>
                </div>

                <div style="display: flex;text-align: center;">
                     <div class="col-12"><h2><a style="color: green;font-weight: bold;">Otros:</a>{{$local[0]->other}} </h2></div>
                </div>

        </div>

    </div> 
        
    <div class="col-10 offset-1" style="background-color: #94c394;border-radius: 10px; margin-top: 5vh; margin-bottom: 5vh; border-radius: 10px;"> <!-- Parte de abajo -->
        
        <div style="overflow-y: scroll; height: 60vh;">
        @foreach($productos as $producto)
            <div class="card" style="width: 18rem;">
            <img src="{{ asset('productosImg/'.$producto->product_image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$producto->product_name}}</h5>
                <p class="card-text">{{$producto->product_description}}</p>
                <strong>Etiquetas:</strong>
                    @foreach($producto->tags as $tag)
                        <label class="label label-info">{{ $tag->name}}</label>
                    @endforeach
                <a onclick="mostrarProducto({{$producto}});" class="btn btn-primary">Ver producto</a>
            </div>
            </div>
        @endforeach
        </div>
    </div>

</div>
    
@endsection


@section('scripts')
<script src="{{asset('js/floating-wpp.min.js')}}"></script>
    <script>
    $('#WAButton').empty();
                $('#WAButton').floatingWhatsApp({
                    phone: "'"+$("#numero").val()+"'", //WhatsApp Business phone number
                    headerTitle: 'Escribeme en mi whatsapp!', //Popup Title
                    popupMessage: 'hola, en que puedo ayudarte?', //Popup Message
                    showPopup: true, //Enables popup display
                    buttonImage: '<img src="../img/iconfinder_whatsapp_386747.png" />', //Button Image
                    //headerColor: 'crimson', //Custom header color
                    //backgroundColor: 'crimson', //Custom background button color
                    position: "left", //Position: left | right
                    zIndex: 8

    });
        function mostrarProducto(producto){
            console.log(producto);
            $('#mostrarProducto').modal('show');
            $("#titulo").html(producto.product_name);
            $("#nombreProducto").html(producto.product_name);
            $("#descripcion").html(producto.product_description);
            $("#imagenProducto").attr("src", '../productosImg/'+producto.product_image+'');
            $("#etiquetasP").empty();
            producto.tags.forEach(element => {
                $("#etiquetasP").append('<label class="label p-1 m-1 label-info">'+element.name+'</label>');
            });
           
            //$("#w3s").attr("href", "https://www.w3schools.com/jquery/");
        }
    </script>
@endsection