@extends('layouts.app')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2" >
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Editar Datos</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('empleado.update',$empleado->id)}}" role="form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.name') }}</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="nombre" value="{{ old('nombre',$empleado->nombre) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.lastname_1') }}</label>
                                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control input-sm" placeholder="apellio paterno" value="{{ old('apellido_paterno',$empleado->apellido_paterno) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.lastname_2') }}</label>
                                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control input-sm" placeholder="apellido_materno" value="{{ old('apellido_materno',$empleado->apellido_materno) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.birthdate') }}</label>
                                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control input-sm" value="{{ old('fecha_nacimiento',$empleado->fecha_nacimiento) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.city') }}</label>
                                        <input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="ciudad" value="{{ old('ciudad',$empleado->ciudad) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="radio">
                                <label class="form-check-label" for="campo_genero_h">{{ trans('forms.form_create.male') }}</label>
                                <label><input type="radio" id="genero" name="genero" value="masculino">Masculino</label>
                            </div>
                            <div class="radio">
                                <label class="form-check-label" for="campo_genero_m">{{ trans('forms.form_create.female') }}</label>
                                <label><input type="radio" id="genero" name="genero" value="Femenino">Femenino</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('forms.form_create.address') }}</label>
                                    <input type="text" name="direccion" id="direccion" placeholder="Av Siempre Viva #27" value="{{ old('direccion', $empleado->direccion)}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.email') }}</label>
                                        <input type="email" name="correo" id="correo" placeholder="correo" value="{{ old('correo',$empleado->correo) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.telephone') }}</label>
                                        <input type="tel" name="telefono" id="telefono" placeholder="telefono" value="{{ old('telefono',$empleado->telefono) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.code') }}</label>
                                        <label >{{$empleado->codigo_empleado}}</label>
                                        <input type="codigo_empleado" id="codigo_empleado" name="codigo_empleado" placeholder="codigo_empleado" value="{{ old('codigo_empleado') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.salary') }} </label>
                                        <input type="number" name="salario" id="salario" placeholder="Salario del empleado" value="{{ old('salario', $empleado->salario) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.currency') }} </label>
                                        <select class="form-control" id="tipo_moneda" name="tipo_moneda">
                                            <option value="{{old('tipo_moneda',$empleado->tipo_moneda)}}"> {{old('tipo_moneda',$empleado->tipo_moneda)}}</option>
                                            @foreach($listMonedas as $moneda)
                                                <option value="{{$moneda}}">{{$moneda}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                    <a href="{{ route('empleado.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>

@endsection