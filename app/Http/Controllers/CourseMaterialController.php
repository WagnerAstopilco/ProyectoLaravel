<?php

namespace App\Http\Controllers;

use App\Models\CourseMaterial;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseMaterialRequest;
use App\Http\Requests\UpdateCourseMaterialRequest;
use App\Http\Resources\CourseMaterialResource;

class CourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CourseMaterialResource::collection(CourseMaterial::with('course','material')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseMaterialRequest $request)
    {
        $validatedData=$request->validated();
        $courseMaterial=CourseMaterial::create($validatedData);
        return new CourseMaterialResource($courseMaterial);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseMaterial $courseMaterial)
    {
        $courseMaterial->load('course','material');
        return new CourseMaterialResource($courseMaterial);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseMaterialRequest $request, CourseMaterial $courseMaterial)
    {
        $validatedData=$request->validated();
        $courseMaterial->update($validatedData);
        return new CourseMaterialResource($courseMaterial);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseMaterial $courseMaterial)
    {
        $courseMaterial->delete();
        return response()->json(['message'=>'material eliminado del curso'],200);
    }

    public function removeCourseFromMaterial($materialId, $courseId)
    {
        $courseMaterial = CourseMaterial::where('material_id', $materialId)
                                ->where('course_id', $courseId)
                                ->first();
        if (!$courseMaterial) {
            return response()->json([
                'message' => 'Curso no encontrado en el material'
            ], 404);
        }
        $courseMaterial->delete();

        return response()->json([
            'message' => 'material eliminado del curso'
        ], 200);
    }
}
