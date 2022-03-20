<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Categoria;
use App\Services\Sistema\Globales;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
  public function index() {
    $categorias = Categoria::orderBy('posicion')->get();
    $icons = Globales::ICONS;
    return view('admin.categoria.index',compact('categorias','icons'));
  }

  public function store(Request $request) {
    try {
      $n = Categoria::max('id') + 1;
      $c = new Categoria();
      $c->nombre = $request->input('nombre');
      $c->codigo = $request->input('code');
      $c->id_usuario = current_user()->id;
      $c->posicion = $n;
      $config = array();
      $config['icon'] = $request->input('icon');
      $c->config = $config;
      $c->save();
      return back()->with('success','Se ha creado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','error, intente nuevamente');
    }
  }

  public function show($id) {
    $c = Categoria::with(['subs'])->findOrFail($id);
    $icons = Globales::ICONS;
    return view('admin.categoria.show',compact('c','icons'));
  }

  public function edit($id) {
    $c = Categoria::findOrFail($id);
    $icons = Globales::ICONS;
    return view('admin.categoria.edit',compact('c','icons'));
  }

  public function update(Request $request,$id) {
    try {
      $c = Categoria::findOrFail($id);
      $c->nombre = $request->input('nombre');
      $c->codigo = $request->input('code');
      $c->activo = $request->input('activo') == 'si' ? true : false;
      $config = array();
      $config['icon'] = $request->input('icon');
      $c->config = $config;
      $c->update();
      return back()->with('success','Se ha creado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','error, intente nuevamente');
    }
  }

  // @API
  public function changePosition(Request $request){
    try {
      $objetos = Categoria::orderBy('posicion')->get();
      $posiciones = $request->input('list');

      foreach ($objetos as $obj) {
        for ($i=0; $i < count($posiciones); $i++) {
          if($obj->id == $posiciones[$i] && $obj->posicion != ($i + 1)){
            $obj->posicion = $i + 1;
            $obj->update();
          }
        }
      }
      return response()->json(['message' => 'Se ha actualizado.'], 200);
    } catch (\Throwable $th) {
      return response()->json(['message' => 'Error. Intente nuevamente'], 400);
    }
  }
}
