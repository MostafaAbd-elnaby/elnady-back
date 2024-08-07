<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grade_items')->insert([
            ['name' => 'Quiz 1', 'max_degree' => 10],
            ['name' => 'Quiz 2', 'max_degree' => 10],
            ['name' => 'practical exam', 'max_degree' => 30],
            ['name' => 'oral exam', 'max_degree' => 30],
            ['name' => 'Midterm exam', 'max_degree' => 50],
            ['name' => 'Final exam', 'max_degree' => 50],
        ]);
    }
}
