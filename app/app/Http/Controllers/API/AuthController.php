<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Auth\LoginRequest;
use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

/**
 * Class AuthController
 * @package App\Http\Controllers\API
 */
class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return mixed
     */
    protected function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only(['email', 'password']);
        $token = auth()->attempt($credentials);

        return Response::ok(["token" => $token, "user" => auth()->user()->only(['name', 'email'])]);
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     * @throws ValidationException
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            throw new ValidationException(__('auth.failed'));
        }

        return Response::ok(["token" => $token, "user" => auth()->user()->only(['name', 'email'])]);
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        auth()->logout();

        return Response::ok();
    }

    /**
     * @return mixed
     */
    public function me()
    {
        return Response::ok(auth()->user());
    }
}