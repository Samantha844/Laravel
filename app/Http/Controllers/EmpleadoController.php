<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id', 'DESC')->get();

        //dd($empleados);

        return view('Empleado.index',compact('empleados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $arraySave = [
            'nombre' => $request->get("nombre"),
            'apellido_paterno' => $request->get("apellido_paterno"),
            'apellido_materno' => $request->get("apellido_materno"),
            'correo' => $request->get("correo"),
            'fecha-nacimiento' => $request->get("fecha_nacimiento"),
            'direccion' => $request->get("direccion"),
            'genero' => $request->get("genero"),
            'telefono' => $request->get("telefono"),
            'codigo_empleado' => $request->get("codigo_empleado")
        ];

        $saveEmpleado = Empleado::create($arraySave);

        return redirect()->route('empleado.index')->with('success','Registro creado exitosamente.');

        //dd($saveEmpleado);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
