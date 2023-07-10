@extends('adminlte::page')

@section('title', 'Detalle Departamento')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle Departamento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Información del Departamento" theme="lightblue" theme-mode="outline" collapsible>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="departament_name">Nombre de Departamento</label>
                            <input type="text" id="departament_name" class="form-control" value="{{ $departament->departament_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user_id">Jefe de departamento</label>
                            <input type="text" id="user_id" class="form-control" value="{{ $departament->user->user_name}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="state_fke">Estado</label>
                            <input type="text" id="state_fke" class="form-control" value="{{ $departament->states->state_name }}" readonly>
                        </div>
                    </div>

                        <div class="text-center" style="padding-top: 10px;">
                            <a href="{{ route('departamento.lista') }}" class="btn btn-primary">Volver a la lista de usuarios</a>
                        </div>
                </div>
            </x-adminlte-card>
        </div>
    </div>
@stop
