<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\Local;
use patio\CategoriaProducto;
use patio\Producto;
use patio\Promocion;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginaMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($dato=0, Request $request)
    {          
        $cat_productos = CategoriaProducto::all();
//        $promociones = Promocion::all();
        $fecha_actual = date_format(Carbon::now(), 'Y-m-d');
        
        $sql = 'SELECT *
                FROM promocion
                WHERE Disponible="S" and Activo="S" and Estado="0" ';
        if('Desde'!='')
            $sql .= "and Desde<='$fecha_actual' ";
        if('Hasta'!='')
            $sql .= "AND Hasta>='$fecha_actual' ";
        $sql .= "ORDER BY CodPromocion "; 
        $promociones = DB::select($sql);
        $promociones = $this->arrayPaginator($promociones, $request);
        $productos = Producto::all();
        
        return view('pagina_web.pagina_menu', ['cat_productos' => $cat_productos, 'promociones' => $promociones, 'productos' => $productos, 'dato' => $dato]);
    }
    
    public function arrayPaginator($array, $request)
    {
        $page = Input::get('page', 1);
        $perPage = 4;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }
    
    public function productos($CodCategoriaP, Request $request)
    {
        $cat_productos = CategoriaProducto::all();
        if($CodCategoriaP == 0){
            $productos = Producto::orderBy('Nombre')->where('Disponible', '=', 'S')->paginate(9);
        }else{
            $productos = Producto::where('CodCategoriaP', $CodCategoriaP)
                                    ->where('Disponible', '=', 'S')
                                    ->paginate(9);
        }
        
        $fecha_actual = date_format(Carbon::now(), 'Y-m-d');
        
        $sql = 'SELECT *
                FROM promocion
                WHERE Disponible="S" and Activo="S" and Estado="0" ';
        if('Desde'!='')
            $sql .= "and Desde<='$fecha_actual' ";
        if('Hasta'!='')
            $sql .= "AND Hasta>='$fecha_actual' ";
        $sql .= "ORDER BY CodPromocion "; 
        $promociones = DB::select($sql);
        $promociones = $this->arrayPaginator($promociones, $request);
        
        $dato = 'categorias';
        
        return view('pagina_web.productos', compact('productos', 'cat_productos', 'promociones', 'dato'));
    }
    
    public function ver_producto($CodProducto)
    {
//        $stock = stock($CodProducto);
//        foreach($stock as $s){
//            //if $s es cero o null manda valor cero 0
//            $max_cantidad = $s->Stock;
//        }
        $producto = Producto::where('CodProducto', $CodProducto)->first();
        return view('pagina_web.vista_producto', compact('producto'));
    }
    
    public function ver_promocion($CodPromocion)
    {
        $promocion = Promocion::where('CodPromocion', $CodPromocion)->get()->first();
        $producto = Producto::where('CodProducto', '=', $promocion->CodProducto)
                            ->orderBy('CodProducto')
                            ->get()->first();
        return view('pagina_web.vista_promocion', compact('promocion', 'producto'));
    }
}
