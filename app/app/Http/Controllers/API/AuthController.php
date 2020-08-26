<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\AuthControllerLoginRequest;
use App\Http\Requests\AuthControllerRegisterRequest;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register', 'login']]);
    }

    protected function register(AuthControllerRegisterRequest $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return Response::ok($data = [], $message = "Registration completed successfully");
    }

    public function login(AuthControllerLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Incorrect email/password'], 401);
        }
        return Response::ok($data = ["token"=>$token], $message = "You are logged in. Use your token to access the resource");
    }

    public function logout()
    {
        auth()->logout();
        return Response::ok($data = [], $message = "Successfully logged out");
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}