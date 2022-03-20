<?php

namespace App\Http\Controllers;

use App\Models\Sistema\Categoria;
use App\Models\Sistema\Producto;
use App\Models\Sistema\Subcategoria;
use Illuminate\Http\Request;

class SitemapController extends Controller
{

  public function index() {

    $categorias = Categoria::latest()->get();
    $subcategorias = Subcategoria::latest()->get();

    return response()->view('sitemap.index', [
      'categorias' => $categorias,
      'subcategorias' => $subcategorias,
    ])->header('Content-Type', 'text/xml');
  }

  public function categorias() {
    $categorias = Categoria::latest()->get();

    return response()->view('sitemap.categorias', [
      'categorias' => $categorias,
    ])->header('Content-Type', 'text/xml');
  }

  public function subcategorias() {
    $categorias = Subcategoria::latest()->get();

    return response()->view('sitemap.subcategorias', [
      'categorias' => $categorias,
    ])->header('Content-Type', 'text/xml');
  }

  public function productos() {
    $productos = Producto::latest()->get();

    return response()->view('sitemap.productos', [
      'productos' => $productos,
    ])->header('Content-Type', 'text/xml');
  }
}
