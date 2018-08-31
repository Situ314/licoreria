<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use patio\Cliente;
use patio\User;
use patio\Grupo;

use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Support\Facades\Route;
//use Mapper;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('Nombre')->paginate(15);
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('cliente.lista_cliente', ['clientes' => $clientes, 'permisos' => $permisos]);
        
    }

    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $search = \Request::get('search');
        
        $clientes = Cliente::where('Nombre', 'like', '%'.$search.'%')
                            ->orderBy('CodCliente')
                            ->paginate(15);
        return view('cliente.lista_cliente', ['clientes' => $clientes]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('cliente.crear_cliente', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = Grupo::where('Nombre', 'Cliente')->get()->first();
        
        $user = new User;
        $user->Nombre = $request->Nombre;
        $user->Telefono = $request->Telefono;
        $user->Celular = $request->Celular;
        $user->email = $request->Email;
        $user->username = $request->username;
        $user->password = bcrypt($request['password']);
        $user->CodGrupo = $grupo->CodGrupo;
        $user->save();
        
        $cliente = new Cliente;
        $cliente->CodCliente = $user->id;
        $cliente->Direccion = $request->Direccion;
        $cliente->Zona = $request->Zona;
        $cliente->Numero = $request->Numero;
        $cliente->Referencia = $request->Referencia;
        //la latitud y longitud se obtienen del mapa y aun falta
        $cliente->Latitud = $request->Latitud;
        $cliente->Longitud = $request->Longitud;        
        $cliente->NIT = $request->NIT;        
        $cliente->NombreFactura = $request->NombreFactura;
        $cliente->save();
        
        return redirect('login_web'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($CodCliente)
    {
        $cliente = Cliente::where('CodCliente', $CodCliente)->get()->first();
        $usuario = User::findOrFail($CodCliente);
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('cliente.editar_cliente', compact('cliente', 'usuario', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CodCliente)
    {
        User::where('id', $CodCliente)->update(
                [
                    'Nombre' => $request->Nombre,
                    'Telefono' => $request->Telefono,
                    'Celular' => $request->Celular,
                    'email' => $request->Email,
                    'username' => $request->username,
                    'password' => bcrypt($request['password'])
                ]);
        Cliente::where('CodCliente', $CodCliente)->update(
                [
                    'Direccion' => $request->Direccion,
                    'Zona' => $request->Zona,
                    'Numero' => $request->Numero,
                    'Referencia' => $request->Referencia,
//                    'Latitud' => $request->Latitud,
//                    'Longitud' => $request->Longitud,
                    'NIT' => $request->NIT,
                    'NombreFactura' => $request->NombreFactura
                ]);
        return redirect('Cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodCliente)
    {
        //falta borrar sus dependencias
        User::where('id', $CodCliente)->delete();
        Cliente::where('CodCliente', $CodCliente)->delete();
        
        return redirect('Cliente');
    }
}
