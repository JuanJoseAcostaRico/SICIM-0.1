@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1 class="m-0 text-dark">Inicio</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Bienvenido a SICIM" theme="primary" icon="fas fa-lg fa-bell" collapsible>
                Estás logeado en SICIM! ahora disfruta de la experiencia, usuario: {{ auth()->user()->user_name }}
                <br>
                @role('Administrador')
                    <p>Este mensaje solo lo va a ver el rol {{ $role }}</p>
                @endrole
                @role('Empleado')
                    <p>Solo lo va a ver el rol {{ $role }}</p>
                @endrole
                En SICIM podras gestionar tareas administrativas del CDI de Coloncito.
            </x-adminlte-card>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Usuarios <br> Totales</span>
                    <span class="info-box-number">8</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fas fa-hospital"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Departamentos <br> Totales</span>
                    <span class="info-box-number">10</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-warning"><i class="fas fa-medkit"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Insumos <br> Registrados</span>
                    <span class="info-box-number">18</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-danger"><i class="fas fa-stethoscope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Intrumentos <br> Registrados</span>
                    <span class="info-box-number">18</span>
                </div>

            </div>

        </div>

    </div>
@stop



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
