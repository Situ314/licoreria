<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\Despachador;
use patio\User;
use patio\Grupo;
use DB;

class DespachadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 3 codigo de despachador
        $despachadores = User::where('CodGrupo', 3)->where('Activo', 'S')->paginate(15);
        
//        $despachadores = Despachador::orderBy('Nombres')->paginate(15);
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('despachador.lista_despachador', ['despachadores' => $despachadores, 'permisos' => $permisos]);
    }

    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $search = \Request::get('search');
        
        $despachadores = User::where('Nombres', 'like', '%'.$search.'%')
                            ->orderBy('CodDespachador')
                            ->paginate(15);
        return view('despachador.lista_despachador', ['despachadores' => $despachadores]);
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
        return view('despachador.crear_despachador', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = Grupo::where('Nombre', 'Despachador')->get()->first();
        
        $user = new User;
        $user->Nombre = $request->Nombre;
        $user->Telefono = $request->Telefono;
        $user->Celular = $request->Celular;
        $user->email = $request->Email;
        $user->username = $request->username;
        $user->password = bcrypt($request['password']);
        $user->CodGrupo = $grupo->CodGrupo;
        $user->save();
        
        $despachador = new Despachador;
        $despachador->CodDespachador = $user->id;
        $despachador->CodLocal = 1;
        $despachador->save();
        
        return redirect('Despachador'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodDespachador)
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
        $despachador = User::where('id', $id)->get()->first();
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('despachador.editar_despachador', compact('despachador', 'permisos'));
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
        return redirect('Despachador');
    }

    /**
     * Remove the specified resource from storage.
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
        
        return redirect('Despachador');
    }
}
