@extends('adminlte::page')

@section('title', 'Lista Insumos')

@section('content_header')
    <h1 class="m-0 text-dark">Lista Insumos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Lista Insumos" theme="lightblue" theme-mode="outline" collapsible>

                <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="outline">
                    @foreach ($supplies as $supply)
                        <tr>
                            <td>{{ $supply->id }}</td>
                            <td>{{ $supply->supply_name }}</td>
                            <td>{{ $supply->supply_desc ?? 'Sin información' }}</td>
                            <td>{{ $supply->supply_weight }}</td>
                            <td>{{ $supply->supply_stock }}</td>
                            <td>{{ $supply->states->state_name }}</td>
                            <td>
                                <a href="{{ route('inventario.insumos.show', ['id' => $supply->id]) }}"
                                    class="btn btn-xs btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>

                                @can('inventario.insumos.buttons')
                                <a href="{{ route('inventario.insumos.edit', ['id' => $supply->id]) }}"
                                    class="btn btn-xs btn-primary" title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('inventario.insumos.destroy', ['id' => $supply->id]) }}" method="POST" class="form-delete" style="display: inline;">
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
                'El insumo fue creado exitosamente',
                "success"
            )
        </script>
    @endif

    @if (session('edicion') == 'ok')
        <script>
            Swal.fire(
                'Edición exitosa!',
                'El insumo fue editado exitosamente',
                "success"
            )
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estás seguro de eliminar el insumo?',
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
