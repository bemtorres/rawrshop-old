<?php

namespace App\Http\Controllers;

use SEO;
use SEOMeta;
use App\Http\Controllers\Controller;
use App\Models\Pagina\Pagina;
use App\Models\Sistema\Categoria;
use App\Models\Sistema\Producto;
use App\Models\Sistema\Subcategoria;
use App\Models\Sistema\Suscriptor;
use App\Models\Sistema\Tienda;
use App\Services\Sistema\Globales;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;


class HomeController extends Controller
{
  public function index() {
    $t = Tienda::first();


    if (!$t) { return redirect()->route('install.index'); }
    if ($t->getSeoEnabled()) { $this->seo($t->present()->dataSeo()); }
    if ($t->getMantenimientoEnabled()) { return redirect()->route('home.mantenimiento'); }
    $paginator = $t->getConfigPaginator();

    $paginas = Pagina::where('estado',2)->orderBy('posicion','desc')->get();
    $categorias = Categoria::where('activo',true)->with(['subs','productos','subs','subs.productos'])->get();
    $productos = Producto::where('activo',true)->with(['variedades','categoria','subcategoria'])->orderBy('created_at','desc')->paginate($paginator);

    // $productos_orden = Producto::where('activo',true)
    //                             ->with(['variedades'])
    //                             ->orderBy('created_at','desc')
    //                             ->orderBy('id_categoria','desc')
    //                             ->get();


    // $sub_productos = Subcategoria::with(['productos_active'])->get();
    $productos_favoritos = $this->get_product_favorite();
    // $productos = $productos->paginate($paginator);

    $redes = Globales::TYPES_RRSS;
    $isMobile = $this->isMobile();
    $mode_edit = false;

    return view('home.index',
      compact(
        't',
        'redes',
        'paginas',
        'isMobile',
        'productos',
        'mode_edit',
        'categorias',
        'productos_favoritos'
      )
    );
  }

  public function find(Request $request) {
    $t = Tienda::first();
    if (!$t) { return redirect()->route('install.index'); }
    if ($t->getSeoEnabled()) { $this->seo($t->present()->dataSeo()); }
    if ($t->getMantenimientoEnabled()) { return redirect()->route('home.mantenimiento'); }

    $paginator = $t->getConfigPaginator();
    $value = $request->input('name');

    $productos = Producto::where('activo',true)
                        ->where('nombre','LIKE', "%$value%")
                        ->paginate($paginator);

    $productos_favoritos = $this->get_product_favorite();

    $paginas = Pagina::where('estado',2)->orderBy('posicion','desc')->get();
    $categorias = Categoria::where('activo',true)->with(['subs'])->get();
    $redes = Globales::TYPES_RRSS;
    $isMobile = $this->isMobile();
    $mode_edit = false;

    return view('home.index',
      compact(
        'productos',
        'productos_favoritos',
        'categorias',
        't',
        'mode_edit',
        'paginas',
        'redes',
        'isMobile'
      )
    );
  }

  public function producto($code) {
    $t = Tienda::first();

    if ($t->getMantenimientoEnabled()) { return redirect()->route('home.mantenimiento'); }

    $p = Producto::where('activo',true)->where('codigo',$code)->firstOrFail();
    $p->count_views++;
    $p->update();
    $categorias = Categoria::where('activo',true)->with(['subs'])->get();
    $paginas = Pagina::where('estado',2)->orderBy('posicion')->get();

    $redes = Globales::TYPES_RRSS;
    $isMobile = $this->isMobile();
    $mode_edit = false;
    $productos_favoritos = $this->get_product_favorite();

    $this->seo_poducto($p->raw_info());

    return view('home.producto',
      compact(
        'p',
        'productos_favoritos',
        't',
        'redes',
        'paginas',
        'categorias',
        'isMobile',
        'mode_edit'
      )
    );
  }

  public function blog($codigo){
    $t = Tienda::first();

    if ($t->getMantenimientoEnabled()) { return redirect()->route('home.mantenimiento'); }

    $categorias = Categoria::where('activo',true)->with(['subs'])->get();
    $paginas = Pagina::where('estado',2)->orderBy('posicion')->get();
    $p = Pagina::where('code',$codigo)->firstOrFail();

    $redes = Globales::TYPES_RRSS;
    $isMobile = false;
    $mode_edit = false;
    return view('home.blog',compact('t','mode_edit','p','paginas','categorias','redes','isMobile'));
  }

  public function categoria($tipo, $codigo) {
    $t = Tienda::first();
    $paginator = $t->getConfigPaginator();

    if ($t->getMantenimientoEnabled()) { return redirect()->route('home.mantenimiento'); }

    $categorias = Categoria::where('activo',true)->with(['subs'])->get();
    $paginas = Pagina::where('estado',2)->orderBy('posicion')->get();

    if ($tipo == 'c') {
      $categoria = Categoria::where('activo',true)->where('codigo',$codigo)->first();
      if (!$categoria) {
        return back()->with('warning','No encontrado');
      }
      $productos = Producto::where('activo',true)->where('id_categoria',$categoria->id)->paginate($paginator);
    }else{
      $categoria = Subcategoria::where('activo',true)->where('codigo',$codigo)->first();
      if (!$categoria) {
        return back()->with('warning','No encontrado');
      }
      $productos = Producto::where('activo',true)->where('id_subcategoria',$categoria->id)->paginate($paginator);
    }

    $redes = Globales::TYPES_RRSS;
    $isMobile = $this->isMobile();
    $mode_edit = false;

    return view('home.categoria',
      compact(
        't',
        'redes',
        'paginas',
        'categorias',
        'isMobile',
        'mode_edit',
        'productos',
        'categoria'
      )
    );
  }

  // EDICION

  public function indexEdicion() {
    $t = Tienda::first();
    $paginator = $t->getConfigPaginator();
    $paginas = Pagina::where('estado',2)->orderBy('posicion','desc')->get();
    $categorias = Categoria::where('activo',true)->with(['subs','productos','subs','subs.productos'])->get();
    $productos = Producto::where('activo',true)->with(['variedades','categoria','subcategoria'])->orderBy('created_at','desc')->paginate($paginator);

    $productos_favoritos = $this->get_product_favorite();
    $redes = Globales::TYPES_RRSS;
    $isMobile = $this->isMobile();
    $mode_edit = false;

    return view('home.index',
      compact(
        'productos',
        'productos_favoritos',
        'categorias',
        't',
        'mode_edit',
        'paginas',
        'redes',
        'isMobile'
      )
    );
  }

  public function blogEdicion($codigo){
    $t = Tienda::first();
    $p = Pagina::where('code',$codigo)->firstOrFail();

    $mode_edit = true;
    $isMobile = $this->isMobile();
    return view('home.blog',compact('t','mode_edit','p','isMobile'));
  }

  public function newsletter(Request $request) {
    $email = $request->input('email');
    $sus = Suscriptor::where('correo',$email)->first();
    if ($sus) {
      $sus->contador++;
      $sus->update();
    }else{
      $sus = new Suscriptor();
      $sus->correo = $email;
      $sus->save();
    }
    return back()->with('success','Gracias por registrarte');
  }

  public function mantenimiento() {
    $t = Tienda::first();
    if (!$t->getMantenimientoEnabled()) {
      return redirect()->route('home.index');
    }
    $redes = Globales::TYPES_RRSS;
    $isMobile = false;

    return view('home.mantenimiento', compact('t','redes','isMobile'));
  }

  // PRIVATE

  private function seo($data) {
    SEO::setTitle($data['title']);
    SEO::setDescription($data['description']);
    SEO::setCanonical($data['route']);
    SEO::opengraph()->setUrl($data['route']);
    SEO::opengraph()->addProperty('type',$data['type']);
    SEO::openGraph()->addImage($data['img'], ['height' => 300, 'width' => 300]);
    SEOMeta::addKeyword($data['keyword']);
    if ($data['twitter']) {
      SEO::twitter()->setSite($data['twitter']);
    }
  }

  private function isMobile() {
    $agent = new Agent();
    return $agent->isMobile();
  }

  private function seo_poducto($data) {
    SEO::setTitle($data['title']);
    SEO::setDescription($data['description']);
    SEO::setCanonical($data['route']);
    SEO::opengraph()->setUrl($data['route']);
    SEO::opengraph()->addProperty('type',$data['type']);
    SEO::openGraph()->addImage($data['img'], ['height' => 300, 'width' => 300]);
  }

  public function get_product_favorite() {
    return Producto::where('activo',true)->with(['variedades','categoria','subcategoria'])->orderBy('created_at','desc')->where('favorito_check',true)->get();
  }
}
