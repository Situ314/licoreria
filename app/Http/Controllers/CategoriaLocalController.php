<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\CategoriaLocal;
use DB;
use Input;

class CategoriaLocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria_locales = CategoriaLocal::orderBy('Nombre')->paginate(15);
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('categoria_local.lista_categoria_local', ['categoria_locales' => $categoria_locales, 'permisos' => $permisos]);
    }
    
    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $search = \Request::get('search');
        
        $categoria_locales = CategoriaLocal::where('Nombre', 'like', '%'.$search.'%')
                            ->orderBy('CodCategoriaL')
                            ->paginate(15);
        return view('categoria_local.lista_categoria_local', ['categoria_locales' => $categoria_locales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categoria_local = new CategoriaLocal;
//        $categoria_local->save($request->all());
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria_local = new CategoriaLocal;
        $categoria_local->Nombre = $request->nombre;
        $categoria_local->save();
        return redirect('CategoriaLocal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CodCategoriaL)
    {        
        $categoria_local = CategoriaLocal::where('CodCategoriaL', $CodCategoriaL)->update(['Nombre' => $request->input('nuevo')]);

        return redirect('CategoriaLocal');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodCategoriaL)
    {
        //falta borrar sus dependencias, local y las de local
        CategoriaLocal::where('CodCategoriaL', $CodCategoriaL)->delete();
        return redirect('CategoriaLocal');
    }
}
