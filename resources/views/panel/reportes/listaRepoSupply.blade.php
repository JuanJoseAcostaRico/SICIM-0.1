@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <h1 class="m-0 text-dark">Reportes Insumos</h1>
@stop

@section('content')

    <div class="col-12">

        @can('panel.reportes.buttons')
            <x-adminlte-card title="Reportes de insumos" theme="primary" icon="fas fa-medkit" collapsible>
                <div class="col-md-12">
                    <div class="box-body ml-4 mr-4">
                        <div>
                            <h3 class="text-center">Reporte de insumos general:</h3>
                            <p align="justify" class="mt-3">Haga clic en el botón "Generar Reporte", para crear un reporte
                                general de todos los insumos existentes dentro del sistema SICIM, y exportarlos a su ordenador a
                                través de un documento de Excel.</p>
                            <div class="text-center">
                                <a href="{{ route('reportes.insumos') }}" class="btn btn-primary mt-1">Generar Reporte</a>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h3 class="text-center">Reporte de insumos por rango de fechas:</h3>
                            <p align="justify" class="mt-3">Seleccione aquí el rango de fechas (Fecha de inicio y fin)
                                disponibles para asignar a su reporte personalizado de insumos y haga clic en el botón "Generar
                                Reporte por rango de fechas", para crear un reporte y exportarlos a su ordenador a través de un
                                documento de Excel.</p>
                            <form action="{{ route('reportes.insumosporfechas') }}" method="get">
                                @csrf
                                <div class="row text-center mt-3">
                                    <div class="col-md-6">
                                        <label for="start_date">Fecha de inicio</label>
                                        <input type="date" name="start_date" class="form-control" min="2023-01-02"
                                            max="<?= date('Y-m-d') ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_date">Fecha de fin</label>
                                        <input type="date" name="end_date" class="form-control" min="2023-01-02"
                                            max="<?= date('Y-m-d') ?>" required>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <button type="submit" class="btn btn-primary mt-3">Generar Reporte por rango de
                                            fechas</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </x-adminlte-card>

            <x-adminlte-card title="Reportes de movimientos de insumos" theme="primary" icon="fas fa-sitemap" collapsible>
                <div class="col-md-12">
                    <div class="box-body ml-4 mr-4">
                        <div>
                            <h3 class="text-center">Reporte de movimientos de insumos general:</h3>
                            <p align="justify" class="mt-3">Haga clic en el botón "Generar Reporte", para crear un reporte
                                general de todos los movimientos existentes de insumos dentro del sistema SICIM, y exportarlos a
                                su ordenador a través de un documento de Excel.</p>
                            <div class="text-center">
                                <a href="{{ route('reportes.movimientos') }}" class="btn btn-primary mt-1">Generar Reporte</a>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h3 class="text-center">Reporte de Movimientos por lote:</h3>
                            <p align="justify" class="mt-3">Es un reporte creado con la finalidad de llevar un registro en Excel de los movimientos que pertenecen a un lote determinado
                                Una vez ingresado el número de lote, al presionar en el botón de "Generar Reporte por lote se descargará un archivo de excel con la información solicitada.</p>

                            <form action="{{ route('reportes.movimientosporlote') }}" method="get">
                                @csrf
                                <div class="row text-center mt-3">
                                    <div class="col-md-12">
                                        <label for="movement_batch">Código del lote</label>
                                        <input type="text" id="movement_batch" name="movement_batch" class="form-control">
                                        @error('movement_batch')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <button type="submit" class="btn btn-primary mt-3">Generar Reporte por lote</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div>
                            <h3 class="text-center">Reporte de movimientos de insumos por fecha de caducidad:</h3>
                            <p align="justify" class="mt-3">Es un reporte creado con la finalidad de llevar un registro en Excel de los movimientos que pertenecen a una fecha de caducidad determinada. Seleccione aquí la fecha de caducidad
                                disponibles para asignar a su reporte personalizado de movimientos de insumos
                                Una vez ingresada la fecha de caducidad al presionar en el botón de "Generar Reporte por lote se descargará un archivo de excel con la información solicitada.</p>
                            <form action="{{ route('reportes.movimientosporcaducidad') }}" method="get">
                                @csrf
                                <div class="row text-center mt-3">
                                    <div class="col-md-12">
                                        <label for="expiration_date">Fecha de caducidad</label>
                                        <input type="date" name="expiration_date" class="form-control" min="2023-01-02"
                                            max="2050-01-02" required>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <button type="submit" class="btn btn-primary mt-3">Generar Reporte por rango de
                                            fechas</button>
                                    </div>
                                </div>
                            </form>
                        <hr>
                        <div>
                            <h3 class="text-center">Reporte de movimientos de insumos por rango de fechas:</h3>
                            <p align="justify" class="mt-3">Seleccione aquí el rango de fechas (Fecha de inicio y fin)
                                disponibles para asignar a su reporte personalizado de movimientos de insumos y haga clic en el
                                botón "Generar Reporte por rango de fechas", para crear un reporte y exportarlos a su ordenador
                                a través de un documento de Excel.</p>
                            <form action="{{ route('reportes.movimientosporfechas') }}" method="get">
                                @csrf
                                <div class="row text-center mt-3">
                                    <div class="col-md-6">
                                        <label for="start_date">Fecha de inicio</label>
                                        <input type="date" name="start_date" class="form-control" min="2023-01-02"
                                            max="<?= date('Y-m-d') ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_date">Fecha de fin</label>
                                        <input type="date" name="end_date" class="form-control" min="2023-01-02"
                                            max="<?= date('Y-m-d') ?>" required>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <button type="submit" class="btn btn-primary mt-3">Generar Reporte por rango de
                                            fechas</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </x-adminlte-card>
        @endcan

    @stop

    @section('js')

        {{-- @if (session('insumos_general') == 'ok')
        <script>
            Swal.fire(
                'Reporte generado con éxito!',
                'El reporte general de los insumos se generó exitosamente',
                "success"
            )
        </script>
    @endif

    @if (session('insumos_por_fecha') == 'ok')
        <script>
            Swal.fire(
                'Reporte generado con éxito!',
                'El reporte por fechas de los insumos se generó exitosamente',
                "success"
            )
        </script>

    @endif --}}



    @endsection
