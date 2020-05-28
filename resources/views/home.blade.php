@extends('layouts.plantilla')

@section('titulo')
    Registrar local
@endsection
@section('links')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link href="https://unpkg.com/vue-croppa/dist/vue-croppa.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vue-croppa/dist/vue-croppa.min.js"></script>

@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/app.js')}}"></script>
@endsection