<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);
    
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('users', 'public');
            $validatedData['photo'] = $path;
        }
    
        $usuario = User::create($validatedData);    
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
        if ($request->hasFile('photo')) {

            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $path = $request->file('photo')->store('users', 'public');
            $validatedData['photo'] = $path;
        } else {

            $validatedData['photo'] = $user->photo;
        }

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
   
            $validatedData['password'] = $user->password;
        }

        $user->update($validatedData);
    
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado correctamente', 200]);
    }
}
