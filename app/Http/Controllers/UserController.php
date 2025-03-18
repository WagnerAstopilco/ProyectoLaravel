<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lesson;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::with(['trainer','certificates','enrollments','userEvaluations','lessons'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($request->password);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('users', 'public');
            $validatedData['photo'] = $path;
        }

        $usuario = User::create($validatedData);

        if ($request->has('lessons')) {
            foreach ($request->input('lessons') as $lessonId => $state) {
                $usuario->lessons()->attach($lessonId, ['state' => $state]);
            }
        }   
        return new UserResource($usuario);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->photo = asset('storage/' . $user->phto);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $validatedData = $request->validated();
        if ($request->has('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }
    
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('users', 'public');
            $validatedData['photo'] = $path;
        }
    
        $user->update($validatedData);
    
        if ($request->has('lessons')) {
            foreach ($request->input('lessons') as $lessonId => $state) {
                $user->lessons()->syncWithoutDetaching([
                    $lessonId => ['state' => $state]
                ]);
            }
        }
    
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado correctamente'],200);
    }
}
