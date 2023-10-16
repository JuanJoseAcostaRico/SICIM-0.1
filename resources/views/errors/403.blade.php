@extends('layouts.error')
@section('content')
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h2>¡Oops! No puedes acceder a la página</h2>
                <h1><span>4</span><span>0</span><span>3</span></h1>
            </div>
            <h3>No tienes permisos suficientes para acceder a la página</h3>
            <div class="text-center">
            <a href="{{ route('home') }}"><button class="btn btn-primary">Volver a inicio</button></a>
            </div>
        </div>
    </div>
@endsection
