@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <h1>Reportes SICIM</h1>
@stop

@section('content')

    <div class="col-12">

        <x-adminlte-card title="Reportes de insumos" theme="primary" icon="fas fa-medkit" collapsible>
            <div class="col-md-12">
                <div class="box-body ml-4 mr-4">
                    <h3 class="text-center">Reporte de insumos por rango de fechas:</h3>
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
                    <p align="justify" class="mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit debitis sed porro!
                        Enim adipisci at, dolores tempora, odit repellendus ipsum, placeat et cum quae suscipit itaque!
                        Culpa necessitatibus corporis expedita?</p>
                    <div class="text-center">
                        <a href="{{ route('reportes.insumos') }}" class="btn btn-primary mt-1">Generar Reporte General</a>
                    </div>
                </div>
            </div>
        </x-adminlte-card>

        <x-adminlte-card title="Reportes de movimientos de insumos" theme="primary" icon="fas fa-sitemap" collapsible>
            <div class="col-md-12">
                <div class="box-body ml-4 mr-4">
                    <h3 class="text-center">Reporte de movimientos de insumos por rango de fechas:</h3>
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
                    <p align="justify" class="mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit debitis sed porro!
                        Enim adipisci at, dolores tempora, odit repellendus ipsum, placeat et cum quae suscipit itaque!
                        Culpa necessitatibus corporis expedita?</p>
                    <div class="text-center">
                        <a href="{{ route('reportes.movimientos') }}" class="btn btn-primary mt-1">Generar Reporte General</a>
                    </div>
                </div>
            </div>
        </x-adminlte-card>

        <x-adminlte-card title="Reportes de instrumentos" theme="primary" icon="fas fa-stethoscope" collapsible>
            <div class="col-md-12">
                <div class="box-body ml-4 mr-4">
                    <h3 class="text-center">Reporte de instrumentos por rango de fechas:</h3>
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
                    <p align="justify" class="mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit debitis sed porro!
                        Enim adipisci at, dolores tempora, odit repellendus ipsum, placeat et cum quae suscipit itaque!
                        Culpa necessitatibus corporis expedita?</p>
                    <div class="text-center">
                        <a href="{{ route('reportes.instrumentos') }}" class="btn btn-primary mt-1">Generar Reporte General</a>
                    </div>
                </div>
            </div>
        </x-adminlte-card>

    @stop
