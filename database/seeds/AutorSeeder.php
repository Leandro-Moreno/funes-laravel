<?php

use Illuminate\Database\Seeder;
use App\Autor;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $table->id();
        $table->string('apellido');
        $table->string('nombre');
        $table->string('email')->nullable();*/
        DB::table('autors')->insert([
              'apellido' => 'Moreno',
              'nombre' => 'Leandro',
              'email' => '123857@gmail.com'
          ]);
        factory(Autor::class, 50)->create();
    }
}
