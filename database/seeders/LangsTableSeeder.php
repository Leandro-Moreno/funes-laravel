<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langs')->insert([
            'name' => 'Español',
            'acronym' => 'es',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('langs')->insert([
            'name' => 'Inglés',
            'acronym' => 'en',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
