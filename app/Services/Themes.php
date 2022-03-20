<?php

namespace App\Services;

class Themes {
  CONST URI = 'https://bootswatch.com/5/#/bootstrap.css';

  const THEMES = [
    'default'   => 'Default',
    'cerulean'  => 'Cerulean',
    'darkly'    => 'Darkly',
    'litera'    => 'Litera',
    'materia'   => 'Materia',
    'pulse'     => 'Pulse',
    'simplex'   => 'Simplex',
    'solar'     => 'Solar',
    'united'    => 'United',
    'zephyr'    => 'Zephyr',
    'cosmo'     => 'Cosmo',
    'flatly'    => 'Flatly',
    'lumen'     => 'Lumen',
    'minty'     => 'Minty',
    'quartz'    => 'Quartz',
    'sketchy'   => 'Sketchy',
    'spacelab'  => 'Spacelab',
    'vapor'     => 'Vapor',
    'cyborg'    => 'Cyborg',
    'journal'   => 'Journal',
    'lux'       => 'Lux',
    'morph'     => 'Morph',
    'sandstone' => 'Sandstone',
    'slate'     => 'Slate',
    'superhero' => 'Superhero',
    'yeti'      => 'Yeti'
  ];

  private $theme;

  public function __construct($theme) {
    $this->theme = $theme;
  }

  public function call() {
    return str_replace('#',$this->theme, self::URI);
  }
}
