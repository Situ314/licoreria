<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\Repartidor;
use patio\User;
use patio\Grupo;
use Illuminate\Support\Facades\DB;

class RepartidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //2 codigo de repartidor
        $repartidores = User::where('CodGrupo', 2)->where('Activo', 'S')->paginate(15);
//        $repartidores = Repartidor::orderBy('Nombres')->paginate(15);
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('repartidor.lista_repartidor', ['repartidores' => $repartidores, 'permisos' => $permisos]);
    }

    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $search = \Request::get('search');
        
        $repartidores = Repartidor::where('Nombres', 'like', '%'.$search.'%')
                            ->orderBy('CodRepartidor')
                            ->paginate(15);
        return view('repartidor.lista_repartidor', ['repartidores' => $repartidores]);
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
        return view('repartidor.crear_repartidor', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = Grupo::where('Nombre', 'Repartidor')->get()->first();
        
        $user = new User;
        $user->Nombre = $request->Nombre;
        $user->Telefono = $request->Telefono;
        $user->Celular = $request->Celular;
        $user->email = $request->Email;
        $user->username = $request->username;
        $user->password = bcrypt($request['password']);
        $user->CodGrupo = $grupo->CodGrupo;
        $user->save();
        
        $repartidor = new Repartidor;
        $repartidor->CodRepartidor = $user->id;
        $repartidor->CodLocal = 1;
        $repartidor->save();
        
        return redirect('Repartidor'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodRepartidor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repartidor = User::where('id', $id)->get()->first();
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('repartidor.editar_repartidor', compact('repartidor', 'permisos'));
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
        User::where('id', $id)->update(
                [
                    'Nombre' => $request->Nombre,
                    'Telefono' => $request->Telefono,
                    'Celular' => $request->Celular,
                    'email' => $request->Email,
                    'username' => $request->username,
                    'password' => bcrypt($request->password)                
                ]);
        return redirect('Repartidor');
    }

    /**
     * Remove the specified r
     * esource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->update(
                [
                    'Activo' => 'N'               
                ]);
        
        return redirect('Repartidor');
    }
}
