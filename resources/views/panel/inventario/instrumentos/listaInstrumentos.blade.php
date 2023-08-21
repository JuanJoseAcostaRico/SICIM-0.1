@extends('adminlte::page')

@section('title', 'Lista Instrumento')

@section('content_header')
    <h1 class="m-0 text-dark">Lista Instrumento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Lista Instrumentos" theme="lightblue" theme-mode="outline" collapsible>

                    <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="outline">
                        @foreach ($instruments as $instrument)
                            <tr>
                                <td>{{ $instrument->id }}</td>
                                <td>{{ $instrument->instrument_name }}</td>
                                <td>{{ $instrument->instrument_desc }}</td>
                                <td>{{ $instrument->instrument_size }}</td>
                                <td>{{ $instrument->instrument_stock }}</td>
                                <td>{{ $instrument->departaments->departament_name }}</td>
                                <td>{{ $instrument->conditions->condition_name }}</td>
                                <td>
                                    <a href="{{ route('inventario.instrumentos.show', ['id' => $instrument->id]) }}" class="btn btn-xs btn-warning" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('inventario.instrumentos.edit', ['id' => $instrument->id]) }}" class="btn btn-xs btn-primary" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('inventario.instrumentos.destroy', ['id' => $instrument->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>

            </x-adminlte-card>
        </div>
    </div>
@stop
