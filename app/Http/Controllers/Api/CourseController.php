<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\GradeItem;
use App\Models\CourseStudent;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Course::query();
        if ($request->has('search')) {
            $query->where('code', 'like', '%' . $request->search . '%')
                ->orWhere('name', 'like', '%' . $request->search . '%');
        }
        $courses = $query->orderBy('created_at', 'desc')->get();
        return response()->json(['courses' => $courses],200);
    }

    public function show(Course $course)
    {
        $studentsNotInCourse = Student::whereDoesntHave('courses', function ($query) use ($course) {
            $query->where('course_id', $course->id);
        })->get();
        $student = $course->student()->with('grades')->get();
        $studentGrade = $student->map(function ($student) {
            return [
                'student_id' => $student->id,
                'student_name' => $student->full_name,
                'student_code' => $student->code,
                'grades' => $student->grades,
                'total' => $student->grades->sum('score'),
            ];
        });
        return response()->json(['allStudents' => $studentsNotInCourse, 'data' => $studentGrade, 'course_name' => $course->name],200);
    }

    public function getGradeItems()
    {
        $gradeItems = GradeItem::all();
        return response()->json(['gradeItems' => $gradeItems],200);
    }

    public function detachStudentFromCourse($courseId, $studentId)
    {
        $course = Course::findOrFail($courseId);
        $student = Student::findOrFail($studentId);
        $item = $student->grades()->delete();
        $student->courses()->detach($courseId);
        return response()->json(['message' => 'Student has been removed from course'],200);
    }

    public function assignStudentToCourse($studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        $course = Course::findOrFail($courseId);
        if (!$student->courses()->where('course_id', $courseId)->exists()) {
            $student->courses()->attach($courseId);
            return response()->json(['message' => 'Student has been added to course'],200);
        } else {
            return response()->json(['message' => 'Error'],500);
        }
    }


}
