@extends('layouts.error')
@section('content')
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h2>¡Oops! ¡Muchas solicitudes!</h2>
                <h1><span>4</span><span>2</span><span>9</span></h1>
            </div>
            <h3>Hiciste demasiadas solicitudes a la página, intenta de nuevo más tarde.</h3>
            <div class="text-center">
            <a href="{{ route('home') }}"><button class="btn btn-primary">Volver a inicio</button></a>
            </div>
        </div>
    </div>
@endsection
