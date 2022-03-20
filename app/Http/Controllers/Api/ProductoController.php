<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Variedad;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
  public function find(Request $r) {

    $codigo = $r->input('code');
    $id = $r->input('id');

    $response = array(
      'status'  => 404,
      'result' => array(
        'product'    => null,
      )
    );

    $variedad = Variedad::with(['producto'])->where('codigo',$codigo)->find($id);

    if ($variedad) {
      $raw_info = $variedad->raw_info();
      $raw_info['img'] = asset($raw_info['img']);
      $raw_info['product_name'] = $variedad->producto->nombre;

      $response['status'] = 200;
      $response['result']['product'] = $raw_info;
    }
    return $response;
  }
}