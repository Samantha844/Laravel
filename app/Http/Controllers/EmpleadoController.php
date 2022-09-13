<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use GuzzleHttp\Client as HttpClient;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client as HttpClient;

class EmpleadoController extends Controller
{   
    public function __construct()
    {
        //$this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id', 'DESC')->get();

        return view('Empleado.index',compact('empleados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencyWS = $this->obtenerCurrencyWS();
        $listMonedas = explode(";" , $currencyWS);
        return view('Empleado.create',compact('listMonedas'));
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

        $this->validate($request,[
            'nombre' => 'required|max:10',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email', //Formato correo
            'fecha-nacimiento' => '',//Solo acepte formato fecha
            'ciudad' =>'required',
            'direccion' => '',
            'genero' => 'required', //Solo acepte masculino/femenino
            'telefono' => 'required',
            'codigo_empleado' => 'required', //Unico
            'puesto' => 'required',
            'edad' =>'required',
            'salario' =>'required',
            'tipo_moneda' =>'required',
            'activo' =>'required'
        ]);

        /*$validaciones = Validator::make($request->all(), [
                'nombre' => 'required|max:10',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'correo' => 'required',
                'fecha-nacimiento' => '',
                'direccion' => '',
                'genero' => 'required',
                'telefono' => 'required',
                'codigo_empleado' => 'required',
                'puesto' => 'required',
                'edad' =>'required',
                'salario' =>'required',
                'tipo_moneda' =>'required',
                'activo' =>'required'
            ]
        );

        dd($request->all(),$validaciones, $validaciones->errors());*/

        $arraySave = [
            'nombre' => $request->get("nombre"),
            'apellido_paterno' => $request->get("apellido_paterno"),
            'apellido_materno' => $request->get("apellido_materno"),
            'correo' => $request->get("correo"),
            'fecha-nacimiento' => $request->get("fecha_nacimiento"),
            'ciudad' => $request->get("ciudad"),
            'direccion' => $request->get("direccion"),
            'genero' => $request->get("genero"),
            'telefono' => $request->get("telefono"),
            'codigo_empleado' => $request->get("codigo_empleado"),
            'puesto' => $request->get("puesto"),
            'edad' => $request->get("edad"),
            'salario' => $request->get("salario"),
            'tipo_moneda' => $request->get("tipo_moneda"),
            'activo' => $request->get("activo") ? $request->get('activo') : 0
        ];

        $saveEmpleado = Empleado::create($arraySave);

        return redirect()->route('empleado.index')->with('success','Registro creado exitosamente.');

        //dd($saveEmpleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        $estadosWS = $this->wsEstados();
        $listEstados = ((array)$estadosWS->data)['lst_estado_proveedor'];
        return view('Empleado.show',compact('empleado','listEstados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $currencyWS = $this->obtenerCurrencyWS();
        $listMonedas = explode(";" , $currencyWS);
        return view('Empleado.edit',compact('empleado','listMonedas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email', 
            'fecha-nacimiento' => '',
            'ciudad' =>'required',
            'direccion' => '',
            'genero' => 'required', //Solo acepte masculino/femenino
            'telefono' => 'required',
            'codigo_empleado' => 'required', //Unico
            'puesto' => 'required',
            'edad' =>'required',
            'salario' =>'required',
            'tipo_moneda' =>'required',
            'activo' =>'required',
        ]);
        Empleado::find($id)->update($request->all());

        return redirect()->route('empleado.index')->with('success','Registro actualizado satisfactoriamente');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado satisfactoriamente');
    }

    private function obtenerCurrencyWS(){

        $client = new HttpClient(['base_uri' => 'https://fx.currencysystem.com/webservices/CurrencyServer5.asmx/','verify' => false]);
        $response = $client->request('GET',"AllCurrencies",['query' => 'licenseKey=']);
        return xmlrpc_decode($response->getBody()->getContents());
    }

    public function wsEstados(){
        $client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/','verify' => false]);
        $response = $client->request('POST','proveedor/obtener/lista_estados');
        return json_decode($response->getBody());
    }

    private function wsEstados(){

        // Create a client with a base URI
        $client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/']);
        $response = $client->request('POST', 'proveedor/obtener/lista_estados');

        return json_decode($response->getBody());
    }
}
