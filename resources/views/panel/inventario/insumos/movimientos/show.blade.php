@extends('adminlte::page')

@section('title', 'Detalle Movimiento')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle Movimiento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Información del Movimiento" theme="lightblue" theme-mode="outline" collapsible>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="movement_types_fke">Tipo de Movimeinto</label>
                            <input type="text" id="movement_types_fke" class="form-control" value="{{ $movement->movement_types->movement_type_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="movement_desc">Descripción</label>
                            <input type="text" id="movement_desc" class="form-control" value="{{ $movement->movement_desc }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supply_fke">Estado</label>
                            <input type="text" id="supply_fke" class="form-control" value="{{ $movement->supplies->supply_name }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="movement_stock">Cantidad/Stock</label>
                            <input type="text" id="movement_stock" class="form-control" value="{{ $movement->movement_stock }}" readonly>
                        </div>
                    </div>

                </div>
                <div class="text-center" style="padding-top: 10px;">
                    <a href="{{ route('inventario.movimientos.lista') }}" class="btn btn-primary">Volver a la lista de insumos</a>
                </div>
            </x-adminlte-card>
        </div>
    </div>
@stop
