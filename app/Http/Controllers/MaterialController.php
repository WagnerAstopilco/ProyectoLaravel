<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Http\Resources\MaterialResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


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
        $validatedData = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();
            $filename = Str::uuid();
            $fileCompleteName = $filename . '__' . $originalFileName;
            $path = $file->storeAs('materiales', $fileCompleteName, 'public');
            $validatedData['file'] = $path; 
        }
        $material = Material::create($validatedData);
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
        $validatedData = $request->validated();
        
        if ($request->hasFile('file')) {
            if ($material->file) {
                Storage::disk('public')->delete($material->file);
            }
            $path = $request->file('file')->store('materiales', 'public');
            $validatedData['file'] = $path;
        } else {
            $validatedData['file'] = $material->file;
        }
        if ($request->has('_delete_file')) {
            Storage::disk('public')->delete($material->file); 
            $material->file = null; 
        }
        $material->update($validatedData);
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

}
