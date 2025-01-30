<?php

namespace App\Http\Controllers;

use App\Models\UserAnswer;
use App\Http\Requests\StoreUserAnswerRequest;
use App\Http\Requests\UpdateUserAnswerRequest;

class UserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAnswerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAnswerRequest $request, UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAnswer $userAnswer)
    {
        //
    }
}
