<?php

namespace App\Http\Controllers;

use App\Models\LessonSession;
use App\Http\Requests\StoreLessonSessionRequest;
use App\Http\Requests\UpdateLessonSessionRequest;
use App\Http\Resources\LessonSessionResource;

class LessonSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessonSessions=LessonSession::with('lesson')->paginate(20);
        return LessonSessionResource::collection($lessonSessions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonSessionRequest $request)
    {
        $lessonSession=LessonSession::create($request->validated());
        return new LessonSessionResource($lessonSession);
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonSession $lessonSession)
    {
        $lessonSession->load('lesson');
        return new LessonSessionResource($lessonSession);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonSessionRequest $request, LessonSession $lessonSession)
    {
        $lessonSession->update($request->validated());
        return new LessonSessionResource($lessonSession);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonSession $lessonSession)
    {
        $lessonSession->delete();
        return response()->json(['message'=>'Sesión de lección eliminada correctamente'],200);
    }
}
