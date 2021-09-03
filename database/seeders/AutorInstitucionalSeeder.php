<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AutorInstitucionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AutorInstitucional::factory()->count(15)->create();
    }
}
