@extends('adminlte::page')

@section('title', 'Detalle Instrumento')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle Instrumento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Editar Instrumento" theme="lightblue" theme-mode="outline" collapsible>
                <form id="edit_instrument_form" action="{{ route('inventario.instrumentos.update', $instrument->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instrument_name">Nombre Instrumento *</label>
                                <input type="text" id="instrument_name" name="instrument_name" class="form-control" required value="{{ $instrument->instrument_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instrument_desc">Descripción (opcional)</label>
                                <input type="text" id="instrument_desc" name="instrument_desc" class="form-control" value="{{ $instrument->instrument_desc }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instrument_size">Tamaño *</label>
                                <input type="text" id="instrument_size" name="instrument_size" class="form-control" required value="{{ $instrument->instrument_size }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instrument_serial_code">Código de serial *</label>
                                <input type="text" id="instrument_serial_code" name="instrument_serial_code" class="form-control" pattern="[0-9A-Z]+" required minlength="11" maxlength="20" value="{{ $instrument->instrument_serial_code }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departament_fke">Departamento *</label>
                                <select id="departament_fke" name="departament_fke" class="form-control" required>
                                    @foreach ($departaments as $departament)
                                        <option value="{{ $departament->id }}" {{ $departament->id == $instrument->departament_fke ? 'selected' : '' }}>
                                            {{ $departament->departament_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="condition_fke">Condición *</label>
                                <select id="condition_fke" name="condition_fke" class="form-control" required>
                                    @foreach ($conditions as $condition)
                                        <option value="{{ $condition->id }}" {{ $condition->id == $instrument->condition_fke ? 'selected' : '' }}>
                                            {{ $condition->condition_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <x-adminlte-button label="Guardar cambios" theme="primary" icon="fas fa-save" type="submit" class="mr-3" />
                            <a href="{{ route('inventario.instrumentos.lista') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </x-adminlte-card>
        </div>
    </div>
@stop



@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editsupplyForm = document.getElementById('edit_instrument_form');

            editsupplyForm.addEventListener('submit', function (event) {
                if (!editsupplyForm.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                editsupplyForm.classList.add('was-validated');
            });
        });
    </script>
@endsection
