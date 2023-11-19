@extends('adminlte::page')

@section('title', 'Respaldo')

@section('content_header')
    <h1 class="m-0 text-dark">Respaldo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Crear respaldo" theme="primary" icon="fas fa-upload" collapsible>
                <form method="POST" action="{{ route('respaldo.crearRespaldo') }}" class="form-backup">
                    @csrf
                    <div class="ml-5 mr-5">
                        <h4 class="text-center">Generar respaldo de SICIM</h4>
                        <p align="justify" class="mt-3">Para generar un respaldo en SICIM y mantener tus datos seguros,
                            simplemente presiona el botón "Crear respaldo". Esta acción te permitirá guardar una copia de
                            seguridad de tu sistema, asegurando la protección de tus valiosos datos y facilitando su
                            recuperación en caso de ser necesario. Es un proceso rápido y sencillo que garantiza la
                            continuidad y la seguridad de tu información en SICIM.</p>
                        @can('panel.respaldo.buttons')
                        <div class="text-center">
                            <button type="submit" class="btn btn-info mt-3">Crear respaldo</button>
                        </div>
                        @endcan
                    </div>
                </form>
            </x-adminlte-card>

            <x-adminlte-card title="Restauración de respaldo" theme="primary" icon="fas fa-download" collapsible>
                <form method="POST" action="{{ route('respaldo.restaurarRespaldo') }}" class="form-restore"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="ml-5 mr-5">
                        <h4 class="text-center">Restauración de SICIM</h4>
                        <p align="justify" class="mt-3">Para restaurar datos en SICIM y recuperar información previamente
                            respaldada, simplemente presiona el botón "Buscar", selecciona el archivo .zip y presiona el
                            botón "Restaurar". Al hacerlo, podrás acceder a tus datos previos y restaurar tu sistema a un
                            estado anterior, en caso de ser necesario. Este proceso es fácil y rápido, permitiéndote
                            recuperar datos de manera eficiente y mantener la continuidad de tu trabajo en SICIM.</p>

                        @can('panel.respaldo.buttons')
                        <div class="text-center mb-3 ml-5 mr-5">
                            <div class="justify-content-center">
                                <x-adminlte-input-file name="backup" placeholder="Seleccionar archivo .zip" id="fileInput"
                                    igroup-size="xl" accept=".zip" max="100MB">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-file-archive"></i>
                                        </div>
                                    </x-slot>
                                    <x-slot name="appendSlot">
                                        <button class="btn btn-info" type="submit">Restaurar</button>
                                    </x-slot>
                                </x-adminlte-input-file>
                            </div>
                        </div>
                        @endcan
                    </div>
                </form>
            </x-adminlte-card>
        </div>
    </div>
@stop


@push('js')
    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'Ningún archivo seleccionado';
            this.parentElement.querySelector('.custom-file-label').textContent = fileName;
        });
    </script>
@endpush




@section('js')

    @if (session('creadorespaldo') == 'ok')
        <script>
            Swal.fire(
                'Creación exitosa!',
                'El respaldo de la base de datos fue creado exitosamente',
                "success"
            )
        </script>
    @endif

    @if (session('creadorespaldo') == 'error')
        <script>
            Swal.fire(
                'Error al crear respaldo',
                'Hubo un problema al crear el respaldo de la base de datos',
                "error"
            )
        </script>
    @endif

    @if (session('restaurado') == 'ok')
        <script>
            Swal.fire(
                'Restauración exitosa!',
                'Los datos de la base de datos se restauraron exitosamente',
                "success"
            )
        </script>
    @endif

    @if (session('restaurado') == 'error')
        <script>
            Swal.fire(
                'Error al restaurar respaldo',
                'Hubo un problema al restaurar el respaldo de la base de datos',
                "error"
            )
        </script>
    @endif



    <script>
        $('.form-backup').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estás seguro de realizar el respaldo de la base de datos?',
                text: "No puedes revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, crear respaldo',
                cancelButtonText: 'No, cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

    <script>
        $('.form-restore').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estás seguro de realizar la restauración de la base de datos?',
                text: "No puedes revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, restaurar',
                cancelButtonText: 'No, cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

     @if (session('creadorespaldo') == 'Demasiados intentos. Intente nuevamente más tarde')
        <script>
            Swal.fire(
                    'Demasiados intentos',
                    'Intente nuevamente más tarde',
                    "error"
                )
        </script>
    @endif

@endsection
