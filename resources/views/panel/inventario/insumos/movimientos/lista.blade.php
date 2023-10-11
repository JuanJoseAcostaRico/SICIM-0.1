@extends('adminlte::page')

@section('title', 'Lista Movimientos')

@section('content_header')
<div class="d-flex">
    <h1 class="m-0 text-dark">Lista Movimientos</h1>
    <a class="btn btn-primary ml-auto" href="{{ route('inventario.movimientos.registro') }}">Registrar nuevo movimiento</a>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            <x-adminlte-card title="" theme="lightblue" theme-mode="outline" collapsible>

                <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="outline">
                    @foreach ($movements as $movement)
                        <tr>
                            <td>{{ $movement->id }}</td>
                            <td>{{ $movement->supplies->supply_name }}</td>
                            <td>{{ $movement->movement_types->movement_type_name }}</td>
                            <td>{{ $movement->movement_desc }}</td>
                            <td>{{ $movement->movement_stock }}</td>
                            <td class="text-center">
                                <a href="{{ route('inventario.insumos.movimientos.show', ['id' => $movement->id]) }}"
                                    class="btn btn-sm btn-warning" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>

                               {{-- COMENTADO LAS ACCIONES DE CRUD DE EDITAR, ACTUALIZAR Y ELIMINAR

                                <a href="{{ route('inventario.insumos.movimientos.edit', ['id' => $movement->id]) }}"
                                    class="btn btn-sm btn-primary" title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('inventario.insumos.movimientos.destroy', ['id' => $movement->id]) }}" method="POST" class="form-delete" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                FIN DE COMENTARIO    --}}

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

    @if (session('creado') == 'ok')
        <script>
            Swal.fire(
                'Creación exitosa!',
                'El movimiento de insumo fue registrado exitosamente',
                "success"
            )
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estás seguro de eliminar el movimiento?',
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
