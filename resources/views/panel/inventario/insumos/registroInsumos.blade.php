@extends('adminlte::page')

@section('title', 'Registro Insumos')

@section('content_header')
    <h1 class="m-0 text-dark">Registro Insumos</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Registro" theme="lightblue" theme-mode="outline" collapsible>
                <form id="new_supply_form" action="{{ route('inventario.insumos.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="supply_name" label="Nombre de insumo *" placeholder="Nombre del insumo"
                                     :input-class="'required'" :pattern="'[a-zA-Z0-9. ]+'" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="supply_desc" label="Descripción (opcional)" type="text"
                                    placeholder="Descripción de insumo"  :input-class="'required'"
                                    :pattern="'[a-zA-Z0-9. ]+'" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="supply_weight" label="Peso *" placeholder="Peso de insumo"
                                     :input-class="'required'" :pattern="'[a-zA-Z0-9. ]+'" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="supply_posology" label="Posología (opcional)" placeholder="Posología del insumo"
                                     :input-class="'required'" :pattern="'[a-zA-Z0-9. ]+'" />
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="supply_stock" label="Cantidad" placeholder="Cantidad/stock del insumo"
                                     :input-class="'required'" :pattern="'[a-zA-Z0-9. ]+'"/>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state_fke">Estado *</label>
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
