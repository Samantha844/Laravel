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
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$empleado->id}}">Eliminar</button>
                                            <!-- Modal Confirm Delete-->
                                            <div class="modal fade" id="modal-delete-{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('empleado.destroy', $empleado->id)}}" method="post">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿ Desea eliminar al registro {{$empleado->nombre}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Final Modal-->

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