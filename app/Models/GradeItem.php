<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'grade_items';

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'grades', 'course_student_id', 'grade_item_id')->withPivot('id', 'score');
    }
}
