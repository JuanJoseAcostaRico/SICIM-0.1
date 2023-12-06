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
                                <label for="departament_name">Nombre de departamento *</label>
                                <input type="text" id="departament_name" name="departament_name" class="form-control"
                                    required pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+" value="{{ $departament->departament_name }}">
                            </div>
                        </div>

                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="user_id">Jefe de departamento *</label>
                                <select id="user_id" name="user_id" class="form-control" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $departament->user_id ? 'selected' : '' }}>
                                            {{ $user->user_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}


                        <div class="col-md-12">
                            <div class="form-group">
                                <x-adminlte-select2 name="user_id" id="user_id" label="Jefe de Departamento *" required
                                    data-placeholder="Seleccione">
                                    <option value="">Seleccionar jefe de departamento</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id == $departament->user_id ? 'selected' : '' }}>
                                            {{ $user->user_name }}
                                        </option>
                                    @endforeach
                                </x-adminlte-select2>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="state_fke">Estado *</label>
                                <select id="state_fke" name="state_fke" class="form-control" required>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}"
                                            {{ $state->id == $departament->state_fke ? 'selected' : '' }}>
                                            {{ $state->state_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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
