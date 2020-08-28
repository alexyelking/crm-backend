<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

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

        return Response::ok(["token" => $token]);
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     * @throws ValidationException
     */
    // 123
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            throw new ValidationException(["email" => "auth.attempt.failed"]);
        }

        return Response::ok(["token" => $token]);
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
