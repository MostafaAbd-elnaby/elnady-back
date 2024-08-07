<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'English',
                'code' => 'C12-1234',
                'description' => 'English Course',
            ],
            [
                'name' => 'Math',
                'code' => 'C12-1235',
                'description' => 'Math Course',
            ],
            [
                'name' => 'Science',
                'code' => 'C12-1236',
                'description' => 'Science Course',
            ],
            [
                'name' => 'History',
                'code' => 'C12-1237',
                'description' => 'History Course',
            ],
            [
                'name' => 'Geography',
                'code' => 'C12-1238',
                'description' => 'Geography Course',
            ],
            [
                'name' => 'Art',
                'code' => 'C12-1239',
                'description' => 'Art Course',
            ],
            [
                'name' => 'Music',
                'code' => 'C12-1240',
                'description' => 'Music Course',
            ],
            [
                'name' => 'Physical',
                'code' => 'C12-1241',
                'description' => 'Physical Education Course',
            ],
            [
                'name' => 'Chemistry',
                'code' => 'C12-1242',
                'description' => 'Chemistry Course',
            ],
            [
                'name' => 'Biology',
                'code' => 'C12-1243',
                'description' => 'Biology Course',
            ],
        ]);
    }
}
