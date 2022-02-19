<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
            [
                'period' => 'Semestre I',
            ],
            [
                'period' => 'Semestre II',
            ],
            [
                'period' => 'Verano',
            ],
            [
                'period' => 'Mesa',
            ],
        ]);
    }
}
