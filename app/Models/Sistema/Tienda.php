<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;
use App\Presenters\TiendaFooterPresenter;
use App\Presenters\TiendaPresenter;
use App\Presenters\TiendaRrssPresenter;
use App\Services\Themes;

class Tienda extends Model
{
  use HasFactory;
	protected $table = 's_tienda';

  const STATUS = [
    1 => 'Mantención/Contrucción',
    2 => 'Online',
  ];

  const TIPOS_WEB = [
    'blog' => 'Blog',
    'shop' => 'Tienda online',
    'personal' => 'Web Personal',
    'corporativa' => 'Web Corporativa',
  ];

  CONST COLOR_FONDO = "#fff";
  CONST COLOR_TEXTO = "#212529";

  protected $casts = [
    'config' => Json::class,
    'integration' => Json::class,
    'assets' => Json::class
  ];

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function getConfigRedes() {
    return $this->config['rrss'] ?? null;
  }

  public function getConfigTienda() {
    return $this->config['shop'] ?? null;
  }

  public function getConfigMeta() {
    return $this->config['meta'] ?? null;
  }

  public function getConfigPaginator() {
    return $this->config['paginator'] ?? 3;
  }

  public function getConfigColorFondo() {
    return $this->getConfigTienda()['background_color'] ?? self::COLOR_FONDO;
  }

  public function getLogoEnabled() {
    return $this->getConfigTienda()['logo_enabled'] ?? false;
  }

  public function getTitleWeb() {
    return $this->getConfigTienda()['title_web'] ?? '';
  }

  public function getConfigJs() {
    return $this->config['code']['js'] ?? '';
  }

  public function getConfigCss() {
    return $this->config['code']['css'] ?? '';
  }

  public function getConfigSeo() {
    return $this->config['seo'] ?? null;
  }

  public function getMantenimientoEnabled() {
    return $this->estado == 2 ?  true : false;
  }

  public function getPayWhatsappEnabled() {
    return $this->config['pay_whatsapp'] ?? false;
  }

  public function getSeoType() {
    return $this->getConfigSeo()['type'] ?? null;
  }

  public function getSeoEnabled(){
    return $this->getConfigSeo()['enabled'] ?? false;
  }

  public function getSeoWebTitle() {
    return $this->getConfigSeo()['title'] ?? null;
  }

  public function getSeoDescription() {
    return $this->getConfigSeo()['description'] ?? false;
  }

  public function getSeoKeyword() {
    return $this->getConfigSeo()['keyword'] ?? false;
  }

  public function getSeoImg() {
    return $this->getConfigSeo()['img'] ?? '';
  }

  public function getConfigColorTexto() {
    return $this->getConfigTienda()['text_color'] ?? self::COLOR_TEXTO;
  }

  public function getConfigColor() {
    return $this->getConfigTienda()['color'] ?? '#000';
  }

  public function present(){
    return new TiendaPresenter($this);
  }

  public function presentRRSS(){
    return new TiendaRrssPresenter($this);
  }

  public function presentFooter(){
    return new TiendaFooterPresenter($this);
  }

  public function getConfigTheme() {
    return $this->getConfigTienda()['theme'] ?? 'default';
  }

  public function getConfigThemeCSS() {
    $theme = $this->getConfigTheme();
    return $theme == 'default' ? null : (new Themes($theme))->call();
  }

  public function getConfigThemeAdmin() {
    return $this->getConfigTienda()['theme_admin'] ?? 'default';
  }

  public function getConfigThemeAdminCSS() {
    $theme = $this->getConfigThemeAdmin();
    return $theme == 'default' ? null : (new Themes($theme))->call();
  }
}
