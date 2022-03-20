<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Sistema\Categoria;
use App\Models\Sistema\Producto;
use App\Models\Sistema\Tienda;
use App\Models\Sistema\Variedad;
use App\Services\ImportImage;

use Illuminate\Http\Request;

class VariedadController extends Controller
{
  // vista create vareidad
  public function create($id_producto){
    $p = Producto::findOrFail($id_producto);
    return view('admin.producto.variedad.create',compact('p'));
  }


  public function store(Request $request, $id_producto) {
    try {
      $p = Producto::findOrFail($id_producto);
      $posicion = Variedad::where('id_producto',$p->id)->count() + 1;
      $v = new Variedad();
      $v->id_producto = $p->id;
      $v->codigo = $p->codigo .'-' . trim($request->input('codigo_variante'));
      $v->nombre = $request->input('nombre_variante');
      $v->descripcion = $request->input('descripcion_variante');
      $v->stock = $request->input('stock',null);
      $v->stock_critico = $request->input('stock_critico',null);
      $v->precio = $request->input('precio',0);
      $v->precio_descuento = $request->input('precio_descuento',null);
      $v->posicion = $posicion;
      $v->id_usuario = current_user()->id;
      $v->activo = $request->input('activo') == 'si' ? true : false;

      if(!empty($request->file('image2'))){
        $filename = $v->codigo . time();
        $folder = 'products/' . $p->id;
        $name = ImportImage::save_v2($request,'image2', $filename, $folder, false, false, 100, true);

        $folder .= '/thumbnails';
        $img_thumbnails = ImportImage::save_asset($request,'image2', $filename, $folder, false, false, 50, 1);

        if ($name != 400 && $img_thumbnails != 400) {
          $assets = array();
          $assets['imagen'][0] = $name;
          $assets['thumbnails'][0] = $img_thumbnails;
          $v->assets = $assets;
        } else{
          return back()->with('error','error intente nuevamente');
        }

        // if ($name == 400) {
        //   return back()->with('error','error intente nuevamente');
        // }
        // $assets['imagen'][0] = $name;
        // $v->assets = $assets;
      }
      $v->save();
      return redirect()->route('productos.variedades',$p->id)->with('success','se ha creado correctamente');
      // return back()->with('success','producto agregado de forma exitosa');
    } catch (\Throwable $th) {
      // return $th;
      return back()->with('danger','error, intente nuevamente, el producto no se pudo agregar');
    }
  }

  public function edit($id_producto){
    $v = Variedad::findOrFail($id_producto);
    $p = $v->producto;
    return view('admin.producto.variedad.edit',compact('v','p'));
  }

  public function update(Request $request, $id) {
    try {
      $v = Variedad::findOrFail($id);
      $p = $v->producto;
      $v->codigo = $request->input('codigo_variante');
      $v->nombre = $request->input('nombre_variante');
      $v->descripcion = $request->input('descripcion_variante');
      $v->stock = $request->input('stock',null);
      $v->stock_critico = $request->input('stock_critico',null);
      $v->precio = $request->input('precio',0);
      $v->precio_descuento = $request->input('precio_descuento',null);
      $v->activo = $request->input('activo') == 'si' ? true : false;

      if(!empty($request->file('image2'))){
        $filename = $v->codigo . time();
        $folder = 'products/' . $p->id;
        $name = ImportImage::save_v2($request,'image2', $filename, $folder, false, false, 100, true);

        $folder .= '/thumbnails';
        $img_thumbnails = ImportImage::save_asset($request,'image2', $filename, $folder, false, false, 50, 1);

        if ($name != 400 && $img_thumbnails != 400) {
          $assets = $v->assets;
          $assets['imagen'][0] = $name;
          $assets['thumbnails'][0] = $img_thumbnails;
          $v->assets = $assets;
        } else{
          return back()->with('error','error intente nuevamente');
        }
      }
      $v->update();
      return back()->with('success','producto ha actualizado');
    } catch (\Throwable $th) {
      // return $th;
      return back()->with('danger','error, intente nuevamente, el producto no se pudo agregar');
    }
  }

  // @API
  public function changePosition(Request $request, $id_producto){
    try {
      $p = Producto::findOrFail($id_producto);
      $variedades = $p->variedades;
      $posiciones = $request->input('list');
      foreach ($variedades as $v) {
        for ($i=0; $i < count($posiciones); $i++) {
          if($v->id == $posiciones[$i] && $v->posicion != ($i + 1)){
            $v->posicion = $i + 1;
            $v->update();
          }
        }
      }
      return response()->json(['message' => 'Se ha actualizado.'], 200);
    } catch (\Throwable $th) {
      return response()->json(['message' => 'Error. Intente nuevamente'], 400);
    }
  }
}
