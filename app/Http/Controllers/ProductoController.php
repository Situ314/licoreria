<?php

namespace patio\Http\Controllers;

use Illuminate\Http\Request;
use patio\Producto;
use patio\CategoriaProducto;
use DB;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('CodProducto')->paginate(15);
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('producto.lista_producto', ['productos' => $productos, 'permisos' => $permisos]);
    }
    
    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        $search = \Request::get('search');
        
        $productos = Producto::where('Nombre', 'like', '%'.$search.'%')
                            ->orderBy('CodProducto')
                            ->paginate(15);
        return view('producto.lista_producto', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria_productos = CategoriaProducto::all();
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('producto.crear_producto', compact('categoria_productos', 'permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        //obtener codigo de usuario que ingreso y el local al que pertenece, y ese codigo se guarda
        $producto->CodLocal = 1;
        $producto->CodCategoriaP = $request->CategoriaProducto;
        $producto->Nombre = $request->Nombre;
        $producto->Tamaño = $request->Tamaño;
        $producto->Descripcion = $request->Descripcion;
        $producto->Precio = $request->Precio;
        $producto->Costo = $request->Costo;
        $producto->save();
        
//        $foto = $request->file('Foto');
        $CodProducto = DB::getPdo()->lastInsertId();
//        $nombre = $this->fileUpload($foto, $CodProducto);
//        dd($nombre);
        
        
        $this->validate($request, [
            'Foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('Foto')) {
            $image = $request->file('Foto');
            $name = 'producto_'.$CodProducto.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/imagenes/1/productos/');
            $image->move($destinationPath, $name);
        }
            
        Producto::where('CodProducto', $CodProducto)->update(
        [
            'Foto' => $name                
        ]);
        
        return redirect('Producto'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($CodProducto)
    {
        $producto = Producto::where('CodProducto', $CodProducto)->get()->first();
        $categoria_productos = CategoriaProducto::all();
        $categoria_producto = DB::table('categoria_producto')
                ->where('CodCategoriaP', '=', $producto->CodCategoriaP)
                ->get()
                ->first();
        $permisos = DB::table('permisos')
            ->where('CodGrupo', '=', auth()->user()->CodGrupo)
            ->select('*')
            ->get();
        return view('producto.editar_producto', compact('producto', 'categoria_productos', 'categoria_producto', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CodProducto)
    {
        Producto::where('CodProducto', $CodProducto)->update(
                [
                    'Nombre' => $request->Nombre,
                    'Descripcion' => $request->Descripcion,
                    'Tamaño' => $request->Tamaño,
                    'Precio' => $request->Precio,
                    'Costo' => $request->Costo,
                    'Foto' => $request->Foto,
                    'Disponible' => $request->Disponible,
                    'Activo' => $request->Activo,
                    'CodCategoriaP' => $request->CategoriaProducto                    
                ]);
        return redirect('Producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodProducto)
    {
        Producto::where('CodProducto', $CodProducto)->update(
                [
                    'Activo' => 'N'                   
                ]);
        return redirect('Producto');
    }
    
    /**
     * Costo de producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datos_producto()
    {
        $id= Input::get('CodProducto');
        $costo = DB::table('producto')
                ->select('Costo')
                ->where('CodProducto', '=', $id)                  
                ->get()->first();
        return $costo->Costo;
    }
    
    public function fileUpload($foto, $CodProducto) {
        $this->validate($foto, [
            'Foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($foto->hasFile('Foto')) {
            $image = $foto->file('Foto');
            $name = 'Foto_'.$CodProducto.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $this->save();

            return $name;
        }
    }
}
