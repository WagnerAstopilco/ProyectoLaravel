<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Course;
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
        return ModuleResource::collection(Module::with('lessons','courses')->get());
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreModuleRequest $request)
    {
        $validatedData = $request->validated();
        $module = Module::create($validatedData);
        
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
        $validatedData = $request->validated();
        
        $module->update($validatedData);
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
