<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'course_student';

    public function gradeItems()
    {
        return $this->belongsToMany(GradeItem::class, 'grades', 'course_student_id', 'grade_item_id')->withPivot('id', 'score');
    }
}
