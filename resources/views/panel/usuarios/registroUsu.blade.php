@extends('adminlte::page')

@section('title', 'Registro Usuarios')

@section('content_header')
    <h1 class="m-0 text-dark">Registro Usuarios</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Registro" theme="lightblue" theme-mode="outline" collapsible>
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="user_name" label="Nombre Completo *" placeholder="Ingrese su nombre completo"
                                     :input-class="'required'" :pattern="'[a-zA-Z ]+'" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="user_email" label="Email *" type="email"
                                    placeholder="Email del usuario"  :input-class="'required'"
                                    :pattern="'[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+'" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="user_phone" label="Teléfono (opcional)" placeholder="Ingresa tu número de teléfono sin letras ni signos"
                                     :pattern="'[0-9]{7,11}'" minlength="11"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-adminlte-input name="user_address" label="Dirección (opcional)" placeholder="Dirección del usuario"
                                     />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Rol *</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">Seleccione un rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Contraseña *</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="user_password" class="form-control" minlength="8" required>
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
            const togglePassword = document.querySelector('#toggle_password');
            const passwordInput = document.querySelector('#password');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                const iconClass = type === 'password' ? 'fas fa-eye-slash' : 'fas fa-eye';
                togglePassword.querySelector('i').setAttribute('class', iconClass);
            });
        });
    </script>
@endsection
