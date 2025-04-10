<?php

namespace App\Http\Controllers;

use App\Models\LessonUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonUserRequest;
use App\Http\Requests\UpdateLessonUserRequest;
use App\Http\Resources\LessonUserResource;

class LessonUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LessonUserResource::collection(LessonUser::with('lesson','user')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonUserRequest $request)
    {
        $validatedData=$request->validated();
        $lessonUser=LessonUser::create($validatedData);
        return new LessonUserResource($lessonUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonUser $lessonUser)
    {
        $lessonUser->load('lesson','user');
        return new LessonUserResource($lessonUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonUserRequest $request, LessonUser $lessonUser)
    {
        $validatedData=$request->validated();
        $lessonUser->update($validatedData);
        return new LessonUserResource($lessonUser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonUser $lessonUser)
    {
        $lessonUser->delete();
        return response()->json(['message'=>'lecciones eliminadas'],200);
    }
}
