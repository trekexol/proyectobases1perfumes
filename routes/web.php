<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/exampleCRUD/index', 'ExampleController@index');
// Route::resource('/exampleCRUD', 'ExampleController');


// Route::resource('/familia', 'FamiliaController');

// Productores

        ///----- Productores
        Route::resource('/productores', 'ProductorController');

        ///----- Formulas

        Route::get('/productores/{id}/formulas', 'CriterioInicialController@index');
        Route::resource('/productores/{id}/formulas', 'CriterioInicialController');
        Route::resource('/productores/{id}/formulasA', 'CriterioAnualController');
       // Route::get('/productores/{id}/formulas/create', 'CriterioInicialController@create');

        //------- Catalogo
        Route::resource('/productores/catalogo', 'CatalogoProductorController');

        //-------- Fragancias
        Route::resource('/fragancia', 'FraganciaController');

        //--------- Evaluaciones

        Route::get('/productores/{id}/evaluacion/index', 'EvaluacionController@index');
        Route::resource('/productores/{id}/evaluacion', 'EvaluacionController');
        Route::get('productores/{id}/evaluacion-inicial', 'EvaluacionController@evaluacionInicial');
        Route::get('productores/{id}/evaluacion-anual', 'EvaluacionController@evaluacionAnual');
        

         //-------- Contrato
        Route::get('productores/{productor}/contrato/index', 'ContratoController@index');
        Route::post('productores/{productor}/contrato/{proveedor}', 'ContratoController@store');
        Route::get('/contrato/show/{productor}/{contrato}/{proveedor}', 'ContratoController@show'); 
        Route::delete('/contrato/{id}', 'ContratoController@destroy');

          //-------- Condiciones de Contrato
          Route::resource('productores/{productor}/contrato/{proveedor}/condicion/{contrato}/', 'CondicionController'); 

          //-------- Ingredientes de Contratos
          Route::get('productores/{productor}/contrato/{proveedor}/ingrediente/{contrato}/create', 'C_IngredienteController@create'); 
          Route::resource('productores/{productor}/contrato/{proveedor}/ingrediente/{contrato}/', 'C_IngredienteController');


           // --------  Compras
        Route::get('/productores/{productor}/pedidos', 'PedidoController@index'); 
        Route::post('productores/{productor}/{contrato}/{proveedor}/', 'PedidoController@store');

        // --- Detalle Compra
        Route::get('/productores/{productor}/clientes', 'DetallePedidoController@index');
        Route::get('/productores/{productor}/comprar/{pedido}', 'DetallePedidoController@create');  
        Route::post('/productores/{productor}/comprar/{pedido}/realizar-pago', 'DetallePedidoController@store');  
        

// Proveedores

///---- Proveedores
        Route::get('/proveedores/index', 'ProveedorController@index'); 
        Route::resource('/proveedores', 'ProveedorController'); 
        Route::get('proveedores/reporte/{id}', 'ProveedorController@reporte');

            ///----- Proveedores
           // Route::resource('/productores', 'ProductorController');

            ///----- Condiciones


            //------- Catalogo
          //  Route::resource('/productores/catalogo', 'CatalogoProductorController');

            // --------Pedidos

            //-------- Materias Primas
           Route::resource('/fragancia', 'FraganciaController');
           Route::resource('/materia-esencia', 'MateriaEsenciaController');
 
          //-------- Forma Envio
          Route::get('/forma-envio/{proveedor}/index', 'Forma_EnvioController@index');
          Route::resource('/forma-envio/{proveedor}/', 'Forma_EnvioController'); 

          //-------- Forma Pago
          Route::get('/forma-pago/{proveedor}/index', 'Forma_PagoController@index');
          Route::resource('/forma-pago/{proveedor}/', 'Forma_PagoController'); 


//Ingredientes

          //-------- Otros Ingredientes
          Route::get('/otros-ingredientes/index', 'O_IngredientesController@index');
          Route::resource('/otros-ingredientes', 'O_IngredientesController'); 
          Route::get('otros-ingredientes/create', 'O_IngredientesController@create');

          //-------- Presentación Ingredientes
          Route::get('/presentacion-ingredientes/index', 'P_IngredientesController@index');
          Route::resource('/presentacion-ingredientes', 'P_IngredientesController'); 
          Route::get('presentacion-ingredientes/create', 'P_IngredientesController@create');



//Prohibido
Route::get('/prohibido/index', 'ProhibidoController@index');
Route::resource('/prohibido', 'ProhibidoController'); 
Route::get('prohibido/create', 'ProhibidoController@create');


//Productos
Route::resource('/productores/ingrediente', 'IngredienteController');


//Algunos Inserts
Route::resource('inserts/pais', 'PaisController');
Route::resource('inserts/asociaciones', 'AsociacionController');



//------------------------------CARLOS------------------------------------

//MEMBRESIA
Route::resource('/membresia', 'Miembro_IfraController');
Route::get('/membresia-menu/{id_productor}', 'Miembro_IfraController@menu_membresia');
Route::post('/membresia-menu/{id_productor}', 'Miembro_IfraController@activar_membresia');



//FAMILIA OLFATIVA
Route::resource('/familia-olfativa', 'Familia_OlfativaController'); 

Route::resource('/palabra-clave', 'Palabra_ClaveController'); 

Route::resource('/materia-esencia', 'Materia_EsenciaController'); 


Route::resource('/perfume', 'PerfumesController'); 

Route::resource('/esencia', 'Esencia_PerfumeController'); 

Route::resource('/perfumista', 'PerfumistaController'); 

Route::resource('/ingredientes', 'Otros_IngredientesController'); 


Route::get('/perfume-presentacion', 'Perfume_PresentacionController@index');

Route::get('/perfume-presentacion/{id_perfume}/{id_intensidad}/menu', 'Perfume_PresentacionController@menu'); 

Route::get('/perfume-presentacion/{id_perfume}/{id_intensidad}/create', 'Perfume_PresentacionController@create'); 
Route::get('/perfume-presentacion/{id_perfume}/{id_intensidad}', 'Perfume_PresentacionController@edit'); 
Route::get('/perfume-presentacion/{id_perfume}/{id_intensidad}', 'Perfume_PresentacionController@destroy'); 
Route::delete('/perfume-presentacion/{id_perfume}/{id_intensidad}', 'Perfume_PresentacionController@destroy'); 
Route::post('/perfume-presentacion/{id_perfume}/{id_intensidad}/create', 'Perfume_PresentacionController@create'); 

Route::post('/perfume-presentacion/{id_perfume}/{id_intensidad}', 'Perfume_PresentacionController@store'); 
