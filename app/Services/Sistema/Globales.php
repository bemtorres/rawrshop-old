<?php

namespace App\Services\Sistema;

class Globales {

  const TYPES_RRSS = [
    'facebook' => [
      'bi bi-facebook',
      'primary',
      'https://facebook.com/',
      '',
      'fab fa-facebook'
    ],
    'youtube' => [
      'bi bi-youtube',
      'danger',
      'https://www.youtube.com/',
      '',
      'fab fa-youtube'
    ],
    'whatsapp' => [
      'bi bi-whatsapp',
      'success',
      'https://wa.me/',
      '',
      'fab fa-whatsapp'
    ],
    'instagram'=> [
      'bi bi-instagram',
      'insta',
      'https://instagram.com/',
      'Ir a Instagram',
      'fab fa-instagram'
    ],
    'linkedin' => [
      'bi bi-linkedin',
      'primary',
      'https://www.linkedin.com/',
      '',
      'fab fa-linkedin'
    ],
    'twitter'  => [
      'bi bi-twitter',
      'info',
      'https://twitter.com/',
      '',
      'fab fa-twitter'
    ],
    'telefono' => [
      'bi bi-phone',
      'dark',
      'tel:+',
      '',
      'fas fa-mobile-alt'
    ],
  ];

  const TYPES_COLORS = [
    'primary',
    'secondary',
    'success',
    'danger',
    'info',
    'warning',
    'dark',
    'ligth',
  ];

  const ICONS = [
    'award' => ['inignia','fas fa-award','&#xf559'],
    'percent' => ['porcentaje','fas fa-percent','&#xf295'],
    'percentage' => ['porcentaje 2','fas fa-percentage','&#xf541'],
    'exclamation' => ['exclamación triangulo','fas fa-exclamation-triangle','&#xf071'],
    'exclamation_circle' => ['exclamación circulo','fas fa-exclamation-circle','&#xf06a'],
    'bell' => ['campanilla','fas fa-bell','&#xf0f3'],
    'heart' => ['corazón interior','fas fa-heart','&#xf004'],
    'heart2' => ['corazón interior','far fa-heart','&#xf004'],
    'heart3' => ['corazón interior 2','fab fa-gratipay','&#xf184'],
    'mask' => ['Mascara','fas fa-mask','&#xf6fa']
  ];
}
