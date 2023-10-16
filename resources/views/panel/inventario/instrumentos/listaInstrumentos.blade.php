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
                                <td>{{ $instrument->instrument_serial_code }}</td>
                                <td>{{ $instrument->departaments->departament_name }}</td>
                                <td>{{ $instrument->conditions->condition_name }}</td>
                                <td>
                                    <a href="{{ route('inventario.instrumentos.show', ['id' => $instrument->id]) }}" class="btn btn-xs btn-info" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @can('inventario.instrumentos.buttons')
                                        <a href="{{ route('inventario.instrumentos.edit', ['id' => $instrument->id]) }}" class="btn btn-xs btn-primary" title="Editar">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route('inventario.instrumentos.destroy', ['id' => $instrument->id]) }}" method="POST" class="form-delete" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>

            </x-adminlte-card>
        </div>
    </div>
@stop

@section('js')

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'Registro fue eliminado exitosamente',
                "success"
            )
        </script>
    @endif

    @if (session('creacion') == 'ok')
        <script>
            Swal.fire(
                'Creación exitosa!',
                'El instrumento fue creado exitosamente',
                "success"
            )
        </script>
    @endif

    @if (session('edicion') == 'ok')
        <script>
            Swal.fire(
                'Edición exitosa!',
                'El instrumento fue editado exitosamente',
                "success"
            )
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estás seguro de eliminar el instrumento?',
                text: "No puedes revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'No, cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

@endsection
