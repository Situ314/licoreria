<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\MaestroCompra;
use patio\DetalleCompra;
use patio\Producto;
use patio\Http\Controllers\Auth;
use DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = MaestroCompra::orderBy('CodCompra')->paginate(15);
        $detalles = DetalleCompra::all();
        return view('compra.lista_compra', ['compras' => $compras, 'detalles' => $detalles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('compra.crear_compra', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = new MaestroCompra;
        $compra->CodLocal = 1;
        $compra->Numero = $request->Numero;
        $compra->Fecha = FechaParaMySQL($request->Fecha);
        $compra->Total = $request->Total;
        $compra->save();
        
        $id = DB::getPdo()->lastInsertId();
        $Detalle = $request->Detalle;
        
        $Detalle = str_replace("(", "($id,", $Detalle);
	$sql = "INSERT INTO detalle_compra(CodCompra, CodProducto, Cantidad, Precio) VALUES $Detalle";
        $insert_compra = DB::insert($sql);
        
        return redirect('Compra'); 
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
    public function edit($CodCompra)
    {
        $compra = MaestroCompra::where('CodCompra', $CodCompra)->get()->first();
        $sql = "SELECT d.Precio as Costo,  d.Cantidad, p.Nombre, p.CodProducto
                FROM detalle_compra d, producto p
                WHERE d.CodProducto=p.CodProducto
                and CodCompra=$CodCompra";
        
        $Detalle = DB::select($sql);
        $productos = Producto::all();
        return view('compra.editar_compra', compact('compra', 'productos', 'Detalle'));
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
        dd($request->Detalle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodCompra)
    {
        MaestroCompra::where('CodCompra', $CodCompra)->delete();
        $detalles = DB::table('detalle_compra')
            ->where('CodCompra', '=', $CodCompra)
            ->select('*')
            ->get();
        foreach ($detalles as $detalle){
            DetalleCompra::where('CodDetalleCompra', $detalle->CodDetalleCompra)->delete();
        }
        
        return redirect('Compra');
    }
}
