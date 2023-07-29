@extends('adminlte::page')

@section('title', 'Detalle Usuario')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle Usuario</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Información del Usuario" theme="lightblue" theme-mode="outline" collapsible>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_name">Nombre</label>
                            <input type="text" id="user_name" class="form-control" value="{{ $user->user_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" id="user_email" class="form-control" value="{{ $user->user_email }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_phone">Teléfono</label>
                            <input type="text" id="user_phone" class="form-control" value="{{ $user->user_phone }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_address">Dirección</label>
                            <input type="text" id="user_address" class="form-control" value="{{ $user->user_address }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">Rol</label>
                            <input type="text" id="role" class="form-control" value="{{ $user->roles->implode('name', ', ') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="padding-top: 10px;">
                    <a href="{{ route('usuarios.lista') }}" class="btn btn-primary">Volver a la lista de usuarios</a>
                </div>
            </x-adminlte-card>
        </div>
    </div>
@stop
