<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Tienda;
use Illuminate\Http\Request;

class WebController extends Controller
{
  public function index() {
    return view('web.index');
  }

  public function webCreator($codigo) {
    $t = Tienda::where('codigo',$codigo)->firstOrFail();



    return view('admin.web.web_creator',compact('t'));
  }
}
