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
use App\Http\Controllers\CourseModuleController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\LessonUserController;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function(){
    Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::middleware(['role:admin,supervisor'])->group(function(){
        Route::apiResource('/categories',CategoryController::class);
        Route::apiResource('/trainers',TrainerController::class);
        Route::apiResource('/userEvaluations',UserEvaluationController::class);
        Route::apiResource('/userAnswers',UserAnswerController::class);
        Route::apiResource('/lessonUsers',LessonUserController::class);
        //specific routes of courses
        Route::post('/courses/{courseId}/trainers',[CourseController::class, 'modifiedTrainersToCourse']);
        Route::delete('/courses/{courseId}/{trainerId}', [CourseController::class, 'removeTrainerToCourse']);        
        //specific routes of trainers
        Route::post('/trainers/{trainerId}/courses', [TrainerController::class, 'modifiedTrainerToCourse']);
        Route::delete('/trainers/{trainerId}/{courseId}', [TrainerController::class, 'removeCoursesToTrainer']);
        //specific routes of categories
        Route::post('/categories/{categoryId}/courses',[CategoryController::class, 'modifiedCoursesToCategory']);
        
    });
    Route::middleware(['role:admin,comercial'])->group(function(){
        Route::apiResource('/payments',PaymentController::class);
        Route::apiResource('/enrollments',EnrollmentController::class);
        Route::apiResource('/certificates',CertificateController::class);
        
    });
    Route::middleware(['role:admin,capacitador'])->group(function(){
        Route::apiResource('/courses',CourseController::class);
        Route::apiResource('/modules',ModuleController::class);
        Route::apiResource('/lessons',LessonController::class);
        Route::apiResource('/lessonSessions',LessonSessionController::class);
        Route::apiResource('/materials',MaterialController::class);
        Route::apiResource('/evaluations',EvaluationController::class);
        Route::apiResource('/questions',QuestionController::class);
        Route::apiResource('/options',OptionController::class);
        Route::apiResource('/courseModules',CourseModuleController::class);
        Route::apiResource('/courseMaterials',CourseMaterialController::class);
        //specific routes of modules
        Route::post('/modules/{moduleId}/{lessonId}', [ModuleController::class, 'modifiedLessonsToModule']);
        Route::delete('/modules/{moduleId}/{lessonId}', [ModuleController::class, 'removeLessonsToModule']);
        // specific routes of coursemodule
        Route::delete('/courseModules/{moduleId}/{courseId}', [CourseModuleController::class, 'removeCourseFromModule']);
        //specific routes of coursematerial
        Route::delete('/courseMaterials/{materialId}/{courseId}', [CourseMaterialController::class, 'removeCourseFromMaterial']);
        
    });

    Route::middleware(['role:admin'])->group(function(){
        Route::apiResource('/users',UserController::class);

    });
});

//routes login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



