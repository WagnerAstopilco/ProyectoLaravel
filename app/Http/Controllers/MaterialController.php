<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Http\Resources\MaterialResource;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials=Material::with('lesson','courses')->paginate(20);
        return MaterialResource::collection($materials);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialRequest $request)
    {
        $material=Material::create($request->validated());
        return new MaterialResource($material);
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        $material->load('lesson','courses');
        return new MaterialResource($material);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $material->update($request->validated());
        return new MaterialResource($material);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return response()->json(['message'=>'Material eliminado correctamente'],200);
    }

    public function modifiedMaterialToCourse($materialId,$courseId)
    { 
        $material = Material::findOrFail($materialId);

        $material->courses()->attach($courseId);

        return response()->json([
            'message' => 'Material asignado al curso correctamente.',
            'material' => $material,
            'material' => $material->courses
        ],200);
    }
    public function removeMaterialFromCourse($materialId, $courseId)
{
    $material = Material::findOrFail($materialId);
    $material->courses()->detach($courseId);

    return response()->json([
        'message' => 'Curso eliminado del material correctamente.',
        'material' => $material,
        'courses' => $material->courses
    ], 200);
}

}
