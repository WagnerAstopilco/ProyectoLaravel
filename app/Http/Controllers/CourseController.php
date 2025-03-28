<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CourseResource::collection(Course::with(['category', 'trainers', 'modules', 'evaluations', 'certificates', 'enrollments', 'materials'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image/cursos', 'public');
            $validatedData['image'] = $path;
        }

        $course = Course::create($validatedData);
        return new CourseResource($course);
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load(['category', 'trainers', 'modules', 'evaluations', 'certificates', 'enrollments', 'materials']);
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $validatedData = $request->validated();
        
        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $path = $request->file('image')->store('image/cursos', 'public');
            $validatedData['image'] = $path;
        } else {
            $validatedData['image'] = $course->image;
        }
        
        $course->update($validatedData);
        return new CourseResource($course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(['message' => 'Curso eliminado correctamente'],200);
    }
    
    public function modifiedMaterialsToCourse(Request $request,$courseId)
    {
        $course=Course::findOrFail($courseId);

        $course->materials()->sync($request->material_ids);

        return response()->json([
            'message'=>'Materiales agregados correctamente',
            'course'=>$course,
            'materials'=>$course->materials
        ],200);
    }

    public function modifiedTrainersToCourse(Request $request,$courseId)
    {
        $course=Course::findOrFail($courseId);

        $course->trainers()->syncWithoutDetaching($request->trainer_ids);

        return response()->json([
            'message'=>'Entrenadores agregados correctamente',
            'course'=>$course,
            'trainers'=>$course->trainers            
        ],200);
    }
    public function removeTrainerToCourse($courseId,$trainerId)  
    {
        $course = Course::findOrFail($courseId);
        $course->trainers()->detach($trainerId);

        return response()->json([
            'message' => 'Entrenador eliminado correctamente',
            'course' => $course,
            'trainers' => $course->trainers
        ], 200);
    }
}
