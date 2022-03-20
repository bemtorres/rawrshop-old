<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index() {
    return view('admin.home');
  }

  public function create() {
      //
  }

  public function store(Request $request) {
      //
  }

  public function show($id) {
      //
  }

  public function edit($id) {
      //
  }

  public function update(Request $request, $id) {
      //
  }

  public function destroy($id) {
      //
  }
}
