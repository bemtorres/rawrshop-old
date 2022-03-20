<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Categoria;
use App\Models\Sistema\Tienda;
use App\Models\Sistema\Usuario;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
  public function index() {
    $t = Tienda::first();
    if (!$t) {
      return redirect()->route('install.index');
    }
    return view('auth.login', compact('t'));
  }

  public function login(Request $request) {
    try {
      $u = Usuario::where('correo',$request->input('email'))->firstOrFail();
      $pass = hash('sha256', $request->input('password'));
      if($u->password==$pass){
        Auth::guard('usuario')->loginUsingId($u->id);
        $t = Tienda::first();
        session(['tienda' => $t]);
        return redirect()->route('dashboard.index');
      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }
}
