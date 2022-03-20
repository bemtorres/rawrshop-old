<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Categoria;
use App\Models\Sistema\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
  public function store(Request $request) {
    $c = Categoria::findOrFail($request->input('categoria_id'));
    $code = $request->input('code');

    $sub = Subcategoria::where('id_categoria',$c->id)->where('codigo',$code)->first();

    if (!$sub) {
      $n = Subcategoria::max('id') + 1;

      $sc = new Subcategoria();
      $sc->nombre = $request->input('nombre');
      $sc->codigo = $code;
      $sc->id_usuario = current_user()->id;
      $sc->id_categoria = $c->id;
      $sc->posicion = $n;
      $config = array();
      $config['icon'] = $request->input('icon');
      $sc->config = $config;
      $sc->save();
      return back()->with('success','Se ha creado correctamente');
    }
    return back()->with('warning','Código ya existe.');
  }

  public function edit($id) {
    $s = Subcategoria::findOrFail($id);
    return view('admin.subcategoria.edit',compact('s'));
  }

  public function update(Request $request, $id) {
    $sc = Subcategoria::findOrFail($id);
    $code = $request->input('code');
    if ($sc->codigo != $code) {
      $sub = Subcategoria::where('id_categoria',$sc->id_categoria)->where('codigo',$code)->first();
      if ($sub) {
        return back()->with('warning','Código ya existe.');
      }
    }
    $sc->nombre = $request->input('nombre');
    $sc->codigo = $code;
    $sc->activo = $request->input('activo') == 'si' ? true : false;
    $config = $sc->config;
    $config['icon'] = $request->input('icon');
    $sc->config = $config;
    $sc->update();
    return back()->with('success','Se ha creado correctamente');
  }

  // public function edit($id) {
  //   $s = Subcategoria::findOrFail($id);
  //   return view('admin.subcategoria.edit',compact('s'));
  // }

  // @API
  public function changePosition(Request $request){
    try {
      $categoria = Categoria::findOrFail($request->input('id_categoria'));
      $objetos = Subcategoria::where('id_categoria',$categoria->id)->orderBy('posicion')->get();
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