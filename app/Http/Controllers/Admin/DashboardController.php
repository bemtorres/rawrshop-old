<?php

namespace App\Http\Controllers\Admin;

use SEO;
use SEOMeta;
use App\Http\Controllers\Controller;
use App\Models\Sistema\Producto;
use App\Models\Sistema\Tienda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index() {
    return view('admin.dashboard.index');
  }
}
