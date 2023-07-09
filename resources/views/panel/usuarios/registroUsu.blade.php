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
                    <x-adminlte-input name="user_name" label="Nombre" placeholder="Nombre del usuario"
                                      fgroup-class="col-md-6" :input-class="'required'" :pattern="'[a-zA-Z ]+'"/>
                </div>
                <div class="row">
                    <x-adminlte-input name="user_email" label="Email" type="email"
                                      placeholder="Email del usuario" fgroup-class="col-md-6" :input-class="'required'" :pattern="'[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+'"/>
                </div>
                <div class="row">
                    <x-adminlte-input name="password" label="Contraseña" type="password"
                                      placeholder="Contraseña" fgroup-class="col-md-6" :input-class="'required'"/>
                </div>
                <div class="row">
                    <x-adminlte-input name="user_phone" label="Teléfono" placeholder="Teléfono del usuario"
                                      fgroup-class="col-md-6" :input-class="'required'" :pattern="'[0-9]{7,11}'"/>
                </div>
                <div class="row">
                    <x-adminlte-input name="user_address" label="Dirección" placeholder="Dirección del usuario"
                                      fgroup-class="col-md-6" :input-class="'required'"/>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <x-adminlte-button label="Registrar" theme="primary" icon="fas fa-save" type="submit"/>
                    </div>
                </div>
            </form>
        </x-adminlte-card>
    </div>
</div>

@stop
