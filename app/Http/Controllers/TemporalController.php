<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use patio\Producto;
use patio\Promocion;
use patio\Temporal;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class TemporalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
    }

    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        //producto regular
        if($request->producto == 'regular'){
            $pedido = DB::insert('insert into detalle_pedido_temp (id, CodProducto, Precio, Cantidad) values (?, ?, ?, ?)', [Auth::user()->id,$request->CodProducto, $request->precio, $request->cantidad]);
        }else{
            //producto en promocion
            $pedido = DB::insert('insert into detalle_pedido_temp (id, CodProducto, Precio, Cantidad, CodPromocion) values (?, ?,?, ?, ?)', [Auth::user()->id,$request->CodProducto,$request->precio, $request->cantidad, $request->CodPromocion]);
        }
        
//        return redirect()->back();
        return redirect('productos/0');
    }

    /**
     * mostrar compras en el carrito
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pedidos = DB::table('detalle_pedido_temp')
                        ->select('*')
                        ->where('id', '=', auth()->user()->id)
                        ->get();
        $productos = Producto::all();
        $promociones = Promocion::all();
        return view('pagina_web.carrito', compact('pedidos', 'productos', 'promociones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($CodCliente)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CodTemporal)
    {
        $Detalle = $request->Detalle;
        $pedidos_temp = DB::table('detalle_pedido_temp')
                        ->select('*')
                        ->where('id', '=', auth()->user()->id)
                        ->get();
        foreach($pedidos_temp as $pedido){
//            Temporal::where('CodTemporal', $pedido->CodTemporal)->delete();
        }
        $sql = "INSERT INTO detalle_pedido_temp(CodProducto, id, Precio, Cantidad, CodPromocion) VALUES $Detalle";
        dd($sql);
        $insert_compra = DB::insert($sql);
        
        $pedidos = DB::table('detalle_pedido_temp')
                        ->select('*')
                        ->where('id', '=', auth()->user()->id)
                        ->get();
        $productos = Producto::all();
        $promociones = Promocion::all();        
        return view('pagina_web.carrito', compact('pedidos', 'productos', 'promociones'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodTemporal)
    {
        Temporal::where('CodTemporal', $CodTemporal)->delete();
        return redirect('carrito');
    }
}
