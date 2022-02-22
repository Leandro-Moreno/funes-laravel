<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            'icon' => "bx-book-content",
            'name' => "Registros",
            'route_alias' => "registro.index",
            'position' => 1,
            'role_id' => 4,
        ]);
        DB::table('routes')->insert([
            'icon' => 'bx-sitemap',
            'name' => 'Término Clave',
            'route_alias' => 'subject.index',
            'position' => 2,
            'role_id' => 4,
        ]);
        DB::table('routes')->insert([
            'icon' => 'bx-calendar-event',
            'name' => 'Año',
            'route_alias' => 'year',
            'position' => 3,
            'role_id' => 4,
        ]);
        DB::table('routes')->insert([
            'icon' => 'bx-user-pin',
            'name' => 'Autor',
            'route_alias' => 'author.index',
            'position' =>4,
            'role_id' => 4,
        ]);
        DB::table('routes')->insert([
            'icon' => 'bx-user',
            'name' => 'Perfil',
            'route_alias' => 'profile.edit',
            'position' =>5,
            'role_id' => 3,
        ]);
        DB::table('routes')->insert([
            'icon' => 'bx-customize',
            'name' => 'Mis depositos',
            'route_alias' => 'registro.personal',
            'position' =>6,
            'role_id' => 3,
        ]);
        DB::table('routes')->insert([
            'icon' => 'bx-cog',
            'name' => 'Administración',
            'route_alias' => 'admin.index',
            'position' =>7,
            'role_id' => 2,
        ]);
    }
}
