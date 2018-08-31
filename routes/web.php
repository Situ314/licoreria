<?php
/*use Cornford\Googlmapper\Facades\MapperFacade;
use Illuminate\Support\Facades\Route;*/
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
//autentificacion para panel de administracion
Route::get('/', function () {
    return view('pagina_web.index');
});
Route::get('Admin', function () {
    return view('roles_login.Admin');
});
Route::get('SuperAdmin', function () {
    return view('roles_login.SuperAdmin');
});
Route::get('PaginaDespachador','PedidoController@lista_pedidos');

Route::get('master', function(){
    return view('master');    
});

//Rutas resoource
Route::resource('CategoriaLocal','CategoriaLocalController');
Route::resource('Local','LocalController');
Route::resource('CategoriaProducto','CategoriaProductoController');
Route::resource('Producto','ProductoController');
Route::resource('Despachador','DespachadorController');
Route::resource('Repartidor','RepartidorController');
Route::resource('Cliente','ClienteController');
Route::resource('Pedido','PedidoController');
Route::resource('Temporal','TemporalController');
Route::resource('Compra','CompraController');
Route::resource('Promocion','PromocionController');
Route::resource('Despacho','DespachoController');
//busquedas
Route::get('categoria_locales', 'CategoriaLocalController@buscar');
Route::get('locales', 'LocalController@buscar');
Route::get('categoria_productos', 'CategoriaProductoController@buscar');
Route::get('productos', 'ProductoController@buscar');
Route::get('despachadores', 'DespachadorController@buscar');
Route::get('repartidores', 'RepartidorController@buscar');
Route::get('clientes', 'ClienteController@buscar');
Route::get('promociones', 'PromocionController@buscar');

//ruta de costo de acuerdo a producto
Route::get('datos_producto/{id}/', 'ProductoController@datos_producto');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('master_page', function () {
    return view('master_page');
});

//------------------------------------->Pagina web--------------------------------->>
//pagina principal
Route::get('index', function () {
    return view('pagina_web.index');
});
//menu
Route::get('promociones/{dato?}', 'PaginaMenuController@index');
//pagina del menu
Route::get('pagina_menu', 'PaginaMenuController@index');
//productos por categoria
Route::get('productos/{CodCategoriaP?}','PaginaMenuController@productos')->name('productos');
//viste de producto simple
Route::get('ver_producto/{CodProducto?}','PaginaMenuController@ver_producto')->name('ver_producto');
//viste de promocion
Route::get('ver_promocion/{CodPromocion?}','PaginaMenuController@ver_promocion')->name('ver_promocion');
//Realizar pedido lleva a pedido de direccion
Route::get('pedido', function () {
    $cliente = \Illuminate\Support\Facades\DB::table('cliente')
            ->where('CodCliente', '=', auth()->user()->id)
            ->select('*')
            ->first();    
    return view('pagina_web.datos_pedido', compact('cliente'));
});
//carrito de compras
Route::get('carrito','TemporalController@show')->name('carrito');
//registro de nuevos clientes
Route::get('registro', function () {
    return view('pagina_web.registro');
});
//login web
Route::get('login_web', function () {
    return view('pagina_web.login_web');
});
//actualizar carrito
Route::get('actualizar_carrito','TemporalController@update')->name('actualizar_carrito');