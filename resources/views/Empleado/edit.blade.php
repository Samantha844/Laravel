@extends('layouts.app')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3> Editar Empleado</h3>
                    </div>

                    <div class="panel-body">

                        <form method="POST" action="{{ route('empleado.update',$empleado->id) }}">

                            <input name="_method" type="hidden" value="PUT">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.employe_code') }}: {{$empleado->codigo_empleado}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.name') }} </label>
                                        <input type="text" id="nombre" name="nombre" placeholder="nombre" value="{{ old('nombre',$empleado->nombre) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.lastname_1') }} </label>
                                        <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido_paterno" value="{{ old('apellido_paterno',$empleado->apellido_paterno) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.lastname_2') }} </label>
                                        <input type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido_materno" value="{{ old('apellido_materno',$empleado->apellido_materno) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.birthdate') }} </label>
                                        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento" value="{{ old('fecha_nacimiento',$empleado->fecha_nacimiento) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.gender') }} </label>
                                        <div class="radio">
                                            <label><input type="radio" id="genero" name="genero" value="masculino" {{$empleado->genero == 'masculino' ? 'checked="true"' : ''}}>Masculino</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" id="genero" name="genero" value="Femenino" {{$empleado->genero == 'femenino' ? 'checked="true"' : ''}}>Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="direccion" id="direccion" name="direccion" placeholder="direccion" value="{{ old('direccion',$empleado->direccion) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="email" id="correo" name="correo" placeholder="correo" value="{{ old('correo',$empleado->correo) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="telefono" id="telefono" name="telefono" placeholder="telefono" value="{{ old('telefono',$empleado->telefono) }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <button type="submit" class="btn btn-success"> Guardar</button>
                                <a href="{{ route('empleado.index') }}" class="btn btn-default">Atras</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection