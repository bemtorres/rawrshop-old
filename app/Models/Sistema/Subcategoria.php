<?php

namespace App\Models\Sistema;

use App\Casts\Json;
use App\Services\Sistema\Globales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategoria extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 's_subcategoria';

  protected $dates = ['deleted_at'];

  protected $casts = [
    'config' => Json::class,
  ];

  const STATUS = array(
    0 => ['no mostrar','fas fa-eye-slash','dark'],
    1 => ['mostrar','fas fa-check-circle','success'],
  );

  public function productos(){
    return $this->hasMany(Producto::class,'id_subcategoria','id');
  }

  public function productos_active(){
    return $this->productos()->where('activo',true);
  }


  public function getStatusHTML() {
    $v = self::STATUS[$this->activo];
    return "<i class='$v[1] text-$v[2]' title='$v[0]'></i>";
  }

  public function getIcon() {
    $name = $this->config['icon'] ?? '';
    $icon = $name ? Globales::ICONS[$name] : '';
    return [$name, $icon];
  }
}
