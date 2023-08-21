@extends('adminlte::page')

@section('title', 'Registro Instrumento')

@section('content_header')
    <h1 class="m-0 text-dark">Registro Instrumento</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Registro" theme="lightblue" theme-mode="outline" collapsible>
                <form id="new_instrument_form" action="{{ route('inventario.instrumentos.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="instrument_name" label="Nombre de Instrumento" placeholder="Nombre del instrumento"
                                     :input-class="'required'" :pattern="'[a-zA-Z0-9. ]+'" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="instrument_desc" label="Descripción" type="text"
                                    placeholder="Descripción de instrumento"  :input-class="'required'"
                                    :pattern="'[a-zA-Z0-9. ]+'" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="instrument_size" label="Tamaño" placeholder="Tamaño de instrumento"
                                     :input-class="'required'" :pattern="'[a-zA-Z0-9. ]+'"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="instrument_stock" label="Cantidad" placeholder="Stock de instrumento"
                                     :input-class="'required'" :pattern="'[0-9. ]+'" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departament_fke">Departamento</label>
                                <select id="departament_fke" name="departament_fke" class="form-control" required>
                                    <option value="">Seleccionar Departamento</option>
                                    @foreach ($departaments as $departament)
                                        <option value="{{ $departament->id }}">{{ $departament->departament_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="condition_fke">Condición</label>
                                <select id="condition_fke" name="condition_fke" class="form-control" required>
                                    <option value="">Seleccionar condición</option>
                                    @foreach ($conditions as $condition)
                                        <option value="{{ $condition->id }}">{{ $condition->condition_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <x-adminlte-button label="Registrar" theme="primary" icon="fas fa-save" type="submit" />
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
            const newsupplyForm = document.getElementById('new_instrument_form');

            newsupplyForm.addEventListener('submit', function (event) {
                if (!newsupplyForm.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                newsupplyForm.classList.add('was-validated');
            });
        });
    </script>
@endsection
