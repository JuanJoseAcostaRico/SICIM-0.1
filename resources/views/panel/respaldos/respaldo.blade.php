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
                    <h3 class="text-center">Generar respaldo de SICIM</h3>
                    <p align="justify" class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore enim
                        dolore veritatis
                        sint maxime? Beatae nam, tenetur maiores repellat minima aut voluptatibus? Corrupti
                        sed tempore porro neque fugiat nesciunt sint?</p>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger mt-3">Crear respaldo</button>
                    </div>
                </form>
            </x-adminlte-card>

            <x-adminlte-card title="Restauración de respaldo" theme="primary" icon="fas fa-download" collapsible>
                <form method="POST" action="{{ route('respaldo.restaurarRespaldo') }}" class="form-restore" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-center">Restauración de SICIM</h3>
                    <p align="justify" class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt
                        tempore
                        ipsa corporis tenetur repellat itaque fugiat error quod odit voluptatibus distinctio quae, eius,
                        aliquam quasi! Nihil unde libero rerum cum.</p>


                    <div class="text-center mb-3 ml-5 mr-5">
                        <div class="justify-content-center">
                            <x-adminlte-input-file name="backup" placeholder="Seleccionar archivo .zip" id="fileInput" igroup-size="xl">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-archive"></i>
                                    </div>
                                </x-slot>
                                <x-slot name="appendSlot">
                                    <button class="btn btn-primary" type="submit">Restaurar</button>
                                </x-slot>
                            </x-adminlte-input-file>
                        </div>
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

    @if (session('creado') == 'ok')
        <script>
            Swal.fire(
                'Acción realizada exitosamente!',
                'El respaldo se creo correctamente',
                "success"
            )
        </script>
    @endif

    @if (session('restaurado') == 'ok')
        <script>
            Swal.fire(
                'Acción realizada exitosamente!',
                'La restauración se realizó correctamente',
                "success"
            )
        </script>
    @endif

    {{--     @if (session('creado') == 'Oops...')
        <script>
            Swal.fire(
                '¡Algo salió mal!',
                'El respaldo se no creo correctamente',
                "error"
            )
        </script>
    @endif --}}

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

@endsection
