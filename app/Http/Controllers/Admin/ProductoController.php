<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Categoria;
use App\Models\Sistema\Producto;
use App\Models\Sistema\Subcategoria;
use App\Models\Sistema\Tienda;
use App\Models\Sistema\Variedad;
use App\Services\ImportImage;
use App\Services\Sistema\Globales;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
  public function index() {
    $productos = Producto::with(['variedades','categoria','subcategoria'])
                          ->where('fuera_stock',false)
                          ->where('activo',true)
                          ->orderBy('id','desc')
                          ->get();

    return view('admin.producto.index',compact('productos'));
  }

  public function indexFavoritos() {
    $productos = Producto::with(['variedades','categoria','subcategoria'])
                          ->where('fuera_stock',false)
                          ->where('favorito_check',true)
                          ->where('activo',true)
                          ->orderBy('id','desc')
                          ->get();

    return view('admin.producto.index',compact('productos'));
  }

  public function indexDashboard() {

    $t = Tienda::first();
    $paginator = $t->getConfigPaginator();

    $productos = Producto::with(['variedades','categoria','subcategoria'])
                          ->where('fuera_stock',false)
                          ->where('activo',true)
                          ->orderBy('id','desc')
                          ->paginate($paginator);

    return view('admin.producto.dashboard',compact('productos'));
  }

  public function indexAgotados() {
    $productos = Producto::with(['variedades','categoria','subcategoria'])
                          ->where('fuera_stock',true)
                          ->where('activo',true)
                          ->orderBy('id','desc')
                          ->get();

    return view('admin.producto.index',compact('productos'));
  }

  public function indexEliminados() {
    $productos = Producto::with(['variedades','categoria','subcategoria'])
                          ->where('activo',false)
                          ->orderBy('id','desc')
                          ->get();

    return view('admin.producto.index',compact('productos'));
  }


  public function create() {
    $categorias = Categoria::orderBy('posicion')->get();
    $subcategorias = Subcategoria::orderBy('posicion')->get();
    return view('admin.producto.create',compact('categorias','subcategorias'));
  }

  public function store(Request $request) {
    try {
      $p = new Producto();
      $codigo = strtolower(trim($request->input('codigo')));
      $p->codigo = $codigo;
      $p->id_categoria = $request->input('categoria',null);
      $p->id_subcategoria = $request->input('subcategoria',null);
      // $p->codigo = $request->input('codigo');

      $p->nombre = $request->input('nombre');
      $p->descripcion = $request->input('descripcion');
      $p->id_usuario = current_user()->id;
      $p->activo = $request->input('activo') == 'si' ? true : false;
      $p->save();

      if(!empty($request->file('image'))){
        $filename = $codigo . time();
        $folder = 'products/' . $p->id;
        $name = ImportImage::save_v2($request,'image', $filename, $folder, false, false, 100, true);
        $folder .= '/thumbnails';
        $img_thumbnails = ImportImage::save_asset($request,'image', $filename, $folder, false, false, 40, 1);
        if ($name != 400 && $img_thumbnails != 400) {
          $p->imagen = $name;

          $assets = array();
          $assets['thumbnails_imagen'] = $img_thumbnails;
          $p->assets = $assets;
          $p->update();
        }
      }

      $posicion = Variedad::where('id_producto',$p->id)->count() + 1;

      $v = new Variedad();
      $v->id_producto = $p->id;
      $v->codigo = strtolower($p->codigo .'-' . trim($request->input('codigo_variante')));
      $v->nombre = $request->input('nombre_variante');
      $v->descripcion = $request->input('descripcion_variante');
      $v->stock = $request->input('stock',null);
      $v->stock_critico = $request->input('stock_critico',null);
      $v->precio = $request->input('precio',0);
      $v->precio_descuento = $request->input('precio_descuento',null);
      $v->posicion = $posicion;
      $v->id_usuario = current_user()->id;
      $v->save();

      if(!empty($request->file('image2'))){
        $filename = $v->codigo . time();
        $folder = 'products/' . $p->id;
        $name = ImportImage::save_v2($request,'image2', $filename, $folder, false, false, 100, true);

        $folder .= '/thumbnails';
        $img_thumbnails = ImportImage::save_asset($request,'image2', $filename, $folder, false, false, 40, 1);

        if ($name != 400 && $img_thumbnails != 400) {
          $assets['imagen'][0] = $name;
          $assets['thumbnails'][0] = $img_thumbnails;
          $v->assets = $assets;
          $v->update();
        }

      }

      return redirect()->route('productos.index')->with('success','producto agregado de forma exitosa');
    } catch (\Throwable $th) {
      return back()->with('danger','error, intente nuevamente, el producto no se pudo agregar');
    }
  }

  public function show($id) {
    $p = Producto::with(['variedades'])->findOrFail($id);
    return view('admin.producto.show',compact('p'));
  }

  public function edit($id) {
    $p = Producto::with(['variedades'])->findOrFail($id);
    $categorias = Categoria::get();
    $subcategorias = Subcategoria::get();

    $colors = Globales::TYPES_COLORS;
    $icons = Globales::ICONS;

    $badge = $p->present()->getBadge();

    return view('admin.producto.edit',compact('p','categorias','subcategorias','colors','icons','badge'));
  }

  public function update(Request $request, $id) {
    try {
      $p = Producto::findOrFail($id);
      $codigo = trim($request->input('codigo'));
      $p->codigo = $codigo;

      if(!empty($request->file('image'))){
        $filename = $codigo . time();
        $folder = 'products/' . $p->id;
        // $name = ImportImage::save($request, 'image', $filename, $folder, false, true);
        $name = ImportImage::save_v2($request,'image', $filename, $folder, false, false, 100, true);

        $folder .= '/thumbnails';
        $img_thumbnails = ImportImage::save_asset($request,'image', $filename, $folder, false, false, 50, 1);
        if ($name != 400 && $img_thumbnails != 400) {
          $p->imagen = $name;
          $assets = $p->assets;
          $assets['thumbnails_imagen'] = $img_thumbnails;
          $p->assets = $assets;
          $p->update();
        }

        // // return $name;
        // if ($name == 400) {
        //   return back()->with('error','error intente nuevamente');
        // }
        // $p->imagen = $name;
      }

      $p->id_categoria = $request->input('categoria',null);
      $p->id_subcategoria = $request->input('subcategoria',null);
      $p->nombre = $request->input('nombre');
      $p->descripcion = $request->input('descripcion');
      $p->activo = $request->input('activo') == 'si' ? true : false;
      $p->fuera_stock = $request->input('fuera_stock') == 'si' ? true : false;

      $p->update();
      return back()->with('success','se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','error, intente nuevamente');
    }
  }

  public function variedades($id) {
    $p = Producto::with(['variedades'])->findOrFail($id);
    return view('admin.producto.variedades',compact('p'));
  }

  public function seo($id) {
    $p = Producto::with(['variedades'])->findOrFail($id);
    return view('admin.producto.seo',compact('p'));
  }


  public function assets($id) {
    $p = Producto::with(['variedades'])->findOrFail($id);
    return view('admin.producto.assets',compact('p'));
  }

  public function assetsUpdate(Request $request, $id) {
    $p = Producto::with(['variedades'])->findOrFail($id);
    $nName = $request->input('nombre');

    if(!empty($request->file('image'))){
      $filename = $p->codigo . time();
      $folder = 'products/' . $p->id;
      $name = ImportImage::save_v2($request,'image', $filename, $folder, false, false, 100, true);

      $folder .= '/thumbnails';
      $img_thumbnails = ImportImage::save_asset($request,'image', $filename, $folder, false, false, 50, 1);
      if ($name != 400 && $img_thumbnails != 400) {
        $data['name'] = $nName;
        $data['original'] = $name;
        $data['thumbnails'] = $img_thumbnails;
        $assets = $p->assets;
        $assets['data'][] = $data;
        $p->assets = $assets;
        $p->update();
      }
    }
    return back()->with('success','Nueva imagen registrada');
  }

  public function assetsDelete(Request $request, $id) {

    // return $request;
    $p = Producto::with(['variedades'])->findOrFail($id);

    $ida = $request->input('id');
    $assets = $p->assets;
    unset($assets['data'][$ida]);
    $p->assets = $assets;
    $p->update();

    return back()->with('success','Nueva imagen registrada');
  }

  public function titleUpdate(Request $request, $id) {
    try {
      $p = Producto::findOrFail($id);

      $c = array();
      $c['title'] = $request->input('titulo');
      $c['color'] = $request->input('color');
      $c['icon'] = $request->input('icon');
      $c['enabled'] = $request->input('enabled') ? true : false;
      $n = 'info_'.$request->input('id');

      $config = $p->config;
      $config[$n] = $c;
      $p->config = $config;
      $p->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return $th;
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function favoritoUpdate(Request $request) {
    try {
      $p = Producto::findOrFail($request->id);
      $p->favorito_check = !$p->favorito_check;
      $p->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }
  public function priceUpdate(Request $request) {
    try {
      $p = Producto::findOrFail($request->id);
      $v = $p->variedades->first();
      $v->precio = $request->input('precio');
      $v->precio_descuento = $request->input('precio_descuento');
      $v->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }
}
