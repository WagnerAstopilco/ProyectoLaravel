<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use App\Http\Resources\TrainerResource;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers=Trainer::with(['user','courses'])->get();
        return TrainerResource::collection($trainers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainerRequest $request)
    {
        $trainer = Trainer::create($request->validated());
        return new TrainerResource($trainer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        $trainer->load('user','courses');
        return new TrainerResource($trainer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainerRequest $request, Trainer $trainer)
    {
        $trainer->update($request->validated());
        return new TrainerResource($trainer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return response()->json(['message' => 'Entrenador eliminado correctamente'],200);
    }

    public function modifiedTrainerToCourse(Request $request, $trainerId)
    { 
        $trainer = Trainer::findOrFail($trainerId);

        $trainer->courses()->sync($request->course_ids);

        return response()->json([
            'message' => 'Entrenador asignado al curso correctamente.',
            'trainer' => $trainer,
            'trainer' => $trainer->courses
        ],200);
    }

    public function modifiedCoursesToTrainer($trainerId, $courseId)
    {        
        $trainer = Trainer::findOrFail($trainerId);

        $trainer->courses()->attach($courseId);

        return response()->json([
            'message' => 'Material asignado al curso correctamente.',
            'trainer' => $trainer,
            'courses' => $trainer->courses
        ],200);
    }
    public function removeCoursesToTrainer($trainerId, $courseId)
    {
        $trainer = Trainer::findOrFail($trainerId);
        $trainer->courses()->detach($courseId);

        return response()->json([
            'message' => 'Curso eliminado del material correctamente.',
            'trainer' => $trainer,
            'courses' => $trainer->courses
        ], 200);
    }
}
