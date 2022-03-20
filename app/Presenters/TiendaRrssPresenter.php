<?php

namespace App\Presenters;

use App\Presenters\Presenter;
use App\Services\Imagen;

class TiendaRrssPresenter extends Presenter
{
  // Facebook
  // Instagram
  // youtube
  // Whatsapp
  // linkedin
  // Twitter
  // Télefono
  public function getFooterEnabled() {
    return $this->model->config['rrss_footer_enabled'] ?? null;
  }

  public function getSocialEnabled() {
    return $this->model->config['rrss_enabled'] ?? null;
  }

  public function getSocialPosicion() {
    return $this->model->config['rrss_posicion'] ?? null;
  }

  public function getConfigRedes() {
    return $this->model->config['rrss'] ?? '';
  }

  public function getChat() {
    return $this->model->config['chat'] ?? null;
  }

  public function enabled($name) {
    return $this->getSocialEnabled()[$name] ?? false;
  }

  public function footer_enabled($name) {
    return $this->getFooterEnabled()[$name] ?? false;
  }

  public function posicion($name) {
    return $this->getSocialPosicion()[$name] ?? false;
  }

  public function redes($name) {
    return $this->getConfigRedes()[$name] ?? '';
  }

  public function chat($name) {
    return $this->getChat()[$name] ?? '';
  }


  // $config['chat']['enabled'] = $request->input('input-enabled') ? true : false;
  // $config['rrss']['whatsapp'] = $request->input('whatsapp');
  // $config['chat']['popup_message'] = $request->input('popupMessage');
  // $config['chat']['message'] = $request->input('message');
  // $config['chat']['header_title'] = $request->input('headerTitle');
  // $config['chat']['size'] = $request->input('size');
  // $config['chat']['posicion'] = $request->input('posicion');
}
