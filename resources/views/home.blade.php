@extends('adminlte::page')

@section('title', 'Home | SICIM')

@section('content_header')
    <h1 class="m-0 text-dark">Inicio</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Estás logeado en SICIM! ahora disfruta de la experiencia, usuario: {{ auth()->user()->user_name }}</p>
                    <br>
                    @role('admin')
                    <p>Sólo lo va a ver el rol {{ $role }}</p>
                    @endrole
                    @role('usuario')
                    <p>Solo lo va a ver el rol {{ $role }}</p>
                    @endrole
                </div>
            </div>
            <x-adminlte-card title="Bienvenido a SICIM" theme="info" icon="fas fa-lg fa-bell" collapsible>
                    En SICIM podras gestionar tareas administrativas del CDI de Coloncito
            </x-adminlte-card>
        </div>


        {{-- INICIO AREA DE ALERTS DE EJEMPLO

         <div class="col-12">
            <h5>Alerts</h5>
            <x-adminlte-alert theme="light" title="Tip">
                Light theme alert!
            </x-adminlte-alert>
            <x-adminlte-alert theme="dark" title="Important">
                Dark theme alert!
            </x-adminlte-alert>
            <x-adminlte-alert theme="primary" title="Primary Notification">
                Primary theme alert!
            </x-adminlte-alert>
            <x-adminlte-alert theme="secondary" icon="" title="Secondary Notification">
                Secondary theme alert!
            </x-adminlte-alert>
            <x-adminlte-alert theme="danger" title="Danger">
                Danger theme alert!
            </x-adminlte-alert>
        </div>

           FIN DE AREA DE ALERTS --}}


    {{-- INICIO AREA DE CARDS DE EJEMPLOS
    <div class="col-12">
        <h5>Cards</h5>
        <x-adminlte-card title="Dark Card" theme="dark" icon="fas fa-lg fa-moon">
            A dark theme card...
        </x-adminlte-card>
        <x-adminlte-card title="Lightblue Card" theme="lightblue" theme-mode="outline"
                        icon="fas fa-lg fa-envelope" header-class="text-uppercase rounded-bottom border-info"
                        removable>
            A removable card with outline lightblue theme...
        </x-adminlte-card>
        <x-adminlte-card title="Purple Card" theme="purple" icon="fas fa-lg fa-fan" removable collapsible>
            A removable and collapsible card with purple theme...
        </x-adminlte-card>
        <x-adminlte-card title="Success Card" theme="success" theme-mode="full" icon="fas fa-lg fa-thumbs-up"
                        collapsible="collapsed">
            A collapsible card with full success theme and collapsed...
        </x-adminlte-card>
        <x-adminlte-card title="Info Card" theme="info" icon="fas fa-lg fa-bell" collapsible removable maximizable>
            An info theme card with all the tool buttons...
        </x-adminlte-card>
    </div>

        FIN AREA DE CARDS DE EJEMPLO        --}}

    </div>
@stop

{{-- AREA SCRIPT ALERTA DE EJEMPLO HECHO CON SWEETALERT2
@section('js')
    <script>
        Swal.fire(
            'Buen Trabajo, todo funciona bien!',
            'Presiona el botón!',
            'success'
            )
    </script>
@stop

--}}
