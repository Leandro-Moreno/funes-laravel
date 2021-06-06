<?php

use Illuminate\Database\Seeder;
use App\AutorInstitucional;
class AutorInstitucionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AutorInstitucional::class, 15)->create();
    }
}
