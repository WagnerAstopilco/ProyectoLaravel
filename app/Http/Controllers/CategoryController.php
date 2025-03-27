<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::with(['courses'])->paginate(20);
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load(['courses']);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Categoria eliminada correctamente'], 200);
    }
    public function modifiedCoursesToCategory(Request $request, $categoryId)
    { 
        $category = Category::findOrFail($categoryId);

        foreach ($request->courses_ids as $courseId) {
            $course = Course::find($courseId);
            if ($course) {
                $course->category_id = $categoryId;
                $course->save(); 
            }
        }

        return response()->json([
            'message' => 'Cursos asignados a la categoría correctamente.',
            'category' => $category,
            'cursos' => $category->courses
        ], 200);
    }
}
