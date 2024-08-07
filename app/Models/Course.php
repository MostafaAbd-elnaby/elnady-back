<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'code',
        'description',
    ];

    public function student()
    {
        return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id')->withPivot('id');
    }
}
