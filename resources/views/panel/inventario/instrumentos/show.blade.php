@extends('adminlte::page')

@section('title', 'Detalle Instrumento')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle Instrumnento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Información del Instrumento" theme="lightblue" theme-mode="outline" collapsible>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="instrument_name">Nombre del instrumento</label>
                            <input type="text" id="instrument_name" class="form-control" value="{{ $instrument->instrument_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="instrument_desc">Descripción</label>
                            <input type="text" id="instrument_desc" class="form-control" value="{{ $instrument->instrument_desc }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="instrument_size">Tamaño</label>
                            <input type="text" id="instrument_size" class="form-control" value="{{ $instrument->instrument_size }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="instrument_serial_code">Código de serial</label>
                            <input type="text" id="instrument_serial_code" class="form-control" value="{{ $instrument->instrument_serial_code }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="departament_fke">Departamento</label>
                            <input type="text" id="departament_fke" class="form-control" value="{{ $instrument->departaments->departament_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state_fke">Condición</label>
                            <input type="text" id="state_fke" class="form-control" value="{{ $instrument->conditions->condition_name }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="padding-top: 10px;">
                    <a href="{{ route('inventario.instrumentos.lista') }}" class="btn btn-primary">Volver a la lista de instrumentos</a>
                </div>
            </x-adminlte-card>
        </div>
    </div>
@stop

