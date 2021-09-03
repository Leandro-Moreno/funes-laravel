<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        \App\Models\Autor::factory()->count(50)->create();
    }
}
