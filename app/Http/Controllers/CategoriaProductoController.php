<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\CategoriaProducto;
use DB;

class CategoriaProductoController extends Controller
{
    //cada local crea sus categorias de productos
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria_productos = CategoriaProducto::orderBy('CodCategoriaP')->paginate(15);
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('categoria_producto.lista_categoria_producto', ['categoria_productos' => $categoria_productos, 'permisos' => $permisos]);
    }
    
    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $search = \Request::get('search');
        
        $categoria_productos = CategoriaProducto::where('Nombre', 'like', '%'.$search.'%')
                            ->orderBy('CodCategoriaP')
                            ->paginate(15);
        return view('categoria_producto.lista_categoria_producto', ['categoria_productos' => $categoria_productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('categoria_producto.crear_categoria_producto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria_producto = new CategoriaProducto;
        $categoria_producto->Nombre = $request->Nombre;
        //obtener codigo de usuario que ingreso y el local al que pertenece, y ese codigo se guarda
        //falta modulo de autentificacion
        $categoria_producto->CodLocal = 1;
        $categoria_producto->save();
        return redirect('CategoriaProducto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodCategoriaP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($CodCategoriaP)
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
    public function update(Request $request, $CodCategoriaP)
    {
        CategoriaProducto::where('CodCategoriaP', $CodCategoriaP)
                        ->update(['Nombre' => $request->input('nuevo')]);

        return redirect('CategoriaProducto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodCategoriaP)
    {
        //Falta borrar sus dependencias
        CategoriaProducto::where('CodCategoriaP', $CodCategoriaP)->delete();
        return redirect('CategoriaProducto');
    }
}
