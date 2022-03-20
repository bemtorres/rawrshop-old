<?php

namespace App\Models\Sistema;

use App\Casts\Json;
use App\Presenters\ProductoVariablePresenter;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variedad extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 's_producto_variedad';

  protected $dates = ['deleted_at'];

  protected $casts = [
    'assets' => Json::class,
  ];

  public function present(){
    return new ProductoVariablePresenter($this);
  }

  public function getPrice() {
    return (new Currency($this->precio ?? 0))->money();
  }

  public function producto(){
    return $this->belongsTo(Producto::class,'id_producto');
  }

  public function getPriceDescuento() {
    return (new Currency($this->precio_descuento ?? 0))->money();
  }

  function raw_info() {
    return [
      'id' => $this->id,
      'codigo' => $this->codigo,
      'nombre' => $this->nombre,
      'descripcion' => $this->descripcion,
      'img' => $this->present()->getImagen(),
      'precio' => $this->getPrice(),
      'price_origin' => $this->precio ?? 0,
      'precio_descuento' => $this->getPriceDescuento(),
      'visible' => ''
    ];
  }
}
