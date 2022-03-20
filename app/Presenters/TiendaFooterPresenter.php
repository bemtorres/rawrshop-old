<?php

namespace App\Presenters;

use App\Presenters\Presenter;

class TiendaFooterPresenter extends Presenter
{
  CONST BACKGROUND_COLOR = '#EBEBEB';

  public function getFooter() {
    return $this->model->config['footer'] ?? null;
  }

  public function getColor() {
    return $this->model->config['color'] ?? null;
  }

  public function getEnabled() {
    return $this->getFooter()['enabled'] ?? false;
  }

  public function getContent() {
    return $this->getFooter()['content'] ?? '';
  }

  public function getColorHeader() {
    return $this->getColor()['header'] ?? 'dark';
  }

  public function getColorNav() {
    return $this->getColor()['nav'] ?? 'dark';
  }

  public function getColorFooter() {
    return $this->getColor()['footer'] ?? 'dark';
  }

  public function getColorFooterCart() {
    return $this->getColor()['footer_cart'] ?? 'dark';
  }

  public function getColorBackground() {
    return $this->getColor()['background'] ?? self::BACKGROUND_COLOR;
  }
}
