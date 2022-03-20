<?php

namespace Database\Seeders;

use App\Models\Sistema\Tienda;
use App\Models\Sistema\Usuario;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $password  = hash('sha256', '123456');

      $a = new Usuario();
      $a->correo = 'admin@admin.cl';
      $a->password = $password;
      $a->nombre = 'Administrador plataforma';
      $a->admin = true;
      $a->save();

      $t = new Tienda();
      $t->nombre = 'mi tienda';
      $t->correo = 'mitienda@rawrshop.cl';
      $t->direccion = '';
      $t->save();
      // $table->string('nombre');
      // $table->string('correo')->nullable();
      // $table->string('direccion')->nullable();
      // $table->string('logo')->nullable();
      // $table->string('descripcion')->nullable();
      // $table->json('config')->nullable();
      // $table->json('integration')->nullable();
      // $table->boolean('activo')->default(true);
      // $table->timestamps();
    }
}
