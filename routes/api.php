<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonSessionController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\UserEvaluationController;
use App\Http\Resources\CategoryResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//specific routes of courses
Route::post('/courses/{courseId}/modules', [CourseController::class, 'modifiedModulesToCourse']);
Route::post('/courses/{courseId}/materials',[CourseController::class, 'modifiedMaterialsToCourse']);
Route::post('/courses/{courseId}/trainers',[CourseController::class, 'modifiedTrainersToCourse']);

//specific routes of modules
Route::post('/modules/{moduleId}/courses', [ModuleController::class, 'modifiedCoursesToModule']);

//specific routes of material
Route::post('/materials/{materialId}/courses', [MaterialController::class, 'modifiedMaterialToCourse']);

//specific routes of trainers
Route::post('/trainers/{trainerId}/courses', [TrainerController::class, 'modifiedTrainerToCourse']);

//basic routes
Route::apiResource('/category',CategoryController::class);
Route::apiResource('/courses',CourseController::class);
Route::apiResource('/modules',ModuleController::class);
Route::apiResource('/lessons',LessonController::class);
Route::apiResource('/lessonSessions',LessonSessionController::class);
Route::apiResource('/materials',MaterialController::class);
Route::apiResource('/evaluations',EvaluationController::class);
Route::apiResource('/questions',QuestionController::class);
Route::apiResource('/options',OptionController::class);
Route::apiResource('/users',UserController::class);
Route::apiResource('/certificates',CertificateController::class);
Route::apiResource('/trainers',TrainerController::class);
Route::apiResource('/enrollments',EnrollmentController::class);
Route::apiResource('/payments',PaymentController::class);
Route::apiResource('/userEvaluations',UserEvaluationController::class);
Route::apiResource('/userAnswers',UserAnswerController::class);

