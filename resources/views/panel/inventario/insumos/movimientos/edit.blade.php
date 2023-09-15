@extends('adminlte::page')

@section('title', 'Detalle Movimiento')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle Movimiento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Editar Movimiento" theme="lightblue" theme-mode="outline" collapsible>
                <form id="edit_supply_form" action="{{ route('inventario.insumos.movimientos.update', $movement->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="movement_types_fke">Tipo de movimiento</label>
                                <select id="movement_types_fke" name="movement_types_fke" class="form-control" required>
                                    @foreach ($movement_types as $movement_type)
                                        <option value="{{ $movement_type->id }}" {{ $movement_type->id == $movement->movement_types_fke ? 'selected' : '' }}>
                                            {{ $movement_type->movement_type_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="movement_desc">Descripción</label>
                                <input type="text" id="movement_desc" name="movement_desc" class="form-control" required value="{{ $movement->movement_desc }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supply_fke">Estado</label>
                                <select id="supply_fke" name="supply_fke" class="form-control" required>
                                    @foreach ($supplies as $supply)
                                        <option value="{{ $supply->id }}" {{ $supply->id == $movement->supply_fke ? 'selected' : '' }}>
                                            {{ $supply->supply_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="movement_stock">Cantidad/Stock</label>
                                <input type="text" id="movement_stock" name="movement_stock" class="form-control" required value="{{ $movement->movement_stock }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <x-adminlte-button label="Guardar cambios" theme="primary" icon="fas fa-save" type="submit" class="mr-3" />
                            <a href="{{ route('inventario.movimientos.lista') }}" class="btn btn-secondary">Cancelar</a>
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
            const editsupplyForm = document.getElementById('edit_supply_form');

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
