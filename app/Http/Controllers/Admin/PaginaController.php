<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pagina\Pagina;
use App\Models\Sistema\Tienda;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
  public function index() {
    $t = Tienda::first();
    $paginas = Pagina::orderBy('posicion')->get();
    return view('admin.page.index',compact('t','paginas'));
  }

  public function create() {
    $t = Tienda::first();

    return view('admin.page.create', compact('t'));
  }

  public function store(Request $request) {
    $n = Pagina::max('id') + 1;

    $p =  new Pagina();
    $p->titulo = $request->input('titulo');
    $p->code = $request->input('code');
    $p->id_usuario = current_user()->id;
    $contenido = array();
    $contenido['content'] = $request->input('contenido');
    $p->contenido = $contenido;
    $p->posicion = $n;
    $p->save();

    return redirect()->route('pagina.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $p = Pagina::findOrFail($id);
    return view('admin.page.show', compact('p'));
  }

  public function edit($id) {
    $p = Pagina::findOrFail($id);
    return view('admin.page.edit', compact('p'));
  }

  public function update(Request $request, $id) {
    try {
      $p = Pagina::findOrFail($id);
      $p->titulo = $request->input('titulo');
      $p->code = $request->input('code');
      $contenido = array();
      $contenido['content'] = $request->input('contenido');
      $p->contenido = $contenido;
      $p->estado = $request->input('activo') == 'si' ? 2 : 1;
      $p->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','error, intente nuevamente');
    }
  }

  // @API
  public function changePosition(Request $request){
    try {
      $paginas = Pagina::orderBy('posicion')->get();
      $posiciones = $request->input('list');

      foreach ($paginas as $p) {
        for ($i=0; $i < count($posiciones); $i++) {
          if($p->id == $posiciones[$i] && $p->posicion != ($i + 1)){
            $p->posicion = $i + 1;
            $p->update();
          }
        }
      }
      return response()->json(['message' => 'Se ha actualizado.'], 200);
    } catch (\Throwable $th) {
      return response()->json(['message' => 'Error. Intente nuevamente'], 400);
    }
  }
}
