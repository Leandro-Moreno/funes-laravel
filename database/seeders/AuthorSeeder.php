<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
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
        DB::table('authors')->insert([
            'family' => 'Moreno',
            'given' => 'Leandro',
            'email' => '123857@gmail.com'
        ]);

        \App\Models\Author::factory()->count(50)->create();
    }
}
