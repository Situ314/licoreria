<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\Promocion;
use patio\Producto;
use DB;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promociones = Promocion::orderBy('Nombre')->paginate(15);
        return view('promocion.lista_promocion', ['promociones' => $promociones]);
    }
    
    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $search = \Request::get('search');
        
        $promociones = Promocion::where('Nombre', 'like', '%'.$search.'%')
                            ->orderBy('CodPromocion')
                            ->paginate(15);
        return view('promocion.lista_promocion', ['promociones' => $promociones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('promocion.crear_promocion', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promocion = new Promocion;
        $promocion->CodProducto = $request->CodProducto;
        $promocion->Nombre = $request->Nombre;
        $promocion->Descripcion = $request->Descripcion;
        $promocion->Descuento = $request->Descuento;
        $promocion->Desde = FechaParaMySQL($request->Desde);
        $promocion->Hasta = FechaParaMySQL($request->Hasta);
        //estado para ver si promocion es para valida solo para celular o para ambos---1 solo en celular--0 en ambos
        $promocion->Estado = $request->Estado;
        $promocion->save();
        
        $CodPromocion = DB::getPdo()->lastInsertId();
        
        $this->validate($request, [
            'Foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('Foto')) {
            $image = $request->file('Foto');
            $name = 'promocion_'.$CodPromocion.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/imagenes/1/promociones/');
            $image->move($destinationPath, $name);
        }
            
        Promocion::where('CodPromocion', $CodPromocion)->update(
        [
            'Foto' => $name                
        ]);
        
        return redirect('Promocion'); 
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
    public function edit($CodPromocion)
    {
        $promocion = Promocion::where('CodPromocion', $CodPromocion)->get()->first();
        $productos = Producto::all();
        return view('promocion.editar_promocion', compact('promocion', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CodPromocion)
    {
        Promocion::where('CodPromocion', $CodPromocion)->update(
                [
                    'CodProducto' => $request->CodProducto,   
                    'Nombre' => $request->Nombre,
                    'Descripcion' => $request->Descripcion,
                    'Descuento' => $request->Descuento,
                    'Desde' => $request->Desde,
                    'Hasta' => $request->Hasta,
                    'Disponible' => $request->Disponible,
                    'Estado' => $request->Estado
                ]);
        return redirect('Promocion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodPromocion)
    {
        Promocion::where('CodPromocion', $CodPromocion)->update(
                [
                    'Activo' => 'N'                   
                ]);
        return redirect('Promocion');
    }

}
