@extends('adminlte::page')

@section('title', 'Detalle Insumo')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle Insumo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Información del Insumo" theme="lightblue" theme-mode="outline" collapsible>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supply_name">Nombre de insumo</label>
                            <input type="text" id="supply_name" class="form-control" value="{{ $supply->supply_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supply_desc">Descripción</label>
                            <input type="text" id="supply_desc" class="form-control" value="{{ $supply->supply_desc }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supply_weight">Peso</label>
                            <input type="text" id="supply_weight" class="form-control" value="{{ $supply->supply_weight }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supply_posology">Posología</label>
                            <input type="text" id="supply_posology" class="form-control" value="{{ $supply->supply_posology }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supply_stock">Cantidad/Stock</label>
                            <input type="text" id="supply_stock" class="form-control" value="{{ $supply->supply_stock }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state_fke">Estado</label>
                            <input type="text" id="state_fke" class="form-control" value="{{ $supply->states->state_name }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="padding-top: 10px;">
                    <a href="{{ route('inventario.insumos.lista') }}" class="btn btn-primary">Volver a la lista de insumos</a>
                </div>
            </x-adminlte-card>
        </div>
    </div>
@stop

