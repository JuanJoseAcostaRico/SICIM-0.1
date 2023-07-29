@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Usuario</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Editar Usuario" theme="lightblue" theme-mode="outline" collapsible>
                <form id="edit_user_form" action="{{ route('usuarios.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_name">Nombre</label>
                                <input type="text" id="user_name" name="user_name" class="form-control" required pattern="[a-zA-Z ]+" value="{{ $user->user_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" id="user_email" name="user_email" class="form-control" required pattern="[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+" value="{{ $user->user_email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_phone">Teléfono</label>
                                <input type="text" id="user_phone" name="user_phone" class="form-control" required pattern="[0-9]{7,11}" value="{{ $user->user_phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_address">Dirección</label>
                                <input type="text" id="user_address" name="user_address" class="form-control" required value="{{ $user->user_address }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Rol</label>
                                <select id="role" name="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="new_password">Nueva Contraseña</label>
                                <div class="input-group">
                                    <input type="password" id="new_password" name="new_password" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="toggle_password">
                                            <i class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <x-adminlte-button label="Guardar cambios" theme="primary" icon="fas fa-save" type="submit" class="mr-3" />
                            <a href="{{ route('usuarios.lista') }}" class="btn btn-secondary">Cancelar</a>
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
            const editUserForm = document.getElementById('edit_user_form');

            editUserForm.addEventListener('submit', function (event) {
                if (!editUserForm.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                editUserForm.classList.add('was-validated');
            });

            const togglePassword = document.querySelector('#toggle_password');
            const newPassword = document.querySelector('#new_password');

            togglePassword.addEventListener('click', function() {
                const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                newPassword.setAttribute('type', type);

                const iconClass = type === 'password' ? 'fas fa-eye-slash' : 'fas fa-eye';
                togglePassword.querySelector('i').setAttribute('class', iconClass);
            });
        });
    </script>
@endsection

