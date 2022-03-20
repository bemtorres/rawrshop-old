<?php

namespace App\Presenters;

use App\Presenters\Presenter;
use App\Services\Imagen;

class TiendaPresenter extends Presenter
{
  private $img = "/assets/img/logo.png";
  private $icono = "/assets/rawrshop/ico.svg";
// 'assets/rawrshop/shop.gif'
  public function getLogo(){
    return (new Imagen($this->model->logo, null, $this->img))->call();
  }

  public function getIcono(){
    return (new Imagen($this->getAssetFavicon(), null, $this->icono))->call();
  }

  public function getAssetFavicon() {
    return $this->model->assets['favicon'] ?? '';
  }

  public function getLogoSeo(){
    return (new Imagen($this->model->getSeoImg(), null, $this->icono))->call();
  }

  public function dataSeo(){
    $keyword = explode(',', $this->model->getSeoKeyword());
    return array(
      'title' => $this->model->getSeoWebTitle() ?? '',
      'description' => $this->model->getSeoDescription() ?? '',
      'type' => $this->model->getSeoType() ?? '',
      'route' => route('home.index'),
      'route' => route('home.index'),
      'img' => asset($this->getLogoSeo()),
      'keyword' => $keyword,
      'twitter' => $this->model->presentRRSS()->redes('twitter') ?? '',
    );
    // SEO::setTitle($data['title']);
    // SEO::setDescription($data['descripcion']);
    // SEO::setCanonical($data['route']);
    // SEO::opengraph()->setUrl($data['route']);
    // SEO::opengraph()->addProperty('type',$data['route']);
    // SEO::openGraph()->addImage($data['img'], ['height' => 300, 'width' => 300]);
    // SEOMeta::addKeyword($data['keyword']);
    // if ($data['twitter']) {
    //   SEO::twitter()->setSite($data['twitter']);
    // }
  }

  public function getFavicon() {
    $favicon = $this->getIcono();
    $ext = explode('.',$favicon)[1];

    $types = [
      'ico'  => 'image/x-icon',
      'png'  => 'image/png',
      'gif'  => 'image/gif',
      'jpeg' => 'image/jpeg',
      'svg'  => 'image/svg+xml',
      'jpg'  => 'image/jpg',
    ];

    return "<link rel='icon' href='$favicon' type='$types[$ext]'>";
  }

  public function getBanner() {
    $banners = $this->model->assets['banner'] ?? null;
    $imagenes = array();
    if ($banners) {
      foreach ($banners as $key => $value) {
        $img = (new Imagen($value['data'], null, $this->img))->call();
        $img_mobile = $img;
        if (!empty($value['data_mobile'])) {
          $img_mobile = (new Imagen($value['data_mobile'], null, $this->img))->call();
        }

        $imagen = array(
          'id' => $value['id'],
          'title' => $value['title'],
          'data' => $img,
          'data_mobile' => $img_mobile,
          'enabled' => $value['enabled'],
        );
        array_push($imagenes, $imagen);
      }
      return $imagenes;
    }
    return array();
  }
}
