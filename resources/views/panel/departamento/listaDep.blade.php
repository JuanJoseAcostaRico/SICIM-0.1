@extends('adminlte::page')

@section('title', 'Lista Departamento')

@section('content_header')
    <h1 class="m-0 text-dark">Lista Departamento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

             {{-- <div class="card">
                <div class="card-body">
                    Lista de los usuarios registrados en el sistema SICIM
                </div>
            </div> --}}

            <x-adminlte-card title="Lista Departamentos" theme="lightblue" theme-mode="outline" collapsible>

                <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="outline">
                    @foreach ($departaments as $departament)
                        <tr>
                            <td>{{ $departament->id }}</td>
                            <td>{{ $departament->departament_name }}</td>
                            <td>{{ $departament->user->user_name }}</td>
                            <td>{{ $departament->states->state_name }}</td>
                            <td>
                                <a href="{{ route('departamento.show', ['id' => $departament->id]) }}" class="btn btn-xs btn-warning" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('departamento.edit', ['id' => $departament->id]) }}" class="btn btn-xs btn-primary" title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('departamento.destroy', ['id' => $departament->id]) }}" method="POST" class="form-delete" style="display: inline;">
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
                'El departamento fue creado exitosamente',
                "success"
            )
        </script>
    @endif

    @if (session('edicion') == 'ok')
        <script>
            Swal.fire(
                'Edición exitosa!',
                'El departamento fue editado exitosamente',
                "success"
            )
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estás seguro de eliminar el departamento?',
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
