<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\Local;
use patio\CategoriaLocal;
use DB;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = Local::orderBy('Nombre')->paginate(15);
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('local.lista_local', ['locales' => $locales, 'permisos' => $permisos]);
    }
    
    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $search = \Request::get('search');
        
        $locales = Local::where('Nombre', 'like', '%'.$search.'%')
                            ->orderBy('CodLocal')
                            ->paginate(15);
        return view('local.lista_local', ['locales' => $locales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $categoria_locales = CategoriaLocal::all();
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('local.crear_local', compact('categoria_locales', 'permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //FALTA
        //guardar logotipo en el local
        //guardar imagen en la base de datos con la extension del documento subido y el nombre del local
//        dd($request->file('logotipo'));
        $local = new Local;
        $local->Nombre = $request->Nombre;
        $local->Descripcion = $request->Descripcion;
        $local->Contacto = $request->Contacto;
        $local->Correo = $request->Correo;
        $local->Telefono = $request->Telefono;
        $local->Celular = $request->Celular;
        $local->Logotipo = $request->Logotipo;
        $local->CodCategoriaL = $request->CategoriaLocal;
        $local->save();
        return redirect('Local');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodLocal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($CodLocal)
    {
        $local = Local::where('CodLocal', $CodLocal)->get()->first();
        $categoria_locales = CategoriaLocal::all();
        
        $categoria_local = DB::table('categoria_local')
                                ->where('CodCategoriaL', '=', $local->CodCategoriaL)
                                ->get();
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('local.editar_local', compact('local', 'categoria_locales', 'categoria_local', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CodLocal)
    {
        //FALTA
        //guardar logotipo en el local
        //guardar imagen en la base de datos con la extension del documento subido y el nombre del local
        //dd($request->file('logotipo'));
        $local = Local::where('CodLocal', $CodLocal)->update(
                [
                    'Nombre' => $request->Nombre,
                    'Descripcion' => $request->Descripcion,
                    'Contacto' => $request->Contacto,
                    'Correo' => $request->Correo,
                    'Telefono' => $request->Telefono,
                    'Celular' => $request->Celular,
                    'Logotipo' => $request->Logotipo,
                    'CodCategoriaL' => $request->CategoriaLocal                    
                ]);

        return redirect('Local');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodLocal)
    {
        //falta borrar sus dependencias
        Local::where('CodLocal', $CodLocal)->delete();
        return redirect('Local');
    }
}
