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
                        <h3> Agregar Empleado</h3>
                    </div>

                    <div class="panel-body">

                        <form method="POST" action="{{ route('empleado.store') }}">

                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.name') }} </label>
                                        <input type="text" id="nombre" name="nombre" placeholder="nombre" value="{{ old('nombre') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.lastname_1') }} </label>
                                        <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido_paterno" value="{{ old('apellido_paterno') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.lastname_2') }} </label>
                                        <input type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido_materno" value="{{ old('apellido_materno') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.birthdate') }} </label>
                                        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.gender') }} </label>
                                        <label> {{ trans('validation.required',['attribute' => 'prueba']) }} </label>
                                        <label> {{ trans('forms.form_create.prueba_parametro',['datoprueba' => 'HOLA']) }} </label>

                                        <div class="radio">
                                            <label><input type="radio" id="genero" name="genero" value="masculino">Masculino</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" id="genero" name="genero" value="Femenino">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="direccion" id="direccion" name="direccion" placeholder="direccion" value="{{ old('direccion') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="email" id="correo" name="correo" placeholder="correo" value="{{ old('correo') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="telefono" id="telefono" name="telefono" placeholder="telefono" value="{{ old('telefono') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="codigo_empleado" id="codigo_empleado" name="codigo_empleado" placeholder="codigo_empleado" value="{{ old('codigo_empleado') }}">
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