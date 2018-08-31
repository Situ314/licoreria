<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\Despacho;
use patio\User;
use patio\Estado;
use patio\MaestroPedido;
use patio\Cliente;

class DespachoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despachos = Despacho::orderBy('CodDespacho', 'desc')->paginate(15);
        $usuarios = User::all();
        $estados = Estado::all();
        return view('despacho.lista_despachos', compact('despachos', 'usuarios', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodDespacho)
    {
        $despacho = Despacho::where('CodDespacho', $CodDespacho)->get()->first();
        $pedido = MaestroPedido::where('CodPedido', $despacho->CodPedido)->get()->first();
        $usuarios = User::all();
        $estados = Estado::all();
        return view('despacho.mostrar_despacho', compact('despacho', 'usuarios', 'estados', 'pedido'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
