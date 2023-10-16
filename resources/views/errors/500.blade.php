@extends('layouts.error')
@section('content')
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h2>¡Oops! Error en el servidor!</h2>
                <h1><span>5</span><span>0</span><span>0</span></h1>
            </div>
            <h3>Error Interno del Servidor.</h3>
            <div class="text-center">
            <a href="{{ route('home') }}"><button class="btn btn-primary">Volver a inicio</button></a>
            </div>
        </div>
    </div>
@endsection
