<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\GradeItem;
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
            CourseSeeder::class,
            LevelSeeder::class,
            GradeItemSeeder::class,
        ]);
        Student::all()->each(function ($student){
            $student->courses()->attach(Course::inRandomOrder()->limit(rand(2, 4))->pluck('id'));
        });
        CourseStudent::all()->each(function ($courseStudent){
           $courseStudent->gradeItems()->attach(GradeItem::inRandomOrder()->limit(rand(2, 4))->pluck('id'),['score' => rand(0, 50)]);
        });
    }
}
