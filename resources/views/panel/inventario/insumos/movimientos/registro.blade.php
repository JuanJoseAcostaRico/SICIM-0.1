@extends('adminlte::page')

@section('title', 'Registro Movimientos de Insumos')

@section('content_header')
    <h1 class="m-0 text-dark">Registro Movimientos de Insumos</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="" theme="lightblue" theme-mode="outline" collapsible>
                <form id="new_movement_form" action="{{ route('inventario.insumos.movimientos.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="movement_types_fke">Tipo de movimiento *</label>
                                <select id="movement_types_fke" name="movement_types_fke" class="form-control" required>
                                    <option value="">Seleccionar tipo de movimiento</option>
                                    @foreach ($movement_types as $movement_type)
                                        <option value="{{ $movement_type->id }}">{{ $movement_type->movement_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="movement_desc" label="Descripción del movimiento (opcional)" placeholder="Descripción del movimiento"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supply_fke">Suministro *</label>
                                <select id="supply_fke" name="supply_fke" class="form-control" required>
                                    <option value="">Seleccionar Suministro</option>
                                    @foreach ($supplies as $supply)
                                        <option value=
                                            "{{ $supply->id }}">
                                            {{ $supply->supply_name }}
                                            (Stock: {{ $supply->supply_stock }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                       <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="movement_stock" label="Cantidad *" placeholder="Cantidad/stock"
                                    :input-class="'required'" :pattern="'^[1-9][0-9]*$'" required min="1"/>
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
            const newsupplyForm = document.getElementById('new_supply_form');

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
