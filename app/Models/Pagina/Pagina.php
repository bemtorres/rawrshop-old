<?php

namespace App\Models\Pagina;

use App\Casts\Json;
use App\Models\Sistema\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagina extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'p_pagina';
  protected $dates = ['deleted_at'];

  protected $casts = [
    'contenido' => Json::class,
    'config' => Json::class,
  ];

  const STATUS = array(
    1 => ['no mostrar','fas fa-eye-slash','dark'],
    2 => ['publicar','fas fa-check-circle','success'],
  );


  public function getContenidoBody() {
    return $this->contenido['content'] ?? '';
  }

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function getStatusHTML() {
    $v = self::STATUS[$this->estado];
    return "<i class='$v[1] text-$v[2]' title='$v[0]'></i>";
  }
}
