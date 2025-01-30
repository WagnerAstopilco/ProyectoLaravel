<?php

namespace App\Http\Controllers;

use App\Models\UserEvaluation;
use App\Http\Requests\StoreUserEvaluationRequest;
use App\Http\Requests\UpdateUserEvaluationRequest;
use App\Http\Resources\UserEvaluationResource;

class UserEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userEvaluations = UserEvaluation::with('user', 'evaluation', 'userAnswers')->get();
        return UserEvaluationResource::collection($userEvaluations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserEvaluationRequest $request)
    {
        $userEvaluation = UserEvaluation::create($request->validated());
        return new UserEvaluationResource($userEvaluation);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserEvaluation $userEvaluation)
    {
        $userEvaluation->load('user', 'evaluation', 'userAnswers');
        return new UserEvaluationResource($userEvaluation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserEvaluationRequest $request, UserEvaluation $userEvaluation)
    {
        $userEvaluation->update($request->validated());
        return new UserEvaluationResource($userEvaluation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserEvaluation $userEvaluation)
    {
        $userEvaluation->delete();
        return response()->json(['message' => 'Evaluación de usuario eliminada correctamente', 200]);
    }
}
