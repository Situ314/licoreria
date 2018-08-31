<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use patio\MaestroPedido;
use patio\DetallePedido;
use patio\CategoriaProducto;
use patio\Promocion;
use patio\User;
use patio\Producto;
use patio\Repartidor;
use patio\Despacho;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Alert;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $num = DB::table('maestro_pedido')
                ->select(DB::raw('count(*) as num'))
                ->first();
        $numero = $num->num;
        
        //guarda datos de direccion y fatura de pedido
        $maestro_pedido = new MaestroPedido;
        $maestro_pedido->Numero = $numero++;
        $maestro_pedido->FechaHora = Carbon::now();
        $maestro_pedido->Direccion = $request->Direccion;
        $maestro_pedido->Zona = $request->Zona;
        $maestro_pedido->NumeroPuerta = $request->Numero;
        $maestro_pedido->Referencia = $request->Referencia;
//        $maestro_pedido->Latitud = $request->Latitud;
//        $maestro_pedido->Longitud = $request->Longitud;
        $maestro_pedido->NIT = $request->NIT;
        $maestro_pedido->NombreFactura = $request->NombreFactura;
        $maestro_pedido->CodCliente = Auth::user()->id;
        //estado default 1 que es pedido activo osea que no ah sido despachado
        $maestro_pedido->save();
        $id = DB::getPdo()->lastInsertId();
        //pasamos datos de la tabla temporal a la de detalle_pedido
        $detalle_pedido = DB::insert('INSERT INTO detalle_pedido (CodPedido, CodProducto, Precio, Cantidad, CodPromocion)
                                    SELECT '.$id.', CodProducto, Precio, Cantidad, CodPromocion FROM detalle_pedido_temp
                                    WHERE id = :id', ['id' => Auth::user()->id]);
        //borramos de la tabla pedidos temporales
        $deleted = DB::delete('delete from detalle_pedido_temp where id = :id', ['id' => Auth::user()->id]);
        
//        $cat_productos = CategoriaProducto::all();
//        $fecha_actual = date_format(Carbon::now(), 'Y-m-d');
//        
//        $sql = 'SELECT *
//                FROM promocion
//                WHERE Disponible="S" and Activo="S" ';
//        if('Desde'!='')
//            $sql .= "and Desde<='$fecha_actual' ";
//        if('Hasta'!='')
//            $sql .= "AND Hasta>='$fecha_actual' ";
//        $sql .= "ORDER BY CodPromocion "; 
//        $promociones = DB::select($sql);
//        alert()->success('Realizaste tu pedido de manera satisfactoria', 'Pedido realizado!');
        Alert::success('Pedido realizado', 'Realizo su pedido de forma satisfactoria');
        return redirect('pagina_menu');
//        return view('pagina_web.pagina_menu', compact('cat_productos', 'promociones'));
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
     * Editar pedido para asignar repartidor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($CodPedido)
    {
        $pedido = MaestroPedido::where('CodPedido', $CodPedido)->get()->first();
        $detalles = DetallePedido::where('CodPedido', $CodPedido)->get();
        $productos = Producto::all();
        $repartidores = User::where('CodGrupo', 2)->get();
        $usuarios = User::all();
        return view('pagina_web.repartidor.editar_pedido', compact('pedido', 'detalles', 'productos', 'repartidores', 'usuarios'));
    }

    /**
     * Guardar datos en despacho
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CodPedido)
    {
        MaestroPedido::where('CodPedido', $CodPedido)->update(
                [
                    //cambiar estado a 0, que pedido ya no esta disponible
                    'Estado' => '0'                 
                ]);
        
        $despacho = new Despacho;
        $despacho->CodPedido = $CodPedido;
        $despacho->CodRepartidor = $request->Repartidor;
        $despacho->CodDespachador = Auth::user()->id;
        $despacho->CodEstado = 2;
        $despacho->save();
        
        return redirect('PaginaDespachador');
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
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function lista_pedidos()
    {
        //pedidos que no han sido asignados
        $pedidos = MaestroPedido::where('Estado', 1)->get();
        $clientes = User::all();
        return view('pagina_web.repartidor.lista_pedidos', compact('pedidos', 'clientes'));        
    }
}
