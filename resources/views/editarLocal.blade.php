@extends('layouts.plantilla')

@section('links')
   
@endsection

@section('contenido')
    <div id='app'>
        <Fotos-component></Fotos-component>
    </div>
        
    
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js')}}"
@endsection