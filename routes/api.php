<?php

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LevelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('students', StudentController::class)->only(['index','store','update','destroy']);
Route::prefix('courses')->controller(CourseController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/gradeItems', 'getGradeItems');
    Route::get('/{course}', 'show');
    Route::post('assign/{studentId}/{courseId}', 'assignStudentToCourse');
    Route::post('remove/{course}/{student}', 'detachStudentFromCourse');
});
Route::get('levels', [LevelController::class, 'index']);
