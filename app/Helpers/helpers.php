<?php

function activeTab($urls, $invalidates = array()) {
  $status = '';
  foreach ($urls as $key => $url) {

    if (request()->is($url)) {
      $status = 'active';
    }

    if (sizeof($invalidates) > 0) {
      foreach ($invalidates as $keyIn => $valueIn) {
        // if (request()->path() == $valueIn) {
        //   $status = '';
        // }
        if (request()->is($valueIn)) {
          $status = '';
        }
      }
    }
  }
  return $status;
}

function activeTabCategoria($c, $invalidates = array()) {
  $status = '';
  $urls = [];

  array_push($urls,'categorias/c/'.$c->codigo);
  foreach ($c->subs as $s) {
    array_push($urls,'categorias/s/'.$s->codigo);
  }

  foreach ($urls as $key => $url) {

    if (request()->is($url)) {
      $status = 'active';
    }

    if (sizeof($invalidates) > 0) {
      foreach ($invalidates as $keyIn => $valueIn) {
        // if (request()->path() == $valueIn) {
        //   $status = '';
        // }
        if (request()->is($valueIn)) {
          $status = '';
        }
      }
    }
  }
  return $status;
}


function current_user(){
  return auth('usuario')->user();
}

function current_shop(){
  return session()->get('tienda');
}

/**
* Random string por su longitud
*
* @param  int  $longitud
* @return random text
*/
function helper_random_string($longitud) {
  $key = '';
  $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $max = strlen($pattern)-1;
  for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
  return $key;
}

/**
 * Random (string & num) por su longitud
 *
 * @param  int  $longitud
 * @return random text
 */
function helper_random_string_number($longitud) {
  $key = '';
  $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $max = strlen($pattern)-1;
  for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
  return $key;
}