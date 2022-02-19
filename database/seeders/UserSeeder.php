<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Carlos Isaac Jaldin Benavides',
                'register' => '218081146',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Valeria Coronado',
                'register' => '218014848',
                'password' => Hash::make('123'),
            ],
        ]);
    }
}
