<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class EnrolledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrolleds')->insert([
            [
                'year' => 2018,
                'grade' => 60.0,
                'subject_id' => 1,
                'semester_id' => 2,
                'user_id' => 1,
            ],
            [
                'year' => 2018,
                'grade' => 64.0,
                'subject_id' => 2,
                'semester_id' => 2,
                'user_id' => 1,
            ],
            [
                'year' => 2018,
                'grade' => 99.0,
                'subject_id' => 3,
                'semester_id' => 2,
                'user_id' => 1,
            ],
            [
                'year' => 2018,
                'grade' => 60.0,
                'subject_id' => 4,
                'semester_id' => 2,
                'user_id' => 1,
            ],
            [
                'year' => 2018,
                'grade' => 70.0,
                'subject_id' => 5,
                'semester_id' => 2,
                'user_id' => 1,
            ],
        ]);
    }
}
