@extends('layouts.app')

@section('content')
    <div class="row">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-body">

                    <div>
                        <h3> Listado empleados</h3>
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
                                    <td></td>
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

        </section>

    </div>

@endsection