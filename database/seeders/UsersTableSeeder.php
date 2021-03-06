<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Leandro',
            'last_name' => 'Moreno',
            'email' => '123857@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('prueba'),
            'role_id' => '1',
            'lang_id' => '1',
            'username' => 'admin_leandro',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
