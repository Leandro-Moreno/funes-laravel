<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([TerminosSeeder::class]);
        $this->call([TipoRegistroSeeder::class]);
        $this->call([CamposTipoRegistroSeeder::class]);
    }
}
