@extends('adminlte::page')

@section('title', 'Registro Departamento')

@section('content_header')
    <h1 class="m-0 text-dark">Registro Departamento</h1>
@stop

@section('content')

    <div class="row">
    <div class="col-12">
        <x-adminlte-card title="Registro" theme="lightblue" theme-mode="outline" collapsible>
            <form action="{{ route('departamento.store') }}" method="POST">
                @csrf
                <div class="row">
                    <x-adminlte-input name="departament_name" label="Nombre de departamento" placeholder="Nombre del departamento"
                                      fgroup-class="col-md-12" :input-class="'required'"/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user_id">Jefe de departamento</label>
                            <select id="user_id" name="user_id" class="form-control" required>
                                <option value="">Seleccionar Jefe de departamento</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="state_fke">Estado</label>
                            <select id="state_fke" name="state_fke" class="form-control" required>
                                <option value="">Seleccionar Estado</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <x-adminlte-button label="Registrar" theme="primary" icon="fas fa-save" type="submit"/>
                    </div>
                </div>
            </form>
        </x-adminlte-card>
    </div>
</div>

@stop
