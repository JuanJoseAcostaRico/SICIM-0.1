@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <h1>Reportes SICIM</h1>
@stop

@section('content')

    <div class="col-12">

        @can('panel.reportes.buttons')
        <x-adminlte-card title="Reportes de insumos" theme="primary" icon="fas fa-medkit" collapsible>
            <div class="col-md-12">
                <div class="box-body ml-4 mr-4">
                    <h3 class="text-center">Reporte de insumos por rango de fechas:</h3>

                    <p align="justify" class="mt-3">Seleccione aquí el rango de fechas (Fecha de inicio y fin) disponibles para asignar a su reporte personalizado de insumos y haga clic en el botón "Generar Reporte por rango de fechas", para crear un reporte y exportarlos a su ordenador a través de un documento de Excel.</p>
                    <form action="{{ route('reportes.insumosporfechas') }}" method="get">
                        @csrf
                        <div class="row text-center mt-3">
                            <div class="col-md-6">
                                <label for="start_date">Fecha de inicio</label>
                                <input type="date" name="start_date" class="form-control" min="2023-01-02" max="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="end_date">Fecha de fin</label>
                                <input type="date" name="end_date" class="form-control" min="2023-01-02" max="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-12 mt-1">
                                <button type="submit" class="btn btn-primary mt-3">Generar Reporte por rango de fechas</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h3 class="text-center">Reporte de insumos general:</h3>
                    <p align="justify" class="mt-3">Haga clic en el botón "Generar Reporte", para crear un reporte general de todos los insumos existentes dentro del sistema SICIM, y exportarlos a su ordenador a través de un documento de Excel.</p>
                    <div class="text-center">
                        <a href="{{ route('reportes.insumos') }}" class="btn btn-primary mt-1">Generar Reporte</a>
                    </div>
                </div>
            </div>
        </x-adminlte-card>

        <x-adminlte-card title="Reportes de movimientos de insumos" theme="primary" icon="fas fa-sitemap" collapsible>
            <div class="col-md-12">
                <div class="box-body ml-4 mr-4">
                    <h3 class="text-center">Reporte de movimientos de insumos por rango de fechas:</h3>

                    <p align="justify" class="mt-3">Seleccione aquí el rango de fechas (Fecha de inicio y fin) disponibles para asignar a su reporte personalizado de movimientos de insumos y haga clic en el botón "Generar Reporte por rango de fechas", para crear un reporte y exportarlos a su ordenador a través de un documento de Excel.</p>

                    <form action="{{ route('reportes.movimientosporfechas') }}" method="get">
                        @csrf
                        <div class="row text-center mt-3">
                            <div class="col-md-6">
                                <label for="start_date">Fecha de inicio</label>
                                <input type="date" name="start_date" class="form-control" min="2023-01-02" max="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="end_date">Fecha de fin</label>
                                <input type="date" name="end_date" class="form-control" min="2023-01-02" max="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-12 mt-1">
                                <button type="submit" class="btn btn-primary mt-3">Generar Reporte por rango de fechas</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h3 class="text-center">Reporte de movimientos de insumos general:</h3>

                    <p align="justify" class="mt-3">Haga clic en el botón "Generar Reporte", para crear un reporte general de todos los movimientos existentes de insumos dentro del sistema SICIM, y exportarlos a su ordenador a través de un documento de Excel.</p>
                    <div class="text-center">
                        <a href="{{ route('reportes.movimientos') }}" class="btn btn-primary mt-1">Generar Reporte</a>
                    </div>
                </div>
            </div>
        </x-adminlte-card>

        <x-adminlte-card title="Reportes de instrumentos" theme="primary" icon="fas fa-stethoscope" collapsible>
            <div class="col-md-12">
                <div class="box-body ml-4 mr-4">
                    <h3 class="text-center">Reporte de instrumentos por rango de fechas:</h3>

                    <p align="justify" class="mt-3">Seleccione aquí el rango de fechas (Fecha de inicio y fin) disponibles para asignar a su reporte personalizado de instrumentos y haga clic en el botón "Generar Reporte por rango de fechas", para crear un reporte y exportarlos a su ordenador a través de un documento de Excel.</p>

                    <form action="{{ route('reportes.instrumentosporfechas') }}" method="get">
                        @csrf
                        <div class="row text-center mt-3">
                            <div class="col-md-6">
                                <label for="start_date">Fecha de inicio</label>
                                <input type="date" name="start_date" class="form-control" min="2023-01-02" max="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="end_date">Fecha de fin</label>
                                <input type="date" name="end_date" class="form-control" min="2023-01-02" max="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-12 mt-1">
                                <button type="submit" class="btn btn-primary mt-3">Generar Reporte por rango de fechas</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h3 class="text-center">Reporte de instrumentos general:</h3>
                    <p align="justify" class="mt-3">Haga clic en el botón "Generar Reporte", para crear un reporte general de todos los instrumentos existentes dentro del sistema SICIM, y exportarlos a su ordenador a través de un documento de Excel.</p>
                    <div class="text-center">
                        <a href="{{ route('reportes.instrumentos') }}" class="btn btn-primary mt-1">Generar Reporte</a>
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
