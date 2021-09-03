<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'nombre' => 'pub'
        ]);
        DB::table('estados')->insert([
            'nombre' => 'impress'
        ]);
        DB::table('estados')->insert([
            'nombre' => 'submitted'
        ]);
        DB::table('estados')->insert([
            'nombre' => 'unpub'
        ]);
    }
}
