@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <h1>Reportes Instrumentos</h1>
@stop

@section('content')

    <div class="col-12">

        @can('panel.reportes.buttons')
            <x-adminlte-card title="Reportes de instrumentos" theme="primary" icon="fas fa-stethoscope" collapsible>
                <div class="col-md-12">
                    <div class="box-body ml-4 mr-4">
                        <div>
                            <h3 class="text-center">Reporte de instrumentos general:</h3>
                            <p align="justify" class="mt-3">Haga clic en el botón "Generar Reporte", para crear un reporte
                                general de todos los instrumentos existentes dentro del sistema SICIM, y exportarlos a su
                                ordenador a través de un documento de Excel.</p>
                            <div class="text-center">
                                <a href="{{ route('reportes.instrumentos') }}" class="btn btn-primary mt-1">Generar Reporte</a>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h3 class="text-center">Reporte de instrumentos por rango de fechas:</h3>

                            <p align="justify" class="mt-3">Seleccione aquí el rango de fechas (Fecha de inicio y fin)
                                disponibles para asignar a su reporte personalizado de instrumentos y haga clic en el botón
                                "Generar Reporte por rango de fechas", para crear un reporte y exportarlos a su ordenador a
                                través de un documento de Excel.</p>

                            <form action="{{ route('reportes.instrumentosporfechas') }}" method="get">
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
                        <hr>
                        <div>
                            <h3 class="text-center">Reporte de instrumentos por nombre:</h3>
                            <p align="justify" class="mt-3">Es un reporte creado con la finalidad de llevar un registro en Excel de todas las ocurrencias que pertenezcan a un instrumento determinado.
                                Una vez ingresado el instrumento, al presionar en el botón de "Generar Reporte por nombre" se descargará un archivo de excel con la información solicitada.</p>

                            <form action="{{ route('reportes.instrumentospornombre') }}" method="get">
                                @csrf
                                <div class="row text-center mt-3">
                                    <div class="col-md-12">
                                        <label for="instrument_name">Nombre del instrumento</label>
                                        <input type="text" id="instrument_name" name="instrument_name" class="form-control">
                                        @error('instrument_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <button type="submit" class="btn btn-primary mt-3">Generar Reporte por nombre</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div>
                            <h3 class="text-center">Reporte de instrumentos por departamento:</h3>
                            <p align="justify" class="mt-3">Es un reporte creado con la finalidad de llevar un registro en Excel de los instrumentos que hay en un departamento en específico.
                                Una vez seleccionado el departamento, al presionar en el botón de "Generar Reporte de instrumentos por departamento" se descargará un archivo de excel con la información solicitada.</p>
                            <div class="text-center">
                                <form action="{{ route('reportes.instrumentospordepartamento') }}" method="get">
                                    @csrf
                                        <div class="form-group">
                                            <label for="selected_department">Seleccionar departamento</label>
                                            <select id="selected_department" name="selected_department" class="form-control" required>
                                                <option value="">Seleccionar Departamento</option>
                                                @foreach ($departaments as $departament)
                                                    <option value="{{ $departament->id }}">{{ $departament->departament_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <div class="col-md-12 mt-1">
                                        <button type="submit" class="btn btn-primary mt-3">Generar Reporte de instrumentos por departamento</button>
                                    </div>
                                </form>
                            </div>
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
