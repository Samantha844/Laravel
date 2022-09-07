@extends('layouts.app')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div>
                            <h3> Listado empleados</h3>
                        </div>

                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class="alert-info">
                                {{\Illuminate\Support\Facades\Session::get('success')}}
                            </div>
                        @endif

                        <div class="pull-right">
                            <a href="{{ route('empleado.create') }}" class="btn btn-success">Agregar empleado</a>
                        </div>


                        <div class="table-container">
                            <table id="tablaEmpleados" class="table table-bordered table-striped">
                                <thead>
                                    <th>Codigo empleado</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </thead>

                                <tbody>
                                @if($empleados->count())
                                    @foreach($empleados as $empleado)
                                    <tr>
                                        <td>{{ $empleado->codigo_empleado }}</td>
                                        <td>{{ $empleado->nombre }}</td>
                                        <td>{{ $empleado->apellido_paterno . " " . $empleado->apellido_materno }}</td>
                                        <td>{{ $empleado->correo }}</td>
                                        <td>
                                            <form action="{{route('empleado.destroy', $empleado->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="delete">
                                                <button class="button btn-danger" type="submit">Eliminar</button>
                                            </form>
                                            <a class="btn btn-primary btn-xs" href="{{route('empleado.edit', $empleado->id)}}" >Editar</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5"> No hay Registros</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>

@endsection