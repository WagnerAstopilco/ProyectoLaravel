<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Http\Resources\CurriculumResource;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curriculums=Curriculum::with(['module', 'course'])->paginate(20);
        return CurriculumResource::collection($curriculums);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCurriculumRequest $request)
    {
        $curriculum=Curriculum::create($request->validated());
        return new CurriculumResource($curriculum);
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculum $curriculum)
    {
        $curriculum->load(['module', 'course']);
        return new CurriculumResource($curriculum);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurriculumRequest $request, Curriculum $curriculum)
    {
        $curriculum->update($request->validated());
        return new CurriculumResource($curriculum);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculum $curriculum)
    {
        $curriculum->delete();
        return response()->json(['message' => 'Currículo eliminado correctamente'],200);
    }
}
