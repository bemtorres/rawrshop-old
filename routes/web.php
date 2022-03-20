<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('usuario')->group( function () {
  Route::get('dashboard','Admin\DashboardController@index')->name('dashboard.index');

  Route::get('tienda', 'Admin\TiendaController@index')->name('tienda.index');
  Route::get('tienda/integracion', 'Admin\TiendaController@integracion')->name('tienda.integracion');
  Route::put('tienda', 'Admin\TiendaController@update')->name('tienda.update');
  Route::get('tienda/rrss', 'Admin\TiendaController@rrss')->name('tienda.rrss');
  Route::put('tienda/rrss', 'Admin\TiendaController@rrssUpdate')->name('tienda.rrss');
  Route::put('tienda/rrss_enabled', 'Admin\TiendaController@rrssUpdateEnabled')->name('tienda.rrss.enabled');

  Route::get('tienda/chat', 'Admin\TiendaController@chat')->name('tienda.chat');
  Route::put('tienda/chat', 'Admin\TiendaController@chatUpdate')->name('tienda.chat.update');

  Route::get('tienda/web', 'Admin\TiendaController@web')->name('tienda.web');
  Route::put('tienda/web', 'Admin\TiendaController@webUpdate')->name('tienda.web.update');
  Route::put('tienda/web_enabled', 'Admin\TiendaController@webUpdateEnabled')->name('tienda.web.update.enabled');
  Route::get('tienda/footer', 'Admin\TiendaController@footer')->name('tienda.footer');
  Route::put('tienda/footer', 'Admin\TiendaController@footerUpdate')->name('tienda.footer.update');

  Route::get('tienda/theme', 'Admin\TiendaController@theme')->name('tienda.theme');
  Route::put('tienda/theme', 'Admin\TiendaController@themeUpdate')->name('tienda.theme.update');

  Route::get('tienda/assets', 'Admin\TiendaController@assets')->name('tienda.assets');
  Route::put('tienda/assets', 'Admin\TiendaController@assetsUpdate')->name('tienda.assets');
  Route::put('tienda/title', 'Admin\TiendaController@titleUpdate')->name('tienda.title.update');
  Route::get('tienda/seo', 'Admin\TiendaController@seo')->name('tienda.seo');
  Route::put('tienda/seo', 'Admin\TiendaController@seoUpdate')->name('tienda.seo.update');
  Route::get('tienda/seo', 'Admin\TiendaController@seo')->name('tienda.seo');
  Route::get('tienda/pay', 'Admin\TiendaController@pay')->name('tienda.pay');
  Route::put('tienda/pay', 'Admin\TiendaController@payUpdate')->name('tienda.pay.update');
  Route::get('tienda/pro', 'Admin\TiendaController@pro')->name('tienda.pro');
  Route::put('tienda/pro', 'Admin\TiendaController@proUpdate')->name('tienda.pro.update');

  Route::get('tienda/codigo', 'Admin\TiendaController@codigo')->name('tienda.codigo');
  Route::put('tienda/codigo/js', 'Admin\TiendaController@codigoJs')->name('tienda.codigo.js');
  Route::put('tienda/codigo/css', 'Admin\TiendaController@codigoCss')->name('tienda.codigo.css');
  Route::get('tienda/mantenimiento', 'Admin\TiendaController@mantenimiento')->name('tienda.mantenimiento');
  Route::put('tienda/mantenimiento', 'Admin\TiendaController@mantenimientoUpdate')->name('tienda.mantenimiento.update');

  Route::get('tienda/pagina', 'Admin\PaginaController@index')->name('pagina.index');
  Route::get('tienda/pagina/create', 'Admin\PaginaController@create')->name('pagina.create');
  Route::post('tienda/pagina', 'Admin\PaginaController@store')->name('pagina.store');
  Route::get('tienda/pagina/{id}', 'Admin\PaginaController@show')->name('pagina.show');
  Route::get('tienda/pagina/{id}/edit', 'Admin\PaginaController@edit')->name('pagina.edit');
  Route::put('tienda/pagina/{id}', 'Admin\PaginaController@update')->name('pagina.update');

  Route::resource('productos', 'Admin\ProductoController');
  Route::get('producto/agotados', 'Admin\ProductoController@indexAgotados')->name('productos.agotados');
  Route::get('producto/favoritos', 'Admin\ProductoController@indexFavoritos')->name('productos.favoritos');
  Route::get('producto/eliminados', 'Admin\ProductoController@indexEliminados')->name('productos.eliminados');
  Route::get('producto/dashboard', 'Admin\ProductoController@indexDashboard')->name('productos.dashboard');

  Route::put('producto/favoritos', 'Admin\ProductoController@favoritoUpdate')->name('productos.favoritos.update');
  Route::put('producto/price', 'Admin\ProductoController@priceUpdate')->name('productos.price.update');

  Route::get('productos/{id}/variedades', 'Admin\ProductoController@variedades')->name('productos.variedades');
  Route::get('productos/{id}/variedad/create', 'Admin\VariedadController@create')->name('variedad.create');
  Route::post('productos/{id}/variedad/create', 'Admin\VariedadController@store')->name('variedad.store');
  Route::get('productos/{id}/seo', 'Admin\ProductoController@seo')->name('productos.seo');
  Route::put('productos/{id}/title', 'Admin\ProductoController@titleUpdate')->name('productos.title.update');
  Route::get('productos/{id}/assets', 'Admin\ProductoController@assets')->name('productos.assets');
  Route::put('productos/{id}/assets', 'Admin\ProductoController@assetsUpdate')->name('productos.assets.update');
  Route::delete('productos/{id}/assets', 'Admin\ProductoController@assetsDelete')->name('productos.assets.delete');

  Route::get('variedades/{id}/edit', 'Admin\VariedadController@edit')->name('variedad.edit');
  Route::put('variedades/{id}', 'Admin\VariedadController@update')->name('variedad.update');

  Route::resource('clientes', 'Admin\TiendaController');
  Route::resource('usuarios', 'Admin\TiendaController');
  // Route::resource('servicios', 'Admin\CategoriaController');

  Route::resource('categorias', 'Admin\CategoriaController');
  Route::resource('subcategorias', 'Admin\SubcategoriaController');

  // @API
  Route::put('productos/{id}/variedad/changePosition', 'Admin\VariedadController@changePosition')->name('variedad.changePosition');
  Route::put('pagina/changePosition', 'Admin\PaginaController@changePosition')->name('pagina.changePosition');
  Route::put('categoria/changePosition', 'Admin\CategoriaController@changePosition')->name('categoria.changePosition');
  Route::put('subcategoria/changePosition', 'Admin\SubcategoriaController@changePosition')->name('subcategoria.changePosition');

  Route::get('cache',function(){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return redirect()->route('dashboard.index')->with('succes', 'cache borrado');
  })->name('utils.sistema.cache');
});

// INSTALL
Route::get('install','Admin\InstallController@index')->name('install.index');
Route::post('install','Admin\InstallController@store')->name('install.store');

Route::get('acceso','Auth\AuthController@index')->name('acceso');
Route::post('acceso','Auth\AuthController@login')->name('acceso');


Route::get('/','HomeController@index')->name('home.index');
Route::post('/','HomeController@find')->name('home.find');
Route::get('blog/{code}','HomeController@blog')->name('home.blog');
Route::get('producto/{code}','HomeController@producto')->name('home.producto');
Route::get('categorias/{type}/{code}','HomeController@categoria')->name('home.categoria');

// Route::get('productos/{code}/{sub_code}','HomeController@categoria')->name('home.subcategoria');

Route::post('producto/newsletter','HomeController@newsletter')->name('home.newsletter');
Route::get('mantenimiento', 'HomeController@mantenimiento')->name('home.mantenimiento');


// @API
Route::post('api/product/find','Api\ProductoController@find')->name('api.v1.product.find');

Route::middleware('usuario')->group( function () {
  Route::get('edicion','HomeController@indexEdicion')->name('home.index.edicion');
  Route::get('edicion/blog/{code}','HomeController@blogEdicion')->name('home.blog.edicion');

});


// SITEMAP
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap.index');
Route::get('/sitemap.xml/categorias', 'SitemapController@categorias')->name('sitemap.categorias');
Route::get('/sitemap.xml/subcategorias', 'SitemapController@subcategorias')->name('sitemap.subcategorias');
Route::get('/sitemap.xml/productos', 'SitemapController@productos')->name('sitemap.productos');


Route::get('/debug-sentry', function () {
  throw new Exception('My first Sentry error!');
});