<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Http\Resources\OptionResource;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::with('question')->get();
        return OptionResource::collection($options);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOptionRequest $request)
    {
        $option=Option::create($request->validated());
        return new OptionResource($option);
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        $option->load('question');
        return new OptionResource($option);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->update($request->validated());
        return new OptionResource($option);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return response()->json(['message'=>'Opción eliminada correctamente'],200);
    }
}
