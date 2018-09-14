<?php

Route::get('/', function () {
    return view('welcome');  
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//rutas excel
Route::get('descargar-articulos', 'ArticlesController@excela')->name('articles.excela');
Route::get('descargar-trabajadores', 'WorkersController@excelw')->name('workers.excelw');
Route::get('descargar-quimicos', 'ArticlesController@excelq')->name('articles.excel');
Route::get('descargar-quimicoss', 'ArticlesController@excelqs')->name('articless.excel');
Route::get('descargar-bandejas', 'ArticlesController@excelto')->name('operations.excel');
Route::get('descargar-bandejass', 'ArticlesController@exceltr')->name('operationss.excel');
//rutas excel

Route::middleware('auth')->group(function() {
    //rutas pdf
Route::get('admin/workers/pdf', 'WorkersController@gpdf')->middleware('permission:workers.gpdf');
Route::get('admin/inventories/pdf', 'ArticlesController@gpdfa')->middleware('permission:inventories.gpdfa');
Route::get('admin/chemicals/pdf', 'ArticlesController@gpdfq')->middleware('permission:chemicals.gpdfq');
Route::get('admin/chemicals/pdfs', 'ArticlesController@gpdfqs')->middleware('permission:chemicals.gpdfqs');
Route::get('admin/trays/pdfto', 'ArticlesController@gpdfto');
Route::get('admin/trays/pdftr', 'ArticlesController@gpdftr');
    //rutas pdf

Route::get('/mantenedor_inventario', 'InventarioController@index');
Route::get('/control_quimicos', 'ProductosQuimicosController@index');
Route::get('/indexBandejasEnviadas', 'BandejasEnviadasController@index');
Route::get('/indexBandejasRecibidas', 'BandejasRecibidasController@index');
Route::get('/panel_control', 'PanelControlController@panel_control');
Route::get('/mantenedor_usuarios', 'PanelControlController@usuarios');

    //rutas de trabajadores
Route::get('/admin/workers', 'WorkersController@index')->middleware('permission:workers.index');
Route::get('/admin/workers/create','WorkersController@create')->middleware('permission:workers.create');
Route::get('/admin/workers/{id}/edit','WorkersController@edit')->middleware('permission:workers.edit');
Route::post('/admin/workers/{id}/delete','WorkersController@destroy')->middleware('permission:workers.destroy'); 
Route::get('/admin/workers/{id}/view','WorkersController@view')->middleware('permission:workers.view');
Route::post('/admin/workers','WorkersController@store')->middleware('permission:workers.store');
Route::post('/admin/workers/{id}/edit','WorkersController@update')->middleware('permission:workers.update');
Route::get('/search','WorkersController@show')->middleware('permission:workers.show');
    //rutas de trabajadores

        //rutas de ordenes de trabajo
Route::get('/admin/work_orders', 'WorkOrderController@index')->middleware('permission:workers.index');
Route::get('/admin/work_orders/create','WorkOrderController@create')->middleware('permission:workers.create');
Route::get('/admin/work_orders/{id}/edit','WorkOrderController@edit')->middleware('permission:workers.edit');
Route::post('/admin/work_orders/{id}/delete','WorkOrderController@destroy')->middleware('permission:workers.destroy'); 
Route::get('/admin/work_orders/{id}/view','WorkOrderController@view')->middleware('permission:workers.view');
Route::post('/admin/work_orders','WorkOrderController@store')->middleware('permission:workers.store');
Route::post('/admin/work_orders/{id}/edit','WorkOrderController@update')->middleware('permission:workers.update');
Route::get('/search','Work_ordersController@show')->middleware('permission:workers.show');
    //rutas de ordenes de trabajo

    //rutas de clientes
Route::get('/admin/work_orders', 'WorkOrderController@index')->middleware('permission:workers.index');
Route::get('/admin/work_orders/create','WorkOrderController@create')->middleware('permission:workers.create');
Route::get('/admin/work_orders/{id}/edit','WorkOrderController@edit')->middleware('permission:workers.edit');
Route::post('/admin/work_orders/{id}/delete','WorkOrderController@destroy')->middleware('permission:workers.destroy'); 
Route::get('/admin/work_orders/{id}/view','WorkOrderController@view')->middleware('permission:workers.view');
Route::post('/admin/work_orders','WorkOrderController@store')->middleware('permission:workers.store');
Route::post('/admin/work_orders/{id}/edit','WorkOrderController@update')->middleware('permission:workers.update');
Route::get('/search','Work_ordersController@show')->middleware('permission:workers.show');
    //rutas de clientes

    //rutas usuarios
Route::get('/admin/users', 'UsersController@index')->middleware('permission:users.index');   
Route::get('/admin/users/create','UsersController@create')->middleware('permission:users.create');    
Route::get('/admin/users/{id}/edit','UsersController@edit')->middleware('permission:users.edit'); 
Route::post('/admin/users/{id}/edit','UsersController@update')->middleware('permission:users.update'); 
Route::post('/admin/users/{id}/delete','UsersController@destroy')->middleware('permission:users.destroy'); 
    //rutas usuarios

    //rutas Configuración General de Sistema
Route::get('/admin/configuration', 'ConfigurationController@index')->middleware('permission:configuration.index');
    //rutas Configuración General de Sistema
});
