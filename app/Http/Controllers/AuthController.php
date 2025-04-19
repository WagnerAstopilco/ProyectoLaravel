<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;



class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            'names' => 'required|string',
            'last_names' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed', 
        ]);

        $user = User::create([
            'names' => $request->names,
            'last_names' => $request->last_names,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'alumno', 
            'status' => 'activo'
        ]);

        return response()->json(['message' => 'Usuario registrado correctamente'], 201);
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales no son correctas.'],
            ]);
        }

        if ($user->status !== 'activo') {
            return response()->json(['message' => 'Usuario inactivo'], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }

    
    public function me(Request $request)
    {
        return response()->json($request->user());
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $fullName = $googleUser->getName();
        $parts = explode(' ', $fullName);
        $names = $parts[0] . (isset($parts[1]) ? ' ' . $parts[1] : '');  
        $lastNames = implode(' ', array_slice($parts, 2));
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'names' => $names,
                'last_names' => $lastNames,
                'password' => bcrypt(Str::random(16)),
                'role' => 'alumno',
                'status' => 'activo'
            ]
        );
        $token = $user->createToken('auth_token')->plainTextToken;
        
        
        
        
        
        
        return redirect()->away('http://localhost:8080/google/callback?token=' . $token);

    }

}
