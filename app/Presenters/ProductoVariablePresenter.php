<?php

namespace App\Presenters;

use App\Presenters\Presenter;
use App\Services\Imagen;

class ProductoVariablePresenter extends Presenter
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
    return (new Imagen($this->getImagenFirst(), null, $img))->call();
  }

  public function getImagenPublic(){
    $img = $this->images[rand(0,1)];
    $img_public = (new Imagen($this->getImagenFirst(), null, $img))->call();
    return $img != $img_public ? $img_public : null;
  }

  public function getThumbnails(){
    $img = $this->images[rand(0,1)];
    $img_public = (new Imagen($this->getThumbnailsFirst(), null, $img))->call();
    return $img != $img_public ? $img_public : null;
  }

  public function getVisible() {
    $status = $this->visibilidad[$this->model->activo];
    $icon = $status[1];
    $color =$status[0];

    return "<i class='fa fa-$icon text-$color'></i>";
  }

  private function getImagenFirst() {
    return $this->model->assets['imagen'][0] ?? null;
  }

  private function getThumbnailsFirst() {
    return $this->model->assets['thumbnails'][0] ?? null;
  }
}
