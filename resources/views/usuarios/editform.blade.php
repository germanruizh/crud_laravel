@extends('layouts.base')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
        <div id="validate"></div>
        @if(session('usuarioModificado'))
        <div class="alert alert-success">
            {{ session('usuarioModificado') }}
        </div>
        @endif
        <!-- Validación de errores -->
        @if($errors->any())
        <div class="alert alert-danger">{{ $usuario->nombre }}
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <div class="card">
                <form action="{{ route('edit', $usuario->id) }}" method="POST">
                @csrf @method('PATCH')
                    <div class="card-header text-center"><h3>Editar usuario</h3></div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-6">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-12" value="{{ $usuario->nombre }}" required>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-6">Apellido</label>
                            <input type="text" name="apellido" class="form-control col-md-12" value="{{ $usuario->apellido }}" required>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-6">Número de cédula</label>
                            <input type="text" name="cedula" class="form-control col-md-12" value="{{ $usuario->cedula }}" id="cedula" onkeyup="validationNumber(this)" required onchange="validationNumberId(this)">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-6">Correo electrónico</label>
                            <input type="email" name="email" class="form-control col-md-12" value="{{ $usuario->email }}" required>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-6">Teléfono</label>
                            <input type="text" name="telefono" class="form-control col-md-12" value="{{ $usuario->telefono }}" id="telefono" onkeyup="validationNumber(this)" onchange="validationNumberPhone(this)" required>
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2" id="enviar">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="{{ url('/') }}" class="btn btn-light btn-xs mt-5">&laquo; Volver</a>
</div>