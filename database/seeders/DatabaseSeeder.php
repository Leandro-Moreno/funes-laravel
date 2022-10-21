<?php

namespace Database\Seeders;

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
        $this->call([
            LangsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            TerminosSeeder::class,
            TipoRegistroSeeder::class,
            CamposTipoRegistroSeeder::class,
            AuthorSeeder::class,
            SubjectSeeder::class,
            EstadoSeeder::class,
            RoutesSeeder::class,
        ]);
    }
}
