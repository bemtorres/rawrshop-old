<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Tienda;
use App\Models\Sistema\Usuario;
use Illuminate\Http\Request;

class InstallController extends Controller
{
  public function index() {
    $t = Tienda::first();
    if (!$t) {
      $tipos = Tienda::TIPOS_WEB;
      return view('install.index', compact('tipos'));
    }
    return redirect('/');
  }

  public function store(Request $request) {
    try {
      $t = Tienda::first();
      if (!$t) {
        $t = new Tienda();
        $password  = hash('sha256', $request->input('password'));
        $correo = $request->input('correo');

        $t = new Tienda();
        $t->nombre =  $request->input('nombre_pagina');
        $t->correo =  $correo;
        $t->rubro =  $request->input('rubro');
        $t->tipo =  $request->input('tipo');
        $t->save();

        $a = new Usuario();
        $a->correo = $correo;
        $a->password = $password;
        $a->nombre = $request->input('nombre');
        $a->admin = true;
        $a->save();

        return redirect()->route('acceso')->with('Felicidades, disfruta tu tienda');
      } else {
        return redirect('/');
      }
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
