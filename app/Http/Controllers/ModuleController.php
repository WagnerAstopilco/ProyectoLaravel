<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Http\Resources\ModuleResource;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules=Module::with('lessons','courses')->paginate(20);
        return ModuleResource::collection($modules);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModuleRequest $request)
    {
        $module=Module::create($request->validated());
        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        $module->load('lessons','courses');
        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $request, Module $module)
    {
        $module->update($request->validated());
        return new ModuleResource($module);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return response()->json(['message'=>'Módulo eliminado correctamente'],200);
    }

    public function modifiedCoursesToModule($moduleId, $courseId)
    {        
        $module = Module::findOrFail($moduleId);

        $module->courses()->attach($courseId);

        return response()->json([
            'message' => 'Material asignado al curso correctamente.',
            'material' => $module,
            'material' => $module->courses
        ],200);
    }
    public function removeCoursesToModule($moduleId, $courseId)
    {
        $module = Module::findOrFail($moduleId);
        $module->courses()->detach($courseId);

        return response()->json([
            'message' => 'Curso eliminado del material correctamente.',
            'material' => $module,
            'courses' => $module->courses
        ], 200);
    }
    public function modifiedLessonToModule($moduleId, $lessonId)
    {        
        $module = Module::findOrFail($moduleId);

        $module->lessons()->attach($lessonId);

        return response()->json([
            'message' => 'Material asignado al curso correctamente.',
            'material' => $module,
            'material' => $module->lessons
        ],200);
    }
    public function removeLessonToModule($moduleId, $lessonId)
    {
        $module = Module::findOrFail($moduleId);
        $module->lessons()->detach($lessonId);

        return response()->json([
            'message' => 'Curso eliminado del material correctamente.',
            'material' => $module,
            'courses' => $module->lessons
        ], 200);
    }
}
