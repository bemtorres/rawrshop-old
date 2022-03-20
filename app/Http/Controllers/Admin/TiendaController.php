<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Tienda;
use App\Services\ImportImage;
use App\Services\SeoConfig;
use App\Services\Sistema\Globales;
use App\Services\Themes;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class TiendaController extends Controller
{

  public function index() {
    $t = Tienda::first();
    $tipos = Tienda::TIPOS_WEB;
    return view('admin.tienda.index', compact('t','tipos'));
  }

  public function update(Request $request) {
    try {
      $t = Tienda::first();
      $t->nombre = $request->input('nombre');
      $t->rubro = $request->input('rubro');
      $t->correo = $request->input('correo');
      $t->descripcion = $request->input('descripcion');
      $t->direccion = $request->input('direccion');
      $config = $t->config;
      $config['shop']['color'] = $request->input('color');
      $t->config = $config;
      $t->update();
      session(['tienda' => $t]);
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function rrss() {
    try {
      $t = Tienda::first();
      $redes = Globales::TYPES_RRSS;
      return view('admin.tienda.rrss', compact('t','redes'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }


  public function chat() {
    try {
      $t = Tienda::first();
      return view('admin.tienda.chat', compact('t'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function web() {
    try {
      $t = Tienda::first();
      return view('admin.tienda.web', compact('t'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function webUpdate(Request $request) {
    try {
      $t = Tienda::first();

      // $img = '';
      // if(!empty($request->file('image'))){
      //   $time = time();
      //   $filename = 'banner1'.$time;
      //   $folder = 'shop';
      //   $img = ImportImage::save_v2($request,'image', $filename, $folder, false, false, 100, false);
      //   $filename = 'banner2'.$time;
      //   $img_mobile = ImportImage::save_v2($request,'image2', $filename, $folder, false, false, 100, false);
      //   if ($img == 400 || $img_mobile == 400) {
      //     return back()->with('error','error intente nuevamente');
      //   }
      // }

      // $assets = $t->assets['banner'] ?? [];
      // $count = 0;
      // if ($assets) {
      //   $count = count($assets);
      // }
      // $asset = [];
      // $asset['id'] = $count + 1;  //posicion
      // $asset['title'] = $request->input('titulo');
      // $asset['data'] = $img;
      // $asset['data_mobile'] = $img_mobile;
      // $asset['enabled'] = $request->input('enabled') ? true : false;

      // array_push($assets, $asset);
      // $as['banner'] = $assets;
      // $t->assets = $as;
      $config = $t->config;
      $config['paginator'] = $request->input('number_pag') ?? 3;
      $t->config = $config;
      $t->update();

      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return $th;
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function webUpdateEnabled(Request $request) {
    $t = Tienda::first();
    $id = $request->input('id');
    $assets = $t->assets['banner'];

    if ($request->input('action') == 'update') {
      foreach ($assets as $key => $value) {
        if ($value['id'] == $id) {
          $assets[$key]['enabled'] = !$assets[$key]['enabled'];
          break;
        }
      }
      $as['banner'] = $assets;
    }else{
      $imagenes = array();
      foreach ($assets as $key => $value) {
        if ($value['id'] != $id) {
          array_push($imagenes, $value);
        }
      }
      $as['banner'] = $imagenes;
    }

    $t->assets = $as;
    $t->update();
    return back()->with('success','Se ha actualizado correctamente');
  }

  public function chatUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['chat']['enabled'] = $request->input('enabled') ? true : false;
      $config['rrss']['whatsapp'] = $request->input('whatsapp');
      $config['chat']['popup_message'] = $request->input('popupMessage');
      $config['chat']['message'] = $request->input('message');
      $config['chat']['header_title'] = $request->input('headerTitle');
      $config['chat']['size'] = $request->input('size');
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function rrssUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['rrss']['facebook'] = $request->input('facebook');
      $config['rrss']['youtube'] = $request->input('youtube');
      $config['rrss']['whatsapp'] = $request->input('whatsapp');
      $config['rrss']['instagram'] = $request->input('instagram');
      $config['rrss']['telefono'] = $request->input('telefono');
      $config['rrss']['linkedin'] = $request->input('linkedin');
      $config['rrss']['twitter'] = $request->input('twitter');
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function rrssUpdateEnabled(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['rrss_enabled']['facebook'] = $request->input('facebook_enabled') ? true : false;
      $config['rrss_enabled']['youtube'] = $request->input('youtube_enabled') ? true : false;
      $config['rrss_enabled']['whatsapp'] = $request->input('whatsapp_enabled') ? true : false;
      $config['rrss_enabled']['instagram'] = $request->input('instagram_enabled') ? true : false;
      $config['rrss_enabled']['telefono'] = $request->input('telefono_enabled') ? true : false;
      $config['rrss_enabled']['linkedin'] = $request->input('linkedin_enabled') ? true : false;
      $config['rrss_enabled']['twitter'] = $request->input('twitter_enabled') ? true : false;

      $config['rrss_posicion']['facebook'] = $request->input('facebook_posicion') ? true : false;
      $config['rrss_posicion']['youtube'] = $request->input('youtube_posicion') ? true : false;
      $config['rrss_posicion']['whatsapp'] = $request->input('whatsapp_posicion') ? true : false;
      $config['rrss_posicion']['instagram'] = $request->input('instagram_posicion') ? true : false;
      $config['rrss_posicion']['telefono'] = $request->input('telefono_posicion') ? true : false;
      $config['rrss_posicion']['linkedin'] = $request->input('linkedin_posicion') ? true : false;
      $config['rrss_posicion']['twitter'] = $request->input('twitter_posicion') ? true : false;

      $config['rrss_footer_enabled']['facebook'] = $request->input('facebook_footer_enabled') ? true : false;
      $config['rrss_footer_enabled']['youtube'] = $request->input('youtube_footer_enabled') ? true : false;
      $config['rrss_footer_enabled']['whatsapp'] = $request->input('whatsapp_footer_enabled') ? true : false;
      $config['rrss_footer_enabled']['instagram'] = $request->input('instagram_footer_enabled') ? true : false;
      $config['rrss_footer_enabled']['telefono'] = $request->input('telefono_footer_enabled') ? true : false;
      $config['rrss_footer_enabled']['linkedin'] = $request->input('linkedin_footer_enabled') ? true : false;
      $config['rrss_footer_enabled']['twitter'] = $request->input('twitter_footer_enabled') ? true : false;
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function footerUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['footer']['enabled'] = $request->input('enabled') ? true : false;
      $config['footer']['content'] = $request->input('content');
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function seo() {
    try {
      $t = Tienda::first();
      $seoTypes = SeoConfig::OBJECT_TYPES;
      return view('admin.tienda.seo', compact('t','seoTypes'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function footer() {
    try {
      $t = Tienda::first();
      $redes = Globales::TYPES_RRSS;
      return view('admin.tienda.footer', compact('t','redes'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function assets() {
    try {
      $t = Tienda::first();
      return view('admin.tienda.assets', compact('t'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function codigo() {
    try {
      $t = Tienda::first();
      return view('admin.tienda.codigo', compact('t'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function codigoJs(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['code']['js'] = $request->input('code-js');
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function codigoCss(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['code']['css'] = $request->input('code-css');
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function titleUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['shop']['title_web'] = $request->input('title');
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function assetsUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['shop']['logo_enabled'] = $request->input('logo_enabled') ? true : false;
      $t->config = $config;

      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'shop';
        $name = ImportImage::save_v2($request,'image', $filename, $folder, false, false, 40, false);
        if ($name == 400) {
          return back()->with('error','error intente nuevamente');
        }

        $t->logo = $name;
      }

      if(!empty($request->file('image2'))){
        $filename = 'favicon';
        $folder = 'shop';
        $name = ImportImage::save_v2($request,'image2', $filename, $folder, false, false, 40, false);
        if ($name == 400) {
          return back()->with('error','error intente nuevamente');
        }
        $assets = $t->assets;
        $assets['favicon'] = $name;
        $t->assets = $assets;
      }
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function seoUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $img = null;
      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'advertising';
        // $name = ImportImage::save_v2($request,'image', $filename, $folder, false, false, 100, false);
        $name = ImportImage::save($request, 'image', $filename, $folder, false, false);
        // return $name;
        if ($name == 400) {
          return back()->with('error','error intente nuevamente');
        }
        $img = $name;
      }

      $seo = array();
      $seo['enabled'] = $request->input('seo_enabled') ? true : false;
      $seo['title'] = $request->input('titulo');
      $seo['description'] = $request->input('descripcion');
      $seo['type'] = $request->input('website');
      $seo['img'] = $img;
      $seo['keyword'] = $request->input('keywords');

      $config = $t->config;
      $config['seo'] = $seo;
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function mantenimiento() {
    try {
      // return [
      //   'linux' => public_path('\storage\Features/' .'Name'.".".'png'),
      //   'win' => public_path('storage\Features/' .'Name'.".".'png'),
      //   'state' => strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? 'WINDOWS' : 'LINUX',
      //   'aa' => public_path('storage' . DIRECTORY_SEPARATOR),
      // ];
      $t = Tienda::first();
      return view('admin.tienda.mantenimiento', compact('t'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function mantenimientoUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $t->estado = $request->input('mantenimiento_enabled') ? 2 : 1;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function integracion() {
    $t = Tienda::first();
    return view('admin.tienda.integracion', compact('t'));
  }

  public function pay() {
    try {
      $t = Tienda::first();
      return view('admin.tienda.pay', compact('t'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function payUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['pay_whatsapp'] = $request->input('enabled') ? true : false;
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function theme() {
    try {
      $t = Tienda::first();
      $colors = Globales::TYPES_COLORS;
      $themes = Themes::THEMES;

      return view('admin.tienda.theme', compact('t','colors','themes'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function themeUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['color']['header'] = $request->input('header');
      $config['color']['nav'] = $request->input('nav');
      $config['color']['footer'] = $request->input('footer');
      $config['color']['footer_cart'] = $request->input('footer_cart');
      $config['color']['background'] = $request->input('background');
      $config['shop']['theme'] = $request->input('theme');
      $config['shop']['theme_admin'] = $request->input('theme_admin');
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function pro() {
    try {
      $t = Tienda::first();
      return view('admin.tienda.pro', compact('t'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function proUpdate(Request $request) {
    try {
      $t = Tienda::first();
      $config = $t->config;
      $config['meta'] = $request->input('meta');
      $t->config = $config;
      $t->update();
      return back()->with('success','Se ha actualizado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }
}
