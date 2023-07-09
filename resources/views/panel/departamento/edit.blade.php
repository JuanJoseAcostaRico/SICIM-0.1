@extends('adminlte::page')

@section('title', 'Editar Departamento')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Departamento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Editar Departamento" theme="lightblue" theme-mode="outline" collapsible>
                <form id="edit_departament_form" action="{{ route('departamento.update', $departament->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="departament_name">Nombre de departamento</label>
                                <input type="text" id="departament_name" name="departament_name" class="form-control" required pattern="[a-zA-Z ]+" value="{{ $departament->departament_name }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="user_id ">Jefe de departamento</label>
                                <input type="text" id="user_id " name="user_id " class="form-control" required pattern="[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+" value="{{ $departament->user_id }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="state_fke">Estado</label>
                                <input type="text" id="state_fke" name="state_fke" class="form-control" required pattern="[0-9]{7,11}" value="{{ $departament->state_fke }}">
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            <a href="{{ route('departamento.lista') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                </form>
            </x-adminlte-card>
        </div>
    </div>
@stop

