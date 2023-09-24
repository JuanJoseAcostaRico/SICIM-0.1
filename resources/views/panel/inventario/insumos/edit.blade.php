@extends('adminlte::page')

@section('title', 'Detalle Insumo')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle Insumo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Editar Insumo" theme="lightblue" theme-mode="outline" collapsible>
                <form id="edit_supply_form" action="{{ route('inventario.insumos.update', $supply->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supply_name">Nombre Insumo</label>
                                <input type="text" id="supply_name" name="supply_name" class="form-control" required value="{{ $supply->supply_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supply_desc">Descripción</label>
                                <input type="text" id="supply_desc" name="supply_desc" class="form-control" required value="{{ $supply->supply_desc }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supply_weight">Peso</label>
                                <input type="text" id="supply_weight" name="supply_weight" class="form-control" required value="{{ $supply->supply_weight }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supply_posology">Posología</label>
                                <input type="text" id="supply_posology" name="supply_posology" class="form-control" required value="{{ $supply->supply_posology }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supply_stock">Cantidad/Stock</label>
                                <input type="text" id="supply_stock" name="supply_stock" class="form-control" required value="{{ $supply->supply_stock }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state_fke">Estado</label>
                                <select id="state_fke" name="state_fke" class="form-control" required>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" {{ $state->id == $supply->state_fke ? 'selected' : '' }}>
                                            {{ $state->state_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <x-adminlte-button label="Guardar cambios" theme="primary" icon="fas fa-save" type="submit" class="mr-3" />
                            <a href="{{ route('inventario.insumos.lista') }}" class="btn btn-secondary">Cancelar</a>
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
