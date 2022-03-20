<?php

namespace App\Presenters;

use App\Presenters\Presenter;
use App\Services\Imagen;
use App\Services\Sistema\Globales;

class ProductoPresenter extends Presenter
{
  private $images = [
    'assets/rawrshop/product01.jpg',
    'assets/rawrshop/product02.jpg'
  ];

  private $visibilidad = [
    true => ['success','check-circle','Visible'],
    false => ['dark','pause-circle','No Mostrar'],
  ];

  public function getImagen(){
    $img = $this->images[rand(0,1)];
    return (new Imagen($this->model->imagen, null, $img))->call();
  }

  public function getThumbnails(){
    $img = $this->images[rand(0,1)];
    $img_public = (new Imagen($this->model->assets['thumbnails_imagen'], null, $img))->call();
    if ($img != $img_public) {
      return $img_public;
    }
    return null;
  }

  public function getVisible() {
    $status = $this->visibilidad[$this->model->activo];
    $icon = $status[1];
    $color =$status[0];

    return "<i class='fa fa-$icon text-$color'></i>";
  }

  public function getBadgeTitle($name) {
    $obj = $this->model->config[$name] ?? [];
    $c = array();
    $c['title'] = $obj ? $obj['title'] ?? '' : '';
    $c['color'] = $obj ? $obj['color'] ?? 'primary' : 'primary';
    $c['icon'] = $obj ? Globales::ICONS[$obj['icon']][1] ?? '' : '';
    $c['enabled'] = $obj ? $obj['enabled']  ?? false : false;
    return $c;
  }

  public function getBadge() {
    $badge = [$this->getBadgeTitle('info_one'), $this->getBadgeTitle('info_two')];
    return $badge;
  }
}
