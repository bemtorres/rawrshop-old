<?php

use Illuminate\Support\Facades\Route;

// Route::middleware('auth.admininstrador')->prefix('admin')->namespace('Admin')->group( function () {
// });
// Route::middleware('usuario')->namespace('Admin')->name('admin.')->group( function () {
//   Route::get('home','AdminController@index')->name('home');

//   Route::get('tiendas','TiendaController@index')->name('tienda.index');
//   Route::get('tiendas/create','TiendaController@create')->name('tienda.create');
//   Route::post('tiendas','TiendaController@store')->name('tienda.store');
//   Route::get('tiendas/{codigo}','TiendaController@show')->name('tienda.show');
//   Route::get('tiendas/{codigo}/edit','TiendaController@edit')->name('tienda.edit');

//   Route::get('tienda/{codigo}/productos','ProductoController@index')->name('producto.index');
//   Route::get('tienda/{codigo}/productos/create','ProductoController@create')->name('producto.create');
//   Route::post('tienda/{codigo}/productos','ProductoController@store')->name('producto.store');

//   Route::get('tienda/{codigo}/productos/{id_producto}','ProductoController@show')->name('producto.show');
//   Route::get('tienda/{codigo}/productos/{id_producto}/edit','ProductoController@edit')->name('producto.edit');

//   Route::put('tienda/{codigo}/productos/{id_producto}/edit','ProductoController@update')->name('producto.update');//vista
//   // Route::get('tienda/{codigo}/productos/{id_producto}/edit','ProductoController@update')->name('admin.producto.update');//editar

//   Route::get('tienda/{codigo}/productos/{id_producto}/version','ProductoController@version')->name('producto.version');
//   Route::post('tienda/{codigo}/productos/{id_producto}/version','VariedadController@store')->name('producto.version.store');

//   //Route::get('tienda/{codigo}/productos/{id_producto}/version/create')->nmae('producto.version.create');

//   // Route::put('tienda/{codigo}/productos/{id_producto}/version/{id}','VariedadController@update')->name('admin.producto.version.update');
//   // Route::post('tienda/{codigo}/productos/{id_producto}/version/{id}','VariedadController@show')->name('admin.producto.version.show');

//   // Route::put('tienda/{codigo}/productos','ProductoController@delete')->name('admin.producto.delete');

//   // VERSION
//   //Route::post('tienda/{codigo}/productos/version','VariedadController@store')->name('producto.version.store');

//   Route::get('tienda/{codigo}/categorias','CategoriaController@index')->name('categoria.index');
//   Route::post('tienda/{codigo}/categorias','CategoriaController@store')->name('categoria.store');
//   Route::post('tienda/{codigo}/subcategorias','SubCategoriaController@store')->name('subcategoria.store');


//   Route::post('tienda/{codigo}/subcategorias','SubCategoriaController@store')->name('subcategoria.store');
// });
// Route::get('tienda/{codigo}/web_creator','Web\WebController@webCreator')->name('admin.web_creator');
