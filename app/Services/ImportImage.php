<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as Image;
use File;

class ImportImage
{
  public static function save(
    Request $request,
    $inputName = 'image',
    $name = '',
    $folderSave = 'trash',
    $validate = false,
    $folderDate = false
    ){
      try {
        if ($validate) {
          $request->validate([
            $inputName => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
        }

        // $folderSave .= 'public/' . $folderSave;
        $nFile = '';
        if ($folderDate) {
          $folderSave .= '/' . date('Y') . '/' . date('m');
          $nFile = date('Y') . '/' . date('m') . '/';
        }

        $file = $request->file($inputName);
        $filename = $name .'.'. $file->getClientOriginalExtension();
        $file->storeAs('public/' . $folderSave,$filename);

        return $folderSave . '/' . $nFile.$filename;
      } catch (\Throwable $th) {
        return 400;
      }
  }

  // @params Request  $request    => Data real
  // @params string   $inputName  => Nombre de input de la imagen
  // @params string   $name       => Nombre de la imagen
  // @params string   $folderSave => Nombre de la carpeta
  // @params boolean  $validate   => Verificar validación de imagen
  // @params boolean  $folderDate => Guardar en la carpeta con formato fecha
  // @return integer  400 => Error
  // @return string   dir_file_name_image.ext
  public static function save_v2(
      Request $request,
      $input_name = 'image',
      $name = null,
      $folder = 'imagenes',
      $validate = false,
      $folder_date = false,
      $range_reduction,
      $dimension
    ){
      try {
        if ($validate) {
          $request->validate([
            $input_name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
        }

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
          $path = storage_path() . '\app\public/';
          $date = date('Y') . '/' . date('m');
          $file = $request->file($input_name);
          $ext = $file->getClientOriginalExtension();
          $file_name = ($name ?? time()) . '.' . $ext;
          $folder .= $folder_date ? '/' . $date : '';
          $dir = $path . $folder;
          if (!File::exists($dir)) {
            File::makeDirectory($dir, 0777, true, true);
          }
          $filename = $folder . '/' . $file_name;
          $dir_filename = $dir . '/' . $file_name;
          if ($ext == 'gif') {
            $folder = 'public/'.$folder;
            $file->storeAs($folder, $file_name);
          } else {
            $image = Image::make($file);
            if ($dimension) {
              if ($image->height() < $image->width()) {
                $image->fit(900,600);
              }else{
                if ($image->height() > $image->width()) {
                  $image->fit(600,900);
                } else {
                  $image->fit(600,600);
                }
              }
            }
            // range_reduction puede ser de 0 a 100 recomendado 30-40

            $image->save($dir_filename, $range_reduction, $ext);
          }
          return $filename;
        } else{
          // Carperta del proyecto
          $path = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR;
          // $path = public_path('storage'. DIRECTORY_SEPARATOR );

          // Fecha en formato 2021/08 => 2022/01/vacaciones/imagen.png
          $date = date('Y') . DIRECTORY_SEPARATOR . date('m');

          $file = $request->file($input_name);

          $ext = $file->getClientOriginalExtension();
          $file_name = ($name ?? time()) . '.' . $ext;

          // carpeta = nombre_carpeta/2021/01
          $folder .= $folder_date ? DIRECTORY_SEPARATOR . $date : '';

          // \app\public/2021/01/vacaciones
          // \app\public/vacaciones
          $dir = $path . $folder;
          if (!File::exists($dir)) {
            File::makeDirectory($dir, 0777, true, true);
          }

          // 2021/01/vacaciones
          // vacaciones/imagen.png
          $filename = $folder . DIRECTORY_SEPARATOR . $file_name;

          // \app\public/vacaciones/imagen.png
          $dir_filename = $dir . DIRECTORY_SEPARATOR . $file_name;
          if ($ext == 'gif') {
            $folder = 'public/'.$folder;
            $file->storeAs($folder, $file_name);
          } else {
            $image = Image::make($file);
            if ($dimension) {
              // Horizontal
              if ($image->height() < $image->width()) {
                // if ($image->height() > 900 && $image->width() > 600 ) {
                  $image->fit(900,600);
                // }
              }else{
                if ($image->height() > $image->width()) {
                  // if ($image->height() > 600 && $image->width() > 900 ) {
                    $image->fit(600,900);
                  // }
                } else {
                  $image->fit(600,600);
                }
              }
            }
            // range_reduction puede ser de 0 a 100 recomendado 30-40

            $image->save($dir_filename, $range_reduction, $ext);
          }
          return $filename;
        }

      } catch (\Throwable $th) {
        return 400;
        // return $th;
      }
  }

  public static function save_asset(
    Request $request,
    $input_name = 'image',
    $name = null,
    $folder = 'imagenes',
    $validate = false,
    $folder_date = false,
    $range_reduction,
    $type = 1
  ){
    try {
      if ($validate) {
        $request->validate([
          $input_name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      }

      if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $path = storage_path() . '\app\public/';

        $date = date('Y') . '/' . date('m');
        $file = $request->file($input_name);
        $ext = $file->getClientOriginalExtension();
        $file_name = ($name ?? time()) . '.' . $ext;
        $folder .= $folder_date ? '/' . $date : '';
        $dir = $path . $folder;
        if (!File::exists($dir)) {
          File::makeDirectory($dir, 0777, true, true);
        }
        $filename = $folder . '/' . $file_name;
        $dir_filename = $dir . '/' . $file_name;
        $image = Image::make($file);

        if ($type == 1) {
          $image->fit(70,70);
        } elseif ($type == 2) {
          if ($image->height() < $image->width()) {
            $image->fit(500,415);
          }else{
            if ($image->height() > $image->width()) {
              $image->fit(375,500);
            } else {
              $image->fit(415,415);
            }
          }
        } else {
          $image->fit(244,244);
        }
        $image->save($dir_filename, $range_reduction, $ext);
        return $filename;
      } else{
        $path = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR;
        $date = date('Y') . DIRECTORY_SEPARATOR . date('m');
        $file = $request->file($input_name);
        $ext = $file->getClientOriginalExtension();
        $file_name = ($name ?? time()) . '.' . $ext;
        $folder .= $folder_date ? DIRECTORY_SEPARATOR . $date : '';
        $dir = $path . $folder;
        if (!File::exists($dir)) {
          File::makeDirectory($dir, 0777, true, true);
        }
        $filename = $folder . DIRECTORY_SEPARATOR . $file_name;
        $dir_filename = $dir . DIRECTORY_SEPARATOR . $file_name;
        $image = Image::make($file);

        if ($type == 1) {
          $image->fit(70,70);
        } elseif ($type == 2) {
          if ($image->height() < $image->width()) {
            $image->fit(500,415);
          }else{
            if ($image->height() > $image->width()) {
              $image->fit(375,500);
            } else {
              $image->fit(415,415);
            }
          }
        } else {
          $image->fit(244,244);
        }
        $image->save($dir_filename, $range_reduction, $ext);
        return $filename;
      }
    } catch (\Throwable $th) {
      return 400;
      // return $th;
    }
}
}
