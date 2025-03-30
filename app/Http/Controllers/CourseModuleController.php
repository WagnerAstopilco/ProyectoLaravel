<?php

namespace App\Http\Controllers;

use App\Models\CourseModule;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseModuleRequest;
use App\Http\Requests\UpdateCourseModuleRequest;
use App\Http\Resources\CourseModuleResource;

class CourseModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CourseModuleResource::collection(CourseModule::with('course','module')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseModuleRequest $request)
    {
        $validatedData=$request->validated();
        $courseModule=CourseModule::create($validatedData);
        return new CourseModuleResource($courseModule);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseModule $courseModule)
    {
        $courseModule->load('course','module');
        return new CourseModuleResource($courseModule);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseModuleRequest $request, CourseModule $courseModule)
    {
        $validatedData=$request->validated();
        $courseModule->update($validatedData);
        return new CourseModuleResource($courseModule);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseModule $courseModule)
    {
        $courseModule->delete();
        return response()->json(['message'=>'modulo eliminado del curso'],200);
    }
    public function removeCourseFromModule($moduleId, $courseId)
    {
        $courseModule = CourseModule::where('module_id', $moduleId)
                                ->where('course_id', $courseId)
                                ->first();
        if (!$courseModule) {
            return response()->json([
                'message' => 'Curso no encontrado en el módulo'
            ], 404);
        }
        $courseModule->delete();

        return response()->json([
            'message' => 'módulo eliminado del curso'
        ], 200);
    }
}
