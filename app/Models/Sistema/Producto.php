<?php

namespace App\Models\Sistema;

use App\Casts\Json;
use App\Presenters\ProductoPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class Producto extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 's_producto';

  protected $dates = ['deleted_at'];

  protected $casts = [
    'config' => Json::class,
    'assets' => Json::class
  ];

  public function present(){
    return new ProductoPresenter($this);
  }

  public function categoria(){
    return $this->belongsTo(Categoria::class,'id_categoria');
  }

  public function subcategoria(){
    return $this->belongsTo(Subcategoria::class,'id_subcategoria');
  }

  public function variedades(){
    return $this->hasMany(Variedad::class,'id_producto','id')->orderBy('posicion');
  }

  public function assets_data() {
    $data = $this->assets['data'] ?? [];

    if (count($data) > 0) {
      foreach ($data as $key => $value) {
        $data[$key]['original'] = \Storage::url($value['original']);
        $data[$key]['thumbnails'] = \Storage::url($value['thumbnails']);
      }
    }

    return $data;
  }

  public function raw_info() {
    return [
      'img' => asset($this->present()->getImagen()),
      'title' =>  $this->nombre,
      'type' =>  'articles',
      'description' => '$'. $this->variedades->first()->getPrice() . '. (' . $this->codigo . ') - '. strip_tags(Str::limit($this->descripcion, 55)),
      'route' => route('home.producto',$this->codigo)
    ];
  }
}
