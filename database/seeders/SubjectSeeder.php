<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'ROOT',
            'result' => 'Root',
            'showable' => false,
            'depositable' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
