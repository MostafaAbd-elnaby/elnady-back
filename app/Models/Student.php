<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $fillable = [
        'first_name',
        'last_name',
        'code',
        'date_of_birth',
        'email',
        'level_id',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->first_name . ' ' . $this->last_name
        );
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot('id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_course_id');
    }
}