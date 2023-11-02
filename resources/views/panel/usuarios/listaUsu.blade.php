@extends('adminlte::page')

@section('title', 'Lista Usuarios')

@section('content_header')
    <h1 class="m-0 text-dark">Lista Usuarios Totales Registrados</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

             {{-- <div class="card">
                <div class="card-body">
                    Lista de los usuarios registrados en el sistema SICIM
                </div>
            </div> --}}

            <x-adminlte-card title="Lista Usuarios" theme="lightblue" theme-mode="outline" collapsible>

                <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="outline">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->user_email }}</td>
                            <td>{{ $user->user_phone  ?? 'Campo sin información' }}</td>
                            <td>{{ $user->roles->implode('name', ', ') }}</td>
                            <td>
                                <a href="{{ route('usuarios.show', ['id' => $user->id]) }}" class="btn btn-xs btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('usuarios.buttons')
                                <a href="{{ route('usuarios.edit', ['id' => $user->id]) }}" class="btn btn-xs btn-primary" title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('usuarios.destroy', ['id' => $user->id]) }}" method="POST" class="form-delete" style="display: inline;">
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
                'Registro exitoso!',
                'El usuario fue registrado exitosamente',
                "success"
            )
        </script>
    @endif

    @if (session('edicion') == 'ok')
        <script>
            Swal.fire(
                'Edición exitosa!',
                'El usuario fue editado exitosamente',
                "success"
            )
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estás seguro de eliminar el usuario?',
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

{{-- INICIO COMENTARIO DATATABLES LENGUAJE
@section('js')
    <script>
        $('#table1').DataTable({
            responsive: true,
            autowidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_  registros por página",
                "zeroRecords": "No se encontró nada lo siento",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>
@endsection

    FIN DE COMENTARIO LEGUAJE DATATABLES--}}
